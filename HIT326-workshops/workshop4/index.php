<?php
DEFINE("LIB",$_SERVER['DOCUMENT_ROOT']."/../lib");
DEFINE("DB",LIB."/db");
DEFINE("VIEW",LIB."/views");
require LIB."/functions.php";
require DB.'/db.php';

if(isset($_GET['new'])){
    require VIEW.'/form.html.php';
	exit();
}


if(isset($_GET['list'])){
   $errors = array();
   $db = get_db($errors);
   if(!$db){
      $errors[] = "Can't get database connection.";
      require VIEW.'/db_error.html.php';
	  exit();
   }
   $list = null;
   try{
       $query = "SELECT fname,sname,games FROM players";
       $statement = $db->prepare($query);
       $statement -> execute();
       $list = $statement->fetchall(PDO::FETCH_ASSOC);
       require VIEW.'/list.html.php';
   }
   catch(PDOException $e){
      $errors[] = "Problem with query: {$e->getMessage()}.";
      require VIEW.'/db_error.html.php';
	  exit();

   }
   exit();
}


if(isset($_POST['_method']) && $_POST['_method']=='post'){
   if(!empty($_POST['fname']) && !empty($_POST['sname']) && !empty($_POST['games'])){
         $db = get_db();
         if(!$db){
            set_session_message("flash","Problem with database - new player cannot be created");
            header('Location: index.php?new');
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
           set_session_message("flash","Problem with database: {$e->getMessage()}");
           header('Location: index.php?new');
           exit();

         }
         set_session_message("flash","New player has been created.");
         header('Location: index.php?new');

         exit();
    }
    else{
       set_session_message("flash","Unable to create new player. Did you fill out all the fields?");
       header('Location: index.php?new');
       exit();
    }

}


require VIEW.'/home.html.php';
?>
