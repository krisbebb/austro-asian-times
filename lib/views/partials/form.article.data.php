<label for='data'>Data</label>
<!-- <input type='text' id='data' name='data'/> -->
<br/>
<textarea name="data" rows="20" cols="50">
  <?php
  if ($story['data']){
    error_log($story['data']);
  echo "{$story['data']}";
  }
  ?>
</textarea>
