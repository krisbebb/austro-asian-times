<h1>Story :: <?php echo $story['headline']?></h1>

<?php

echo "<p>Written by {$story['firstname']} {$story['lastname']}, {$story['created_at']}</p>";
echo "<p>Last updated at {$story['updated_at']}</p>";
echo "<p>{$story['data']}</p>";
echo"<p>Tags: ";
foreach ($tags as $key=>$data){
  echo "{$data} ";
}
echo"</p>";
?>
