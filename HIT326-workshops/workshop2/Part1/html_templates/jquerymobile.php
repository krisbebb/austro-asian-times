<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8' />
  <title>Basic template</title>
  <meta name='robots' content='noindex, nofollow' />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!--  
    Use the following CDN hosted CSS and JS files or down the jQueryMobile files from
	http://jquerymobile.com/download/	
  -->
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.css" />
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.js"></script>
</head>
<body>
<div data-role='page'>

<div data-role='header'>
  <h1>Main heading</h1>
    <div data-role='navbar'>
      <ul>
        <li><a href=''>Item 1</a></li>
        <li><a href=''>Item 2</a></li>
      </ul>
    </div> <!-- end id=navbar -->
</div>  <!-- end id=header-->

<div data-role='content'>

  <?php 
    echo '<p>Content does here</p>';
  ?>

</div> <!-- end id=content -->

<div data-role="footer">
  <p>Footer goes here</p>
</div> <!-- end id=footer -->

</div> <!-- end id=page -->
</body>
</html>