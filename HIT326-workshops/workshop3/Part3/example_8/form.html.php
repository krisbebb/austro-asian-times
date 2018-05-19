<!doctype html>
<html>
<head>
<meta charset='utf-8' />
<title>Week 3 examples</title>
</head>
<body>
<h1>Add player</h1>
<p><a href='index.php?list'>Team list</a></p>
<p><a href='index.php'>Home</a></p>


<form action='index.php' method='POST'>
 <input type='hidden' name='_method' value='post' />
 <label for='first-name'>First name</label>
 <input type='text' id='first-name' name='fname' />
 <label for='family-name'>Family name</label>
 <input type='text' id='family-name' name='sname' />
 <label for='games'>Games</label>
 <input type='text' id='games' name='games' />

 <input type='submit' value='Create new user' />
</form>


</body>
</html>