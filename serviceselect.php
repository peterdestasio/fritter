<?php
$host = "localhost"; //database host server
$db = "fritter"; //database name
$user = "root"; //database user
$pass = ""; //password
$connection = mysql_connect($host, $user, $pass);
//Check to see if we can connect to the server
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
        $query = "SELECT * FROM users";
        $resultset = mysql_query($query, $connection);
        $records = array();
        //Loop through all our records and add them to our array
        
        
        while($r = mysql_fetch_assoc($resultset))
        {
            $row_array['user_id'] = $r['user_id'];
            $row_array['first_name'] = $r['first_name'];
            $row_array['last_name'] = $r['last_name'];
             $row_array['user_email'] = $r['user_email'];
            $row_array['user_pass'] = $r['user_pass'];
            //$row_array['birthday'] = $r['birthday'];
            //$row_array['col2'] = $row['col2'];

        array_push($records,$row_array);
            //$records[] = $r;        
        }
        //Output the data as JSON
        echo json_encode($records);
        
    }
}
?>