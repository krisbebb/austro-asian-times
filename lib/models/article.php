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

         $query = "SELECT * from articles, journalists
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
    public function get_article_id($headline){
      if(empty($headline)){
        throw new Exception("No valid headline");
      }

      try{

         $query = "SELECT article_id from articles
         WHERE headline = ?";
         if($statement = $this->prepare($query)){
            $binding = array($headline);
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

    public function get_user_articles($id){
       try{
          // $query = "SELECT article_id, headline FROM articles";
          $query = "SELECT * FROM articles WHERE created_by = ?";
          if($statement = $this->prepare($query)){
             $binding = array($id);
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
    public function get_latest_articles(){
       try{
          // $query = "SELECT article_id, headline FROM articles";
          $query = "SELECT articles.headline, articles.article_id, articles.created_by, GROUP_CONCAT(tag_text) as tags, updated_at FROM articles, article_tags, tags WHERE articles.article_id = article_tags.article_id AND article_tags.tag_id = tags.tag_id GROUP BY articles.headline ORDER BY updated_at DESC LIMIT 5";
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
    public function add_article($headline, $data, $created_by, $tags){
      try{

        $query = "INSERT INTO articles (headline,data,created_by) VALUES (?,?,?)";
        if($statement = $this->prepare($query)){
           $binding = array($headline,$data,$created_by);
           if(!$statement -> execute($binding)){
               throw new Exception("Could not execute query.");
           }
         }else{
          throw new Exception("Could not prepare insert statement.");

        }
      }

      catch(Exception $e){
          throw new Exception($e->getMessage());
      }
      try{

        $query = "SELECT article_id FROM articles WHERE headline = ? AND data = ? AND created_by = ?";
        if($statement = $this->prepare($query)){
           $binding = array($headline,$data,$created_by);
           if(!$statement -> execute($binding)){
               throw new Exception("Could not execute query.");
           }
         } else{
          throw new Exception("Could not prepare select statement.");

        }
          $art_id = $statement->fetchall(PDO::FETCH_ASSOC);
          foreach($art_id as $art){
            foreach($tags as $k=>$d){
        $this->add_tags($art['article_id'],$d);

      }
      }
      }

      catch(Exception $e){
          throw new Exception($e->getMessage());
      }

  }
  public function edit_article($headline, $data, $created_by, $tags, $id){
    try{

      $query = "UPDATE articles SET headline = ?, data = ?, created_by = ? WHERE article_id = ?";
      if($statement = $this->prepare($query)){
         $binding = array($headline,$data,$created_by,$id);
         if(!$statement -> execute($binding)){
             throw new Exception("Could not execute query.");
         }
       }else{
        throw new Exception("Could not prepare insert statement.");

      }
    }

    catch(Exception $e){
        throw new Exception($e->getMessage());
    }
    try{

      $query = "SELECT article_id FROM articles WHERE headline = ? AND data = ? AND created_by = ?";
      if($statement = $this->prepare($query)){
         $binding = array($headline,$data,$created_by);
         if(!$statement -> execute($binding)){
             throw new Exception("Could not execute query.");
         }
       } else{
        throw new Exception("Could not prepare select statement.");

      }
        $art_id = $statement->fetchall(PDO::FETCH_ASSOC);
        foreach($art_id as $art){
            $this->delete_tags($art['article_id']);
        }
        foreach($art_id as $art){
          foreach($tags as $k=>$d){
            error_log("Article ID is {$art['article_id']}");

      $this->add_tags($art['article_id'],$d);

    }
    }
    }

    catch(Exception $e){
        throw new Exception($e->getMessage());
    }

  }

    public function get_tags($id){
    try{
      $query = "SELECT tag_text FROM articles, article_tags, tags WHERE articles.article_id=? AND article_tags.article_id=articles.article_id AND article_tags.tag_id=tags.tag_id GROUP BY tag_text";
      if($statement = $this->prepare($query)){
         $binding = array($id);
         if(!$statement -> execute($binding)){
           throw new Exception("Could not execute query.");
         }
         else{
           $i=1;
            while ($results = $statement->fetch(PDO::FETCH_ASSOC)){

              foreach ($results as $key=>$data){
              $results_array[$i] = $data;

              $i++;
              }
            }
            return $results_array;
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

private function delete_tags($id){
  try{

    $query = "DELETE FROM article_tags WHERE article_id = ?";
    if($statement = $this->prepare($query)){
       $binding = array($id);
       if(!$statement -> execute($binding)){
           throw new Exception("Could not execute delete query.");
       }
    }
    else{
      throw new Exception("Could not prepare delete statement.");

    }
  }
  catch(Exception $e){
      throw new Exception($e->getMessage());
  }

}
    public function add_tags($id,$tags){

    try{

      $query = "INSERT INTO article_tags (article_id,tag_id) VALUES (?,?)";
      if($statement = $this->prepare($query)){
         $binding = array($id,$tags);
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
    public function delete_article($id){
       if(empty($id)){
         throw new Exception("Article has no valid id");
       }
       // if(!empty($id) && $id=="1"){
       //   throw new Exception("Cannot delete super user!");
       // }

       try{
          $query = "DELETE FROM articles WHERE article_id=?";
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

  }
