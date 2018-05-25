<h1>Member :: <?php echo $name ?></h1>

<?php
if(!empty($stories)){

   echo "<table border='1'>";
   echo "<th>headline</th>

   <th>created_at</th>
   <th>updated_at</th>


   <th colspan='3'>Actions</th>
   </tr>";


   foreach($stories As $story){


        echo "<tr>
        <td><a href = 'story/{$story['article_id']}'>{$story['headline']}</a></td>

        <td>{$story['created_at']}</td>
        <td>{$story['updated_at']}</td>


        <td>
           <form action='/story/{$story['article_id']}/edit' method='POST'>
              <input type='submit' value='Edit' />
           </form>


        </td>

       <td>
          <form action='/story/{$story['article_id']}' method='POST'>
             <input type='hidden' name='_method' value='delete' />
             <input class='delete_article' type='submit' value='Delete' />
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
</br>
<a class="button" href="/add_article">Add new article</a>
