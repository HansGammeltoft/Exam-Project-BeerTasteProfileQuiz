<?php include 'php-db-projekt7.php'; ?>

<form action="spg4.php" method="post">
  <input type="radio" name="svar" value="3A"><label for="3A">Svar1</label><br>
  <input type="radio" name="svar" value="3B"><label for="3B">Svar2</label><br>
  <input type="radio" name="svar" value="3C"><label for="3C">Svar3</label><br>
  <input type="radio" name="svar" value="3D"><label for="3D">Svar4</label><br>
  <input type="submit" value="Næste" name="Submit">
</form>

<?php
//Session
session_start();

if(isset($_POST['svar'])) {
  $svar = $_POST['svar'];

  //Svar 3A
  if ($svar == "3A") {
    $sql = "SELECT taste FROM table_answer_taste
            JOIN table_answers ON table_answers.answerID = table_answer_taste.answerID
            JOIN table_taste ON table_taste.tasteID = table_answer_taste.tasteID
            WHERE table_answer_taste.answerID = 11";
    $result = $conn->query($sql);
  }

  //Svar 3B
  elseif ($svar == "3B") {
    $sql = "SELECT taste FROM table_answer_taste
            JOIN table_answers ON table_answers.answerID = table_answer_taste.answerID
            JOIN table_taste ON table_taste.tasteID = table_answer_taste.tasteID
            WHERE table_answer_taste.answerID = 12";
    $result = $conn->query($sql);
  }

  //Svar 3C
  elseif ($svar == "3C") {
    $sql = "SELECT taste FROM table_answer_taste
            JOIN table_answers ON table_answers.answerID = table_answer_taste.answerID
            JOIN table_taste ON table_taste.tasteID = table_answer_taste.tasteID
            WHERE table_answer_taste.answerID = 13";
    $result = $conn->query($sql);
  }

  //Svar 3D
  elseif ($svar == "3D") {
    $sql = "SELECT taste FROM table_answer_taste
            JOIN table_answers ON table_answers.answerID = table_answer_taste.answerID
            JOIN table_taste ON table_taste.tasteID = table_answer_taste.tasteID
            WHERE table_answer_taste.answerID = 14";
    $result = $conn->query($sql);
  }

  if($result->num_rows>0){
    //output data of each row
    while($row = $result->fetch_assoc()){
      $spg3 = $row['taste']."";
      $_SESSION[] = $spg3;

      $i = 0;
      foreach ($_SESSION as $key => $value) {
        if($i <= 0) $spg3 = ' WHERE table_taste.tasteID = ' . $value;
        $i++;
      }
    }
    print_r($_SESSION);
  }
}
?>
