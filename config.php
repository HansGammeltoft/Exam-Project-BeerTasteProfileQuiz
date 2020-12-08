<?php
//connecting to the database
  $conn = new mysqli ("localhost","root","","projekt7");
  //if it doenst connect to database, then post "Connection failed!"
  if($conn->connect_error) {
    die("Connection Failed!".$conn->connect_error);
  }
 ?>
