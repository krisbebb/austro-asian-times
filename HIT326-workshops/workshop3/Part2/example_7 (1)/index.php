<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8' />
  <title>Airports :: Workshop 3 Part 2</title>
</head>

<body>
<h1>Airports</h1>
<form action="" method="GET">
   <label for="country">Country</label>
   <input type="text" id="country" name="country" />
   <input type="submit" value ="Find Airports in Country" />
</form>

<?php
if(!empty($_GET['country'])){
   $country = htmlspecialchars($_GET['country'],ENT_QUOTES, 'UTF-8');
   echo "<h2>Searched for {$country}</h2>";

   try{
       $db = new PDO('mysql:host=localhost;dbname=airports_db', 'root','root');
       $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $statement = $db->prepare("SELECT name, city, country FROM airports WHERE country = ?");
       $binding = array($country);
       $statement -> execute($binding);

       $result = $statement->fetchall(PDO::FETCH_ASSOC);
       if(!empty($result)){
         /* This is where the foreach loop goes
            Try it yourself.
         */
         foreach ($result as $val){
           echo "<h2>Airport {$val['name']} is in {$val['country']}";
         }
       }
       else{
         echo "<p>No results</p>";
       }
   }
   catch(PDOException $e){
       echo "<h2>Error with database because: {$e->getMessage()}</h2>";
   }
}
else{
   echo "<p>Type a country name.</p>";
}
?>

</body>
</html>
