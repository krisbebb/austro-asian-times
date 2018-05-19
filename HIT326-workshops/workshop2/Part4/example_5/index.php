<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8' />
  <title>Transaction Demo</title>
</head>

<body>
<h1>Transaction Demo</h1>
<p>This demonstration deliberately causes an error on INSERT, and should rollback.</p>
<?php

//Initialise errors array. This is the array in which catch all the errors, if any, and print them out at the end of the script
$errors = array();

//Use try-catch clause to check if error occurred on DB connection 
try{ 
  //Create a new PDO database connection
  $db = new PDO('sqlite:test.db');
  
  //Set this attribute while testing so SQLite doesn't silence error reporting
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //Start transaction
  $db->beginTransaction();
  
  //Insert some new users
  $db->query('INSERT INTO users (name) values ("Fred");');
  $db->query('INSERT INTO users (name) values ("Dennis");');
  $db->query('INSERT INTO users (name) values ("Steve");');
 
  // Cause an error/exception to rollback. Alice is already in the table and must be unique
  $db->query('INSERT INTO users (name) values ("Alice");');

}
catch(PDOException $e){
    //If the code execution get's to here then we have a DB error
 
    //The rollback
    $db->rollback();

	//Write the error message to the errors array
    $errors[]="Error with query. Database rolled back. ".$e->getMessage();
}

//Check if any errors occurred along the way, if so print them out.
if(count($errors) > 0){
   echo "<p>Oooops we have errors!</p>";
   echo "<ul>";
   foreach($errors As $error){
      echo "<li>{$error}</li>";
   }
   echo "</ul>";
}
?>

</body>
</html>