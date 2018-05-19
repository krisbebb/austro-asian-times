<?php
/* SET to display all warnings in development. Comment next two lines out for production mode*/
ini_set('display_errors','On');
error_reporting(E_ERROR | E_PARSE);

/* Set the path to the Application folder */
DEFINE("LIB",$_SERVER['DOCUMENT_ROOT']."/lib/");

/* Note we are not using VIEWS in this example */
/* Set the path to actual Application file */
require LIB."Application.php";

/* Here is our Controller code i.e. API if you like.  */

get("/",function($app){
    echo "<h1>Home</h1>";
    echo "<h2>Route is: {$app->get_route()}</h2>";
    exit();
});

get("/signin",function($app){
    echo "<h1>Signin</h1>";
    echo "<h2>Route is: {$app->get_route()}</h2>";
    exit();
});

get("/signup",function($app){
    echo "<h1>Signup</h1>";
    echo "<h2>Route is: {$app->get_route()}</h2>";
    exit();
});

get("/change",function($app){
    echo "<h1>Change password</h1>";
    echo "<h2>Route is: {$app->get_route()}</h2>";
    exit();
});

/* If we got this far then the "page is not found" i.e. 404 error */
/* No output yet */

echo "<h1>Well looks like we don't have a route for this request. Ok, it's a 404 error then.</h1>";
