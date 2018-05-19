<?php
/* Enable full error reporting for development.
   Disable for production.
*/
ini_set('display_errors','On');
error_reporting(E_ERROR | E_PARSE);

/*
Please note that this demonstration does not attempt to solve the "reload" problem
*/

function get_route(){
  /*Note how the query part (i.e. part after the host is stored in the super-global 
     $_SERVER['REQUEST_URI']). This identifies the resource.
  */
  return $_SERVER['REQUEST_URI'];  
}

function get_method(){
     if($method = form("_method")){
        return strtoupper($method);
     }
     if(!empty($_SERVER['REQUEST_METHOD'])){
         return strtoupper($_SERVER['REQUEST_METHOD']);
     }
     return "GET";
}
    
function form($key){
	if(isset($_POST[$key])){ 
      return $_POST[$key];
    }
    return false;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Example 1</title>
</head>
<body>
    <h1>Request Tester</h1>
    <!-- Try different requests like the following from the address bar of your browser: 
         Note how the query part (i.e. part after the host is stored in the super-global 
         $_SERVER['REQUEST_URI'])
    
         Don't forget that this only works if you set the rewrite rule with an appropriate regex.
    
         This example requires .htaccess as decsribed in the notes
    -->
    <h2>This is the route:====> <?php echo get_route() ?></h2>
    <h2>This is the incoming method: ====> <?php echo get_method() ?></h2>
    <hr />
    <p>Here are some same hyperlinks with various requests - try them and observe the incoming request.</p>
    <ul>
        <li><a href="/">This page</a></li>
        <li><a href="/notes">Lecture notes</a></li>
        <li><a href="/notes/1">Lecture notes 1</a></li>
        <li><a href="/notes/2">Lecture notes 2</a></li>
        <li><a href="/article/2013/8/21">Article</a></li>
        <li><a href="/blog/jones/2091">A blog entry by Jones</a></li>
        <li><a href="/car/holden/hq">Kingswoods</a></li>
        <li><a href="/tool/screwdriver/flathead">Flathead screwdrivers</a></li>
    </ul>
    <hr />
    <div>
    <form action="/user" method="POST">
        <input type="hidden" name="_method" value="post" />
        <input type="text" name="user-name" />
        <input type="submit" value="Add name" />
    </form>
    </div>

    <hr />

    <div>
    <form action="/user/34" method="POST">
        <input type="hidden" name="_method" value="put" />
        <input type="text" name="user-name" />
        <input type="submit" value="Update name" />
    </form>
    </div>

    <hr />

    <div>
    <form action="/user/34" method="POST">
        <input type="hidden" name="_method" value="delete" />
        <input type="submit" value="Delete (Fred Smith)" />
    </form>
    </div>

    <hr />

    <div>
    <form action="/user/34" method="GET">
        <input type="submit" value="Show Fred Smith">
    </form>
    </div>

    <hr />

    <div>
    <form action="/search" method="GET">
        <input type="text" name="search" />
        <input type="submit" value="Find">
    </form>
    </div>

    <hr />

    <p>Also see the source. Carefully check the way the the href values are expressed.</p>
    <p>Make sure you have written an ".htaccess" file as described in the notes. It should be in the same folder as this file.  It will "funnel" all requests into this file i.e. index.php</p>
    <p>Now we can use readable and clean URIs for our REST requests.</p>
</body>
</html>