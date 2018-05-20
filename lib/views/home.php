<h1>The Austro-Asian Times</h1>

<p><?php echo $message ?></p>

<?php
if(!empty($articles)){

   echo "<table border='1'>";
   echo "<tr><th>article_id</th> <th>headline</th><th colspan='3'>Actions</th></tr>";
   foreach($articles As $article){

          echo "<tr><td>{$article['article_id']}</td> <td>{$article['headline']}</td>
          <td>
             <form action='/member/{$article['article_id']}' method='GET'>
                <input type='submit' value='Show' />
             </form>


          </td>
          <td>
             <form action='/members/{$article['article_id']}' method='POST'>
                <input type='hidden' name='_method' value='delete' />
                <input class='delete' type='submit' value='Delete' />
             </form>
          </td>


          </tr>";
       }
       echo "</table>";
}
else{
  echo "<p>No articles yet</p>";
}

?>
