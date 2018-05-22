<h1>The Austro-Asian Times</h1>

<p><?php echo $message ?></p>

<?php
if(!empty($articles)){

   echo "<table border='1'>";
   echo "<tr><th>article_id</th>
   <th>headline</th>
   <th>created_by</th>
   <th>created_at</th>
   <th>updated_at</th>

   </tr>";
   // <th colspan='3'>Actions</th>


   foreach($articles As $article){

          echo "<tr><td>{$article['article_id']}</td>
          <td><form action='/story/{$article['article_id']}' method='POST'>
             <input type='submit' value='{$article['headline']}' />
          </form></td>
          <td>{$article['created_by']}</td>
          <td>{$article['created_at']}</td>
          <td>{$article['updated_at']}</td>
          </tr>";
       }

       // <td>
       //    <form action='/member/{$article['article_id']}' method='GET'>
       //       <input type='submit' value='Show' />
       //    </form>
       //
       //
       // </td>
       // <td>
       //    <form action='/members/{$article['article_id']}' method='POST'>
       //       <input type='hidden' name='_method' value='delete' />
       //       <input class='delete' type='submit' value='Delete' />
       //    </form>
       // </td>
       echo "</table>";
}
else{
  echo "<p>No articles yet</p>";
}

?>
