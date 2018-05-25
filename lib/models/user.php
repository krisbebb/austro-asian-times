<?php
class User extends Database{

   public function is_authenticated(){
        $id = "";
        $hash="";

        session_start();
        if(!empty($_SESSION["id"]) && !empty($_SESSION["hash"])){
           $id = $_SESSION["id"];
           $hash = $_SESSION["hash"];
        }
        session_write_close();

        if(!empty($id) && !empty($hash)){

            try{
               $query = "SELECT hashed_password FROM journalists WHERE id=?";
               if($statement = $this->prepare($query)){
                 $binding = array($id);
                 if(!$statement -> execute($binding)){
                    return false;
                 }
                 else{
                     $result = $statement->fetch(PDO::FETCH_ASSOC);
                     if($result['hashed_password'] === $hash){
                       return true;
                     }
                 }
               }

            }
            catch(Exception $e){
               throw new Exception("Authentication not working properly. {$e->getMessage()}");
            }

        }
        return false;

   }
   public function is_admin(){
     session_start();
     if(!empty($_SESSION["id"])){
        $id = $_SESSION["id"];
      }
     session_write_close();
     try{
        $query = "SELECT privilege FROM journalists WHERE id=?";
        if($statement = $this->prepare($query)){
          $binding = array($id);
          if(!$statement -> execute($binding)){
             return false;
          }
          else{
              $result = $statement->fetch(PDO::FETCH_ASSOC);
              if($result['privilege'] == '2'){
                return true;
              }
          }
        }

     }
     catch(Exception $e){
        throw new Exception("Cannot check privilege level. {$e->getMessage()}");
     }
     return false;
   }

   public function is_db_empty(){
       $is_empty = false;
       try{
          $query = "SELECT id FROM journalists WHERE id=?";
          if($statement = $this->prepare($query)){
             $id=1;
             $binding = array($id);
             if(!$statement -> execute($binding)){
                     throw new Exception("Could not execute query.");
             }
             else{
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                if(empty($result)){
                  $is_empty = true;
                }
             }
          }
          else{
                throw new Exception("Problem with statement.");
          }

       }
       catch(Exception $e){
          throw new Exception($e->getMessage());
       }
       return $is_empty;

    }

    public function get_users(){
       try{
          $query = "SELECT * FROM journalists";
          if($statement = $this->prepare($query)){
             $binding = array();
             if(!$statement -> execute($binding)){
                 throw new Exception("Could not execute query.");
             }
             else{
                $results = $statement->fetchall(PDO::FETCH_ASSOC);
                return $results;
             }
          }
          else{
            throw new Exception("Could not prepare statement.");

          }
       }
       catch(Exception $e){
           throw new Exception($e->getMessage());
       }
    }


    public function sign_up($user_name, $firstname, $lastname, $password, $password_confirm){
       try{
         if($this->validate_user_name($user_name) && $this->validate_passwords($password,$password_confirm)){
              $salt = $this->generate_salt();
              $password_hash = $this->generate_password_hash($password,$salt);
              $query = "INSERT INTO journalists (login,firstname,lastname,salt,hashed_password) VALUES (?,?,?,?,?)";
              if($statement = $this->prepare($query)){
                 $binding = array($user_name,$firstname,$lastname,$salt,$password_hash);
                 if(!$statement -> execute($binding)){
                     throw new Exception("Could not execute query.");
                 }
              }
              else{
                throw new Exception("Could not prepare statement.");

              }
         }
         else{
            throw new Exception("Invalid data.");
         }


       }
       catch(Exception $e){
           throw new Exception($e->getMessage());
       }

    }

    public function get_user_id(){
       $id="";
       session_start();
       if(!empty($_SESSION["id"])){
          $id = $_SESSION["id"];
       }
       session_write_close();
       return $id;
    }

    public function get_user_name($id){
       $name=false;

       if(empty($id)){
         throw new Exception("User has no valid id");
       }

       try{
          $query = "SELECT login FROM journalists WHERE id=?";
          if($statement = $this->prepare($query)){
             $binding = array($id);
             if(!$statement -> execute($binding)){
                     throw new Exception("Could not execute query.");
             }
             else{
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                $name = $result['login'];
             }
          }
          else{
                throw new Exception("Could not prepare statement.");
          }

       }
       catch(Exception $e){
          throw new Exception($e->getMessage());
       }
       return $name;
    }


    public function delete_user($id){
       if(empty($id)){
         throw new Exception("User has no valid id");
       }
       if(!empty($id) && $id=="1"){
         throw new Exception("Cannot delete super user!");
       }

       try{
          $query = "DELETE FROM journalists WHERE id=?";
          if($statement = $this->prepare($query)){
             $binding = array($id);
             if(!$statement -> execute($binding)){
                     throw new Exception("Could not execute query.");
             }
          }
          else{
                throw new Exception("Could not prepare statement.");
          }
       }
       catch(Exception $e){
          throw new Exception($e->getMessage());
       }
    }

    public function sign_in($user_name,$password){
       try{
          $query = "SELECT id, salt, hashed_password FROM journalists WHERE login=?";
          if($statement = $this->prepare($query)){
             $binding = array($user_name);
             if(!$statement -> execute($binding)){
                     throw new Exception("Could not execute query.");
             }
             else{
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                $salt = $result['salt'];
                $hashed_password = $result['hashed_password'];
                if($this->generate_password_hash($password,$salt) !== $hashed_password){
                    throw new Exception("Account does not exist!");
                }
                else{
                   $id = $result["id"];
                   $this->set_authenticated_session($id,$hashed_password);
                }
             }
          }
          else{
                throw new Exception("Could not prepare statement.");
          }

       }
       catch(Exception $e){
          throw new Exception($e->getMessage());
       }
    }


    private function set_authenticated_session($id,$password_hash){
          session_start();

          //Make it a bit harder to session hijack
          session_regenerate_id(true);

          $_SESSION["id"] = $id;
          $_SESSION["hash"] = $password_hash;
          session_write_close();
    }

    private function generate_password_hash($password,$salt){
          return hash("sha256", $password.$salt, false);
    }

    private function generate_salt(){
        $chars = "0123456789ABCDEF";
        return str_shuffle($chars);
    }

    public function validate_user_name($user_name){
        // is it a valid name?
        // use get_user_id function. if empty then it doesn't exist
        // if all good return true, other return false
        return true;
    }

    public function validate_passwords($password, $password_confirm){
       if($password === $password_confirm && $this->validate_password($password)){
          return true;
       }
       return false;
    }

    public function validate_password($password){
      //Does the password pass the strong password tests
      return true;
    }

public function set_privilege($login){
  try {


  $query = "UPDATE journalists SET privilege = '2' WHERE login = ?";
  if($statement = $this->prepare($query)){
     $binding = array($login);
     if(!$statement -> execute($binding)){
             throw new Exception("Could not execute query.");
     }


  } else {
    throw new Exception("Could not prepare statement.");
  }
}



       catch(Exception $e){
           throw new Exception($e->getMessage());
       }
}

    public function sign_out(){
        session_start();
        if(!empty($_SESSION["id"]) && !empty($_SESSION["hash"])){
           $_SESSION["id"] = "";
           $_SESSION["hash"] = "";
           $_SESSION = array();
           session_destroy();
        }
        session_write_close();
    }
}
