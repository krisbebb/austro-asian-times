<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8' />
  <title>Mobile layout</title>

  <!-- These won't work unless you have a connection to the internet. For internal students: you have get outside of the CDU domain --> 
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.css" />
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.js"></script>
</head>
<body>
<div data-role='page'>

<div data-role='content'>

  <?php 
  require VIEWS."/{$content}.php";
  ?>

</div> <!-- end id=content -->


</div> <!-- end id=page -->
</body>
</html>