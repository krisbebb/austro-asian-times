<h1>Change Password</h1>
<div>
<form action='/change' method='POST'>
 <input type='hidden' name='_method' value='post' />
 <?php
    require PARTIALS."form.old-password.php";
	require PARTIALS."form.password.php";
  require PARTIALS."form.password-confirm.php";

 ?>
 <input type='submit' value='Change Password' />
</form>
</div>
