<?php
$host = "localhost"; //database host server
$db = "fritter"; //database name
$user = "root"; //database user
$pass = ""; //password

//Check to see if we can connect to the server
$connection = mysql_connect($host, $user, $pass);

$followerID = $_POST['followerID'];
$followedID = $_POST['followedID'];


if(!$connection)
{
    die("Database server connection failed.");  
}



else
{
    //Attempt to select the database
    $dbconnect = mysql_select_db("fritter", $connection);
    //Check to see if we could select the database
    if(!$dbconnect)
    {
        die("Unable to connect to the specified database!");
    }
    else
    {
        $query = "INSERT INTO following(followerID,followedID) 
                                                       VALUES('$followerID' ,'$followedID')";
      
        $resultset = mysql_query($query, $connection);
        $response = "Successfully added " . $query;
        //echo "Successfully added ";
    
    }
    
    echo json_encode($response);
}
?>