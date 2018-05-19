<?php
function set_session_message($key,$message){
   if(!empty($key) && !empty($message)){
      session_start();
      $_SESSION[$key] = $message;
      session_write_close();
   }
}

function get_session_message($key){
   $msg = null;
   if(!empty($key) && is_string($key)){
      session_start();
      if(!empty($_SESSION[$key])){
         $msg = $_SESSION[$key];
         unset($_SESSION[$key]);
      }
      session_write_close();
   }
   return $msg;
}

function clear_session_message($key){
   session_start();

   if(!empty($_SESSION[$key])){
     unset($_SESSION[$key]);
   }
   session_write_close();
}


if(isset($_POST['_method']) && $_POST['_method']=='post'){
 $message = "";
 if(!empty($_POST['name'])){
    //all ok; do the prepare INSERT statement, and assume it worked
    $message = "The name was inserted.";
 }
 else{
    $message = "The name must not be left empty.";
 }
 set_session_message('message',$message);
 header("Location:.");
 exit();
}
?>

<!DOCTYPE html>
<html>
 <head>
   <title>Session Test</title>
   <meta charset='utf-8' />
</head>
<body>
<div>
<?php
if($msg = get_session_message('message')){
  session_name("MY_PHP_SESSION");
  $sess_name = session_name();
  $sess_id = session_id();
   echo "<p>{$msg}</p>
   <p>{$sess_name}</p>
   <p>{$sess_id}</p>";

}
?>
<form action='index.php' method='POST'>
 <input type='hidden' name='_method' value='post' />
 <label for='user-name'>User name</label>
 <input type='text' id='user-name' name='name' />
 <input type='submit' value='Add user' />
</form>
</div>
</body>
</html>
