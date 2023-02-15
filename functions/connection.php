<?php

    function db_connect(){
        $servername = "localhost";
        $db_username = "root";
        $db_password = "root";
        $database = "blog";

        $conn = new mysqli($servername, $db_username, $db_password, $database);

        if ($conn->connect_error) {
            die("ERROR IN CONNECTING TO THE DATABASE " . $conn->connect_error);
        } 
        
        return $conn;
        
    }
?>
