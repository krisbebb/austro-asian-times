<label for='headline'>Headline</label>
<input type='text' id='headline' name='headline'
<?php
if ($story['headline']){
  error_log($story['headline']);
echo "value = \"{$story['headline']}\"";
}
?>
 autofocus/>
