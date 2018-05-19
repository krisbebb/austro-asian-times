<?php

DEFINE("LIB",$_SERVER['DOCUMENT_ROOT']."/../lib");
DEFINE("VIEWS",LIB."/views");
DEFINE("PARTIALS",VIEWS."/partials");

$layout = 'standard';
// $layout = 'mobile';

// $content = 'login';
$content = 'create-user';

require VIEWS."/{$layout}.layout.php";
?>
