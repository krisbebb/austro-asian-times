<?php

function get_db(){
    $db = null;

    try{
        $db = new PDO('mysql:host=localhost;dbname=blogs_db', 'root','root');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        // notice how we THROW the exception. You can catch this in your controller code in the usual way
        throw new Exception("Something wrong with the database: ".$e->getMessage());
    }
    return $db;

}

/* Other functions can go below here */

function sign_up($user_name, $password, $password_confirm){
   try{
     $db = get_db();

     if(validate_user_name($db,$user_name) && validate_passwords($password,$password_confirm)){
          $salt = generate_salt();
          $password_hash = generate_password_hash($password,$salt);
          $query = "INSERT INTO users (name,salt,hashed_password) VALUES (?,?,?)";
          if($statement = $db->prepare($query)){
             $binding = array($user_name,$salt,$password_hash);
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

function sign_in($user_name,$password){
   try{
      $db = get_db();
      $query = "SELECT id, salt, hashed_password FROM users WHERE name=?";
      if($statement = $db->prepare($query)){
         $binding = array($user_name);
         if(!$statement -> execute($binding)){
                 throw new Exception("Could not execute query.");
         }
         else{
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $salt = $result['salt'];
            $hashed_password = $result['hashed_password'];
            if(generate_password_hash($password,$salt) !== $hashed_password){
                throw new Exception("Account does not exist!");
            }
            else{
               $id = $result["id"];
               set_authenticated_session($id,$hashed_password);
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

function set_authenticated_session($id,$password_hash){
      session_start();

      //Make it a bit harder to session hijack
      session_regenerate_id(true);

      $_SESSION["id"] = $id;
      $_SESSION["hash"] = $password_hash;
      session_write_close();
}

function generate_password_hash($password,$salt){
      return hash("sha256", $password.$salt, false);
}

function generate_salt(){
    $chars = "0123456789ABCDEF";
    return str_shuffle($chars);
}

function validate_user_name($db,$user_name){
    // is it a valid name?
    // use get_user_id function. if empty then it doesn't exist
    // if all good return true, other return false

    if(!empty($user_name)){
       if($result=filter_var($user_name,FILTER_VALIDATE_EMAIL)){
  	      return true;
  	 }
   }
  	 else{
  	   return false;
  	 }


}

function validate_passwords($password, $password_confirm){
   if($password === $password_confirm && validate_password($password)){
      return true;
   }
   return false;
}

function validate_password($password){
  //Check between 8 and 255 letters, numbers or punction marks
  if(!preg_match("/^[\w\s\W]{8,255}$/",$password)){
    return false;
  }
  //Check if at least number is included
  if(!preg_match("/\d/",$password)){
    return false;
  }
  //Check if it contains at least one punctuation (non-alpha mark)
  if(!preg_match("/\W/",$password)){
    return false;
  }
  //Check if it contains at least one uppercase character
  if(!preg_match("/[A-Z]/",$password)){
    return false;
  }
  //Check if it contains at least one lowercase letter
  if(!preg_match("/[a-z]/",$password)){
    return false;
  }
  //Does the password pass the strong password tests
  return true;
}


function is_authenticated(){
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
           $db = get_db();
           $query = "SELECT hashed_password FROM users WHERE id=?";
           if($statement = $db->prepare($query)){
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

function sign_out(){
    session_start();
    if(!empty($_SESSION["id"]) && !empty($_SESSION["hash"])){
       $_SESSION["id"] = "";
       $_SESSION["hash"] = "";
       $_SESSION = array();
       session_destroy();
    }
    session_write_close();
}


function change_password($user_id, $old_pw, $new_pw, $pw_confirm){


}
