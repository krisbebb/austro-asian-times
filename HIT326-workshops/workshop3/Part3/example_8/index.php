<?php
if(isset($_GET['new'])){
    require 'form.html.php';
	exit();
}


if(isset($_GET['list'])){
   $errors = array();
   require 'db.php';  
   if(!$db){
      require 'db_error.html.php';
	  exit();
   }
   $list = null; 
   try{   
       $query = "SELECT fname,sname,games FROM players";
       $statement = $db->prepare($query);
       $statement -> execute();
       $list = $statement->fetchall(PDO::FETCH_ASSOC);
       require 'list.html.php';
   }
   catch(PDOException $e){
       $errors[] = "Statement error because: {$e->getMessage()}";
       require 'db_error.html.php';
	   exit();

   }
   exit();
}


if(isset($_POST['_method']) && $_POST['_method']=='post'){
   if(!empty($_POST['fname']) && !empty($_POST['sname']) && !empty($_POST['games'])){
         $errors = array();
         require 'db.php';  
         if(!$db){
            require 'db_error.html.php';
            exit();
         }
         $fname = $_POST['fname'];
         $sname = $_POST['sname'];
         $games = $_POST['games'];
         try{   
           $query = "INSERT INTO players (fname,sname,games) VALUES (?,?,?)";
           $statement = $db->prepare($query);
           $binding = array($fname,$sname,$games);
           $statement -> execute($binding);
         }
         catch(PDOException $e){
           $errors[] = "Statement error because: {$e->getMessage()}";
           require 'db_error.html.php';
           exit();

         }
         header('Location: index.php?list');       

         exit();
    }
    else{
       header('Location: index.php?new');
       exit();
    }

}


require 'home.html.php';
?>



