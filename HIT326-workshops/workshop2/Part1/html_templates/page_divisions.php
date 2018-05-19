<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8' />
  <title>Basic template</title>
  <meta name='robots' content='noindex, nofollow' />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  
<!--
  <meta name='keywords' content='' />
  <meta name='description' content='' />
  <link rel='stylesheet' type='text/css' href='path-to-file' media='all' />
  <script type='text/javascript' src='path-to-file'></script> 
  <link rel='next' href='path-to-file' />
  <link rel='alternate' type='application/rss+xml' title='RSS' href='path-to-feed' />
  <link rel='shortcut icon' href='path-to-image' />
-->
</head>
<body>
<div id='page'>

<div id='header'>
<!-- or use HTML5's semantic <header></header> -->
  <h1>Main heading</h1>
    <div id='navbar'>
    <!-- or use HTML5's semantic <nav></nav> -->
      <ul>
        <li><a href=''>Item 1</a></li>
        <li><a href=''>Item 2</a></li>
      </ul>
    </div> <!-- end id=navbar -->
</div>  <!-- end id=header-->

<div id='content'>
  <?php 
    echo '<p>Content does here</p>';
  ?>
</div> <!-- end id=content -->

<div id="footer">
<!-- or use HTML5's semantic <footer></footer> -->
  <p>Footer goes here</p>
</div> <!-- end id=footer -->

</div> <!-- end id=page -->
</body>
</html>