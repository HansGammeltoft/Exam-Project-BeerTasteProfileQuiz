<?php

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
echo "Connected successfully"."<br/>"; 

$sql = "SELECT * FROM table_beers"; 
$result = $conn->query($sql); 
if($result->num_rows>0){
    //output data of each row
    while($row = $result->fetch_assoc()){
        echo $row['productID']."Navn:".$row['name']."<br/>"; 
    }
}else{
    echo "0 results";
}

$conn->close(); 

?>