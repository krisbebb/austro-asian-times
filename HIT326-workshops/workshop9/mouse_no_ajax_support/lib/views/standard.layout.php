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
     <li><a href='/'>Home</a></li>
</ul>
</nav>


<div id='content'>
<?php
  if(!empty($flash)){
    echo "<p class='flash'>{$flash}</p>";
  }
  require $content;
?>
</div> <!-- end content -->
<footer>
<p>Mouse Web Application Framework - 2013</p>
</footer>
</div> <!-- end main -->

<!-- jQuery -->
<!--
<script src="/js/jquery-1.9.1.js" type="text/javascript"></script>
-->

</body>
</html>