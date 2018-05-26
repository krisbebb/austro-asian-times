

<?php

if (!$story['headline']){
  echo "<label for='headline'>Headline</label>";
  echo  "<input type='text' id='headline' name='headline' autofocus/>";
} else {
  error_log($story['headline']);
echo "<input id='headline' type='hidden' name='headline' value='{$story['headline']}'>{$story['headline']}</br></br>";
}
?>
