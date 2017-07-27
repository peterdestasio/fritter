<?php

define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_NAME', 'fritter');
 
define('USER_CREATED', 0);
define('USER_ALREADY_EXIST', 1);
define('USER_NOT_CREATED', 2);

 $conn;
 
    function __construct()
    {
    }
 
    /**
     * Establishing database connection
     * @return database connection handler
     */
    function connect()
    {
        
 
        // Connecting to mysql database
        $this->conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
        // Check for database connection error
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        else {
            echo "ok";
        }
 
        // returing connection resource
        return $this->conn;
        
    }

connect();
?>