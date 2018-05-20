<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<title><?php echo $title ?></title>
 <link rel="stylesheet" href="/css/standard.css" />
</head>
<body>

<div id="main">
<nav>
<ul>
<?php
  if(!isset($super_user) && !$super_user){
     echo "<li><a href='/'>Home</a></li>";
     if(isset($authenticated) && $authenticated){
        echo "<li><a href='/members'>Members</a></li>";
        echo "<li><a href='/signout'>Sign out</a></li>";
        echo "<li><a href='/signup'>Sign up</a></li>";
        echo "<li><a href='/add_article'>Add Article</a></li>";
     }
     else{
        echo "<li><a href='/signin'>Sign in</a></li>";
     }
  }
 ?>



</ul>
</nav>


<div id='content'>
<?php
  if(!empty($flash)){
    echo "<p class='flash'>{$flash}</p>";
  }
  if(!empty($error)){
    echo "<p class='flash'>{$error}</p>";
  }
  require $content;
?>
</div> <!-- end content -->
<footer>
<?php
  if(isset($authenticated) && $authenticated){
     echo "<p>Signed in</p>";
  }
  else{
     echo "<p>Not signed in</p>";

  }
?>
</footer>
</div> <!-- end main -->

<!-- Is there a better place to put the scripts? -->
<script src="/js/jquery-1.9.1.js" type="text/javascript"></script>
<script src="/js/delete.js" type="text/javascript"></script>

</body>
</html>
