<?php include 'php-db-projekt7.php'; ?>

<form action="result.php" method="post">
  <input type="radio" name="svar" value="4A"><label for="4A">Svar1</label><br>
  <input type="radio" name="svar" value="4B"><label for="4B">Svar2</label><br>
  <input type="radio" name="svar" value="4C"><label for="4C">Svar3</label><br>
  <input type="radio" name="svar" value="4D"><label for="4D">Svar4</label><br>
  <input type="submit" value="Næste" name="Submit">
</form>

<?php
//Session
session_start();

if(isset($_POST['svar'])) {
  $svar = $_POST['svar'];

  //Svar 4A
  if ($svar == "4A") {
    $sql = "SELECT taste FROM table_answer_taste
            JOIN table_answers ON table_answers.answerID = table_answer_taste.answerID
            JOIN table_taste ON table_taste.tasteID = table_answer_taste.tasteID
            WHERE table_answer_taste.answerID = 15";
    $result = $conn->query($sql);
  }

  //Svar 4B
  elseif ($svar == "4B") {
    $sql = "SELECT taste FROM table_answer_taste
            JOIN table_answers ON table_answers.answerID = table_answer_taste.answerID
            JOIN table_taste ON table_taste.tasteID = table_answer_taste.tasteID
            WHERE table_answer_taste.answerID = 16";
    $result = $conn->query($sql);
  }

  //Svar 4C
  elseif ($svar == "4C") {
    $sql = "SELECT taste FROM table_answer_taste
            JOIN table_answers ON table_answers.answerID = table_answer_taste.answerID
            JOIN table_taste ON table_taste.tasteID = table_answer_taste.tasteID
            WHERE table_answer_taste.answerID = 17";
    $result = $conn->query($sql);
  }

  //Svar 4D
  elseif ($svar == "4D") {
    $sql = "SELECT taste FROM table_answer_taste
            JOIN table_answers ON table_answers.answerID = table_answer_taste.answerID
            JOIN table_taste ON table_taste.tasteID = table_answer_taste.tasteID
            WHERE table_answer_taste.answerID = 18";
    $result = $conn->query($sql);
  }

  if($result->num_rows>0){
    //output data of each row
    while($row = $result->fetch_assoc()){
      $spg4 = $row['taste']."";
      $_SESSION[] = $spg4;

      $i = 0;
      foreach ($_SESSION as $key => $value) {
        if($i <= 0) $spg4 = ' WHERE table_taste.tasteID = ' . $value;
        $i++;
      }
    }
    print_r($_SESSION);
  }
}
?>
