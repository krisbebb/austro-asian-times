<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8' />
  <title>Airports demo with PDO Prepared statements</title>
</head>

<body>
<h1>Airports demo with PDO Prepared statements</h1>
<h2>SELECT name, city, country FROM airports WHERE city LIKE "New%" AND country = "United States"</h2>

<?php
//Initialise errors array. This is the array in which catch all the errors, if any, and print them out at the end of the script
$errors = array();

try{
  //Create a new PDO database connection
  $db = new PDO('sqlite:test.db');

  //Set this attribute while testing so PDO doesn't silence error reporting
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //Here is the prepared statement
   if($statement = $db->prepare("SELECT name, city, country FROM airports WHERE city LIKE ? AND country = ?")){

      //The values in this array are bound to the question mark in the prepared SELECT
      $binding = array('New%', 'United States');

      $statement -> execute($binding);

      //Make sure we get the associative array
      $result = $statement->fetchall(PDO::FETCH_ASSOC);

      //Check for results
      if(!empty($result)){
         //Loop getting each name
         foreach($result as $item){
           echo "<p>{$item['name']}, {$item['city']},
           {$item['country']}</p>";
         }
      }
      else{
         echo "<p>No results</p>";
      }
  }
}
catch(PDOException $e){
  $errors[]=$e->getMessage();
}

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
