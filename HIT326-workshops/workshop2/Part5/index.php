<!DOCTYPE html>
<!-- http://htmlshell.com/ -->
<html>
  <head>
    <meta charset="UTF-8">
    <title>$_SERVER array keys and values</title>
  </head>
  <body>
    <?php
      foreach ($_SERVER as $key=>$value){
        echo "<h3>{$key} = {$value}</h3>";
      }

    ?>
  </body>
</html>
