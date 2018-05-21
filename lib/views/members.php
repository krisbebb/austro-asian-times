<h1>Members</h1>

<p>Here is a list of members</p>


<?php
  if(!empty($users)){
     echo "<table border='1'>";
     echo "<tr>
     <th>ID</th>
     <th>User Name</th>
     <th>First name</th>
     <th>Last Name</th>
     <th>Privilege</th>
     <th colspan='3'>Actions</th></tr>";
     foreach($users As $user){
            echo "<tr>
            <td>{$user['id']}</td>
            <td>{$user['login']}</td>
            <td>{$user['firstname']}</td>
            <td>{$user['lastname']}</td>
            <td>{$user['privilege']}</td>
            <td>
               <form action='/member/{$user['id']}' method='GET'>
                  <input type='submit' value='Show' />
               </form>
            </td>
            <td>
               <form action='/members/{$user['id']}' method='POST'>
                  <input type='hidden' name='_method' value='delete' />
                  <input class='delete' type='submit' value='Delete' />
               </form>
            </td>


            </tr>";
         }
         echo "</table>";
  }
  else{
    echo "<p>No Members yet</p>";
  }

?>
</ul>
