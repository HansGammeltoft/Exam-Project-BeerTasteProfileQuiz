<?php

//Checks if someting has been posted and connects to the database if it's true
//if ($_SERVER["REQUEST_METHOD"]=="POST"){

    //Set up variables
    $server = "localhost";
    $user = "root";
    $pw = "";
    $db = "projekt7";

    //create connection
    $conn = new mysqli($server, $user, $pw, $db);

    //check connection
    if($conn->connect_error){
        die("Connection failed:" .$conn->connect_error);
    }
    //echo "Connected successfully"."<br/>";
