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
   }
   if(isset($is_admin) && $is_admin){
     echo "<li><a href='/members'>Users</a></li>";
       // echo "<li><a href='/signup'>Add User</a></li>";
     }
     if(isset($authenticated) && $authenticated){
       echo "<li><a href='/my_articles'>My Articles</a></li>'";
       echo "<li><a href='/change'>Change Password</a></li>";
       echo "<li><a href='/signout'>Sign out</a></li>";
    }




     else{
        echo "<li><a href='/signin'>Sign in</a></li>";
     }

 ?>



</ul>
</nav>


<div id='content'>
  <h1>The Austro-Asian Times</h1>
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
<div id="footer">
<?php
  if(isset($authenticated) && $authenticated){
     echo "<p>Signed in</p>";
  }
  else{
     echo "<p>Not signed in</p>";

  }
?>
</div> <!-- end footer -->
</div> <!-- end main -->

<!-- Is there a better place to put the scripts? -->
<script src="/js/jquery-1.9.1.js" type="text/javascript"></script>
<script src="/js/delete.js" type="text/javascript"></script>
<script src="/js/delete_article.js" type="text/javascript"></script>



</body>
</html>
