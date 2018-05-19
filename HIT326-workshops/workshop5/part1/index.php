<?php

DEFINE("LIB",$_SERVER['DOCUMENT_ROOT']."/../lib");
DEFINE("VIEWS",LIB."/views");

$layout = 'standard';
// $layout = 'mobile';

$content = 'login';

require VIEWS."/{$layout}.layout.php";
?>
