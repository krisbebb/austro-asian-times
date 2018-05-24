<h1>Member :: <?php echo $name ?></h1>

<?php
if(!empty($stories)){

   echo "<table border='1'>";
   echo "<th>headline</th>
   <th>Tags</th>
   <th>created_at</th>
   <th>updated_at</th>

   </tr>";
   // <th colspan='3'>Actions</th>


   foreach($stories As $story){


        echo "<tr>
        <td><a href = 'story/{$story['article_id']}'>{$story['headline']}</a></td>
        <td>{$story['tags']}</td>
        <td>{$story['created_at']}</td>
        <td>{$story['updated_at']}</td>
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
