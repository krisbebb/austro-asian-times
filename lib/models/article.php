<?php
class Article extends Database{


   public function is_db_empty(){
       $is_empty = false;
       try{
          $query = "SELECT article_id FROM articles WHERE id=?";

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
    public function get_article($id){
      if(empty($id)){
        throw new Exception("article_id has no valid id");
      }

      try{
         $query = "SELECT headline, data, created_at, updated_at, firstname, lastname from articles, journalists
         WHERE articles.created_by = journalists.id AND article_id=?";
         if($statement = $this->prepare($query)){
            $binding = array($id);
            if(!$statement -> execute($binding)){
              throw new Exception("Could not execute query.");
            }
            else{
               $results = $statement->fetch(PDO::FETCH_ASSOC);
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


    public function get_articles(){
       try{
          // $query = "SELECT article_id, headline FROM articles";
          $query = "SELECT * FROM articles";
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
    public function add_article($headline, $data, $created_by){
      try{

        $query = "INSERT INTO articles (headline,data,created_by) VALUES (?,?,?)";
        if($statement = $this->prepare($query)){
           $binding = array($headline,$data,$created_by);
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

  }
