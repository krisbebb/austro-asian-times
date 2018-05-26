<h1>Add News Article</h1>
<div>
<form action='/add_article' method='POST'>
 <input type='hidden' name='_method' value='post' />
 <?php
    require PARTIALS."form.article.headline.php";
  
	require PARTIALS."form.article.data.php";
  require PARTIALS."form.article.tags.php";

 ?>
 <input type='submit' value='Submit' />
</form>
</div>
