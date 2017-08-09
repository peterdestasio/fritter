<?php
include_once("dbconfig.php");
 
$idFollower = $_GET['id'];
$idFollowed = $_GET['idFollowed'];
//echo $idFollowed;


 

//$sql = "INSERT INTO user WHERE id=:id";
//$query = $dbConn->prepare($sql);
//$query->execute(array(':id' => $id));
 $sql = "INSERT INTO following(followerID, followedID) VALUES(:followerID, :followedID)";
        $query = $DB_con->prepare($sql);
                
        $query->bindparam(':followerID', $idFollower);
        $query->bindparam(':followedID', $idFollowed);
        $query->execute();
 
//redirecting to the page
header("Location:showpeople.php?id=$idFollower");
?>