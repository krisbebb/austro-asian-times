<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8' />
  <title>Ex2</title>
  <meta name='keywords' content='' />
  <meta name='description' content='' />
  <meta name='robots' content='noindex, nofollow' />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
<!--
  <link rel='stylesheet' type='text/css' href='path-to-file' media='all' />
  <script type='text/javascript' src='path-to-file'></script>
  <link rel='next' href='path-to-file' />
  <link rel='alternate' type='application/rss+xml' title='RSS' href='path-to-feed' />
  <link rel='shortcut icon' href='path-to-image' />
-->
</head>
<body>

<!-- content goes here -->

<?php
  $names = array("Steven", "Alice", "Harry");
  echo "<h1>Names array</h1>";
  foreach($names as $name){
    echo "<h3>{$name}</h3>";
  }

  $enviros = array("sky"=>"blue", "sun"=>"red", "sea"=>"blue");
  echo "<h1>Values only</h1>";
  foreach($enviros as $obj=>$state){
    echo "<h3>{$state}</h3>";
  }

  $enviros = array("sky"=>"blue", "sun"=>"red", "sea"=>"blue");
    echo "<h1>Keys and Values</h1>";
  foreach($enviros as $obj=>$state){
    echo "<h3>{$obj} is {$state}</h3>";
  }


  echo "<h1>Numeric Names array</h1>";
  foreach($names as $ind=>$name){
    echo "<h3>{$ind} {$name}</h3>";
  }

?>

</body>
</html>
