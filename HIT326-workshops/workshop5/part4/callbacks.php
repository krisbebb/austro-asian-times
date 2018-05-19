<?php
/* Define a single to function handle callbacks; first parameter is some value, second parameter is a function*/
function printme($val,$function){
    echo "<p>You are inside the <em>printme</em> function.";
    /* The next line does all the magic */
    echo $function($val);
}

$val = "hello";

/* printme function called with a value as first argument and an anonymous function as second argument */
printme($val,function($str){
        echo "<h1>{$str}; this call is done with an anonymous function</h1>";
        echo "<p>This is an idiom you often see in Javascript. And Node.js of course</p>";
        echo "<p>It's a technique used in event-driven programming.</p>";
        echo "<hr />";
});

/* declare an anonymous function assigned to a variable i.e. a reference*/
$myfunction = function($val){
    echo "<h2>{$val}; this call is done with a function reference</h2>";
    echo "<hr />";
};

$val = "<a href='http://www.cdu.edu.au'>CDU</a>";
/* printme function called with value as first argument and a function reference as second argument*/
printme($val,$myfunction);

$val = "<a href='http://stackoverflow.com'>StackOverflow</a>";
printme($val,$myfunction);


?>