<!doctype html>
<html>
<head>
<meta charset='utf-8' />
<title>Week 3 example - Part 3</title>
</head>
<body>
<h1>Home</h1>
<p><a href='index.php?list'>Team list</a></p>
<p><a href='index.php?new'>Add player</a></p>
<?php
  //Print any errors 
  if(!empty($errors)){
     echo "<p>We have errors</p>";
	 echo "<ul>";
	 foreach($errors As $error){
	    echo "<li>{$error}</li>";
	 }
	 echo "</ul>";
  }
?>
</body>
</html>