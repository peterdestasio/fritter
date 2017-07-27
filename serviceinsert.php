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

$user_name = $_POST['user_name'];
$user_email = $_POST['user_email'];
$user_pass = $_POST['user_pass'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$birthday = $_POST['birthday'];
$city = $_POST['city'];
$credit_card = $_POST['credit_card'];
$ccv = $_POST['ccv'];

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
        $query = "INSERT INTO users(user_name,user_email,user_pass,first_name,last_name,birthday,city,credit_card,ccv) 
                                                       VALUES('$user_name' ,'$user_email','$user_pass','$first_name','$last_name','$birthday','$city','$credit_card','$ccv')";
      
        $resultset = mysql_query($query, $connection);
        $response = "Successfully added " . $query;
        //echo "Successfully added ";
        //echo $query;
    }
    
    echo json_encode($response);
}
?>