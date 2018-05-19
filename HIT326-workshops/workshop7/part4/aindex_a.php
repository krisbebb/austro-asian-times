<!DOCTYPE html>
<html> 
<head>
<meta charset='utf-8' />
<title>Email Regular Expression Tester</title>

<!-- These styles should be moved to a CSS style sheet eventually
     Since this is the only page which ever uses them, keep them here for now -->
<style type="text/css">
  input {
       font-size:2em;
       width:100%; 
	   height:4em;
       display:block	   
  }
  
  input[type=submit]{
    width:4em;
	height:3em;
	font-size:1em;
  }
  
  #email{
     font-family: monospace
  }
  
  .match{
       font-size:2em;
	   color:#00f;
	   padding: 0.5em;
	   text-align:center;
	   border: 1px #c00 solid;
  }
</style>
</head>
<body>
<h1>Simple Email Regular Expression Tester</h1>
<p>Type any email address into the upper text box. </p>
<div>
<form action='' method='GET'>
<label for='email'>Email address to check</label>
<input type='text' id='email' name='email' 
<?php
  if(!empty($_GET['email'])){
    echo "value='".$_GET['email']."'";
  }
?>
/>
<input type='submit' value='RUN' />
</form>
</div>
<p class='match'>Is it valid?
<?php
  if(!empty($_GET['email'])){
     if($result=filter_var($_GET['email'],FILTER_VALIDATE_EMAIL)){
	    echo "Yes. {$result} is valid";
	 }
	 else{
	    echo "No";	 
	 }
  }
?>
</p>

<p>See <a href='http://en.wikipedia.org/wiki/Email_address'>Email address standards</a> for the various RFC's.</p>
</body>
</html>