<!DOCTYPE html>
<!-- http://htmlshell.com/ -->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Part7</title>
  </head>
  <body>
    <form action='' method='GET'>
      <label for='search'>Search example</label>
      <input type='text' id='search' name='search' />
      <input type='submit' value='Search' />
      </form>
    <?php
      echo "<h1>{$_GET['search']}</h1>";

    ?>
  </body>
</html>
