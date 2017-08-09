<?php
include_once("dbconfig.php");
 
$idFollower = $_GET['idCurrent'];
$idToDefollow= $_GET['idToDefollow'];
//echo $idFollowed;

$a = 6;
 

//$sql = "INSERT INTO user WHERE id=:id";
//$query = $dbConn->prepare($sql);
//$query->execute(array(':id' => $id));
$sql = "DELETE FROM following WHERE followerID=:followerID && followedID=:followedID";
        $query = $DB_con->prepare($sql);
        $query->bindparam(':followerID', $idFollower);
        $query->bindparam(':followedID', $idToDefollow);
        $query->execute();
                

 
//redirecting to the page
header("Location:showpeople.php?id=$idFollower");
?>