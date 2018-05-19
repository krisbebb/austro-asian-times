<?php
# Set to noisy error reporting for development. Comment out later for production mode.
ini_set('display_errors','On');
error_reporting(E_ERROR | E_PARSE);

# Paths
DEFINE("LIB",$_SERVER['DOCUMENT_ROOT']."/lib");
DEFINE("VIEWS",LIB."/views");
DEFINE("PARTIALS",VIEWS."/partials");

# Paths to actual files
DEFINE("DB",LIB."/db.php");
DEFINE("APP",LIB."/application.php");

# Define a layout
DEFINE("LAYOUT","standard");

require APP;

//Global, damn it! Oh well we'll take care of this somehow later on ... stay tuned. It is also used in two files: here and Application.php. This makes this approach "brittle" and prone to error if we are not careful.

$messages = array();


get("/",function(){
   force_to_http("/");
   $messages["message"]="Welcome";
   $messages["title"] = "Home";
   render($messages,LAYOUT,"home");
});

get("/?signin",function(){
   force_to_https("/?signin");
   $messages["title"] = "Sign in";
   render($messages,"standard","signin");
});

get("/?signup",function(){
   force_to_https("/?signup");
   $messages["title"] = "Sign up";
   render($messages,LAYOUT,"signup");
});

get("/?change",function(){
   force_to_https("/?change");
   $messages["title"] = "Change password";
   render($messages,LAYOUT,"change_password");
});


get("/?signout",function(){
   force_to_https("/?signout");
   // set a session message
   set_flash("You are now signed out.");

   //Now we destroy the session. Should this go here in the controller or in the model?

   //we don't render anything here because we are about to redirect to the home page
   redirect_to("/");
});


post("/?signup",function(){
  set_flash("Lovely, you are now signed up,".form('name'));
  redirect_to("/");
});

post("/?signin",function(){
  set_flash("Lovely, you are now signed in!");
  redirect_to("/");
});

put("/?change",function(){
  set_flash("Password is changed");
  redirect_to("/");
});

# The Delete call back is left for you to work out

error_404(function(){
    header("HTTP/1.0 404 Not Found");
    $messages["title"] = "Page not found";
    render($messages,LAYOUT,"404");
});
