<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<title>Simple Regular Expression Tester</title>

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

  label{
    font-weight:700;
	color:#00F;
  }
  .match{
       font-size:2em;
	   color:#00f;
	   padding: 0.5em;
	   text-align:center;
	   border: 1px #c00 solid;
  }

  #tocheck, #regex{
    font-family:monospace
  }

  li{
     list-style:none
  }

  .good{
    color:#090
  }

  .bad{
    color:#F00;
  }
</style>
</head>
<body>
<h1>Simple Regular Expression Tester</h1>
<p>Type any text into the upper text box. Type any Perl Regular Expression into the lower text box. Include the usual forward slashes in the expression i.e. <b>/</b>hello<b>/</b></p>
<p>Capturing is enabled by including parentheses as usual.</p>
<div>
<form action='' method='GET'>
<label for='tocheck'>String to check</label>
<input type='text' id='tocheck' name='tocheck' value='http://www.example.com/?show&user=23'


/>

<!-- <label for='regex'>Regex</label>
<input type='text' id='regex' name='regex'
<?php
  if(!empty($_GET['regex'])){
    echo 'value="'.$_GET['regex'].'"';


  }
?>

/> -->
<form action='' method='GET'>

<input type='submit' value='RUN' />
</form>
</div>
<p class='match'>Do we have a match?
<?php
  if(!empty($_GET['tocheck'])){
     // Note @ suppresses warnings from PHP.
     if($times =  @preg_match('/^(http:\/\/www\.example\.com\/)\?(show)&(user)=(23)$/',$_GET['tocheck'],$matches)){
       $times = sizeof($matches);
      echo "<span class='good'>Yes. It was matched {$times} time(s).</span>";
   }
   elseif(is_bool($times) && $times===False){
        echo "<span class='bad'>No, we an error with PREG_MATCH</span>";
   }
   else{
      echo "<span class='bad'>No, match!<span>";
   }
}
?>
</p>
<?php
$newstring = $matches[1].$matches[3].'/'.$matches[2].'/'.$matches[4];
echo "<p>New string is $newstring</p>";
 ?>


</body>
</html>
