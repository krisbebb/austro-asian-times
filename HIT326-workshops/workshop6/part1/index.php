<?php

DEFINE("LIB",$_SERVER['DOCUMENT_ROOT']."/workshop6/part1/lib");
DEFINE("VIEWS",LIB."/views");

$layout = 'standard';
// $layout = 'mobile';

// $content = 'login';
$content = 'crypto';

require VIEWS."/{$layout}.layout.php";
?>
