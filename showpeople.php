<?php

include_once("dbconfig.php");
 
//fetching data in descending order
$result = $DB_con->query("SELECT * FROM users ORDER BY user_id DESC");
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
 
    <table width='80%' border=0>
 
    <tr bgcolor='#CCCCCC'>
        <td>Name</td>
        <td>Address</td>
        <td>Birthday</td>
        <td>City</td>
        <td>Action</td>
    </tr>
    <?php     
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {         
        echo "<tr>";
        echo "<td>".$row['first_name']."</td>";
        echo "<td>".$row['last_name']."</td>";
        echo "<td>".$row['birthday']."</td>";
        echo "<td>".$row['city']."</td>";    
        //echo "<td><a href=\"edit.php?id=$row[user_id]\">Edit</a> | <a href=\"delete.php?id=$row[user_idid]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>"; 
        echo "<td><a href=\"edit.php?id=$row[user_id]\">Follow</a> | <a href=\"delete.php?id=$row[user_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Unfollow</a></td>";
    }
    ?>
    </table>
</body>
</html>