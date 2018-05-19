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
