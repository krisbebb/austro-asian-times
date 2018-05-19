<?php
/* SET to display all warnings in development. Comment next two lines out for production mode*/
ini_set('display_errors','On');
error_reporting(E_ERROR | E_PARSE);

/************************** CONFIGURE PATHS *************************************/
/* Set the path to the framework folder */
DEFINE("LIB",$_SERVER['DOCUMENT_ROOT']."/lib/");

/* SET VIEW paths */
DEFINE("VIEWS",LIB."views/");
DEFINE("PARTIALS",VIEWS."partials/");

/* set the path to the Model classes folder */
DEFINE("MODELS",LIB."models");

/* Path to the Mouse application i.e. the Mouse Framework */
DEFINE("MOUSE",LIB."mouse.php");

/* Define a default layout */
DEFINE("LAYOUT","standard");
/************************ END CONFIGURE PATHS *************************************/


/* Start the Mouse application */
require MOUSE;

get("/",function($app){
   $app->render(LAYOUT,"home");
});


resolve();