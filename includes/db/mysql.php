<?php

/**
 * Created by PhpStorm.
 * User: chintan
 * Date: 11/10/16
 * Time: 11:15 PM
 */
class Mysql{
    function get_conn(){
        $servername = "localhost";
        $username = "root";
        $password = "root";

            // Create connection
        $conn = new mysqli($servername, $username, $password);

            // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";
    }

}