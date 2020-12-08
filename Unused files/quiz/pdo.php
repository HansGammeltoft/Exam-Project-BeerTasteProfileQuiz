<?php
  $conn = new PDO("mysql:host=localhost;dbname=projekt7", 'root', '');

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
?>
