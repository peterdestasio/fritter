<?php
$host = "localhost"; //database host server
$db = "fritter"; //database name
$user = "root"; //database user
$pass = ""; //password
$connection = mysql_connect($host, $user, $pass);
//Check to see if we can connect to the server

/*
$x = $_GET['x'];
$y = $_GET['y'];
$z = $_GET['z'];
*/

//imageID image image_text userID

$image = $_GET['image'];
$image_text = $_GET['image_text'];
$userID = $_GET['userID'];


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
        $query = "INSERT INTO images(image,image_text,userID) 
                                                       VALUES('$image' ,'$image_text','$userID')";
      
        $resultset = mysql_query($query, $connection);
        $response = "Successfully added " . $query;
        //echo "Successfully added ";
        //echo $query;
    }
    
    echo json_encode($response);
}
?>