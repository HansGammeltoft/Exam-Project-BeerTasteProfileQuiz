<?php

    //Set up variables
    $server = "localhost";
    $user = "root";
    $pw = "";
    $db = "projekt7";

    //create connection
    $conn = new mysqli($server, $user, $pw, $db);
    $conn->set_charset('utf8');
    //check connection
    if($conn->connect_error){
        die("Connection failed:" .$conn->connect_error);
    }
    //echo "Connected successfully"."<br/>";
