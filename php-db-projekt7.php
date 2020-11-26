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
    echo "Connected successfully"."<br/>";
        
    if(isset($_POST['svar'])){
    $svar = $_POST['svar'];
    }
    else{
        $svar = NULL; 
    }

    if($svar != NULL){        
        
        //svar1, spg1
        if($svar == "svar1"){
            $sql = "SELECT name, taste FROM table_beer_taste
                    INNER JOIN table_beers ON table_beers.productID = table_beer_taste.productID
                    INNER JOIN table_taste ON table_taste.tasteID = table_beer_taste.tasteID
                    WHERE table_beer_taste.productID = 12 AND table_beer_taste.tasteID IN (1,2) 
                    OR table_beer_taste.productID = 15 AND table_beer_taste.tasteID IN (3)
                    OR table_beer_taste.productID = 9 AND table_beer_taste.tasteID IN (4)
                    OR table_beer_taste.productID = 11 AND table_beer_taste.tasteID IN (5,6)
                    OR table_beer_taste.productID = 14 AND table_beer_taste.tasteID IN (7,3,8)
                    OR table_beer_taste.productID = 13 AND table_beer_taste.tasteID IN (9)"; 
            $result = $conn->query($sql); 
                //output data of each row
                while($row = $result->fetch_array()) { 
                    $beer_data1[] = array( 
                        "beer_name" => $row["name"],
                        "beer_taste" => $row["taste"]
                    ); 
                }
                // Creating a dynamic JSON file 
                $file = "get-data.json"; 

                // Converting data into JSON and putting into the file 
                // Checking for its creation 
                if(file_put_contents($file,  
                        json_encode($beer_data1))) 
                    echo("File created"); 
                else
                    echo("Failed");
        }
        
        //svar2, spg1
        if($svar == "svar2"){
            $sql = "SELECT name, taste FROM table_beer_taste
                    INNER JOIN table_beers ON table_beers.productID = table_beer_taste.productID
                    INNER JOIN table_taste ON table_taste.tasteID = table_beer_taste.tasteID
                    WHERE table_beer_taste.productID = 8 AND table_beer_taste.tasteID IN (10) 
                    OR table_beer_taste.productID = 14 AND table_beer_taste.tasteID IN (11,12) 
                    OR table_beer_taste.productID = 11 AND table_beer_taste.tasteID IN (6) 
                    OR table_beer_taste.productID = 10 AND table_beer_taste.tasteID IN (13) 
                    OR table_beer_taste.productID = 9 AND table_beer_taste.tasteID IN (4,14,15)"; 
            $result = $conn->query($sql); 
                //output data of each row
                while($row = $result->fetch_array()) { 
                    $beer_data1[] = array( 
                        "beer_name" => $row["name"],
                        "beer_taste" => $row["taste"]
                    ); 
                }
                // Creating a dynamic JSON file 
                $file = "get-data.json"; 

                // Converting data into JSON and putting into the file 
                // Checking for its creation 
                if(file_put_contents($file,  
                        json_encode($beer_data1))) 
                    echo("File created"); 
                else
                    echo("Failed");
        }
    }
    
    $conn->close(); 

?>

<form method="post" action="php-db-projekt7.php">
    <h1>Spørgsmål</h1>
    <input type="radio" name="svar" value="svar1">Svar 1<br/><br/>
    <input type="radio" name="svar" value="svar2">Svar 2<br/><br/>
    <input type="radio" name="svar" value="svar3">Svar 3<br/><br/>
    <input type="radio" name="svar" value="svar4">Svar 4<br/><br/>
    <input type="radio" name="svar" value="svar5">Svar 5<br/><br/><br/>
    <input type="submit" value="Afslut" name="Submit">
</form>

