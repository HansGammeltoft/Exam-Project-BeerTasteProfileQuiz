<?php include 'php-db-projekt7.php'; ?>

<form action="spg3.php" method="post">
  <input type="radio" name="svar" value="2A"><label for="2A">Svar1</label><br>
  <input type="radio" name="svar" value="2B"><label for="2B">Svar2</label><br>
  <input type="radio" name="svar" value="2C"><label for="2C">Svar3</label><br>
  <input type="radio" name="svar" value="2D"><label for="2D">Svar4</label><br>
  <input type="radio" name="svar" value="2E"><label for="2E">Svar5</label><br>
  <input type="submit" value="Næste" name="Submit">
</form>

<?php
//Session
session_start();

if(isset($_POST['svar1'])) {
  $svar1 = $_POST['svar1'];

  //Svar 1A
  if ($svar1 == "1A") {
    $sql = "SELECT taste FROM table_answer_taste
            JOIN table_answers ON table_answers.answerID = table_answer_taste.answerID
            JOIN table_taste ON table_taste.tasteID = table_answer_taste.tasteID
            WHERE table_answer_taste.answerID = 1";
    $result = $conn->query($sql);
  }

  //Svar 1B
  elseif ($svar1 == "1B") {
    $sql = "SELECT taste FROM table_answer_taste
            JOIN table_answers ON table_answers.answerID = table_answer_taste.answerID
            JOIN table_taste ON table_taste.tasteID = table_answer_taste.tasteID
            WHERE table_answer_taste.answerID = 2";
    $result = $conn->query($sql);
  }

  //Svar 1C
  elseif ($svar1 == "1C") {
    $sql = "SELECT taste FROM table_answer_taste
            JOIN table_answers ON table_answers.answerID = table_answer_taste.answerID
            JOIN table_taste ON table_taste.tasteID = table_answer_taste.tasteID
            WHERE table_answer_taste.answerID = 3";
    $result = $conn->query($sql);
  }

  //Svar 1D
  elseif ($svar1 == "1D") {
    $sql = "SELECT taste FROM table_answer_taste
            JOIN table_answers ON table_answers.answerID = table_answer_taste.answerID
            JOIN table_taste ON table_taste.tasteID = table_answer_taste.tasteID
            WHERE table_answer_taste.answerID = 4";
    $result = $conn->query($sql);
  }

  //Svar 1E
  elseif ($svar1 == "1E") {
    $sql = "SELECT taste FROM table_answer_taste
            JOIN table_answers ON table_answers.answerID = table_answer_taste.answerID
            JOIN table_taste ON table_taste.tasteID = table_answer_taste.tasteID
            WHERE table_answer_taste.answerID = 5";
    $result = $conn->query($sql);
  }

  if($result->num_rows>0){
    //output data of each row
    while($row = $result->fetch_assoc()){
      $spg1 = $row['taste']."";
      $_SESSION[] = $spg1;

      $i = 0;
      foreach ($_SESSION as $key => $value) {
        if($i <= 0) $spg1 = ' WHERE table_taste.tasteID = ' . $value;
        $i++;
      }
    }
    print_r($_SESSION);
  }
}
?>

<?php
//Session
session_start();

if(isset($_POST['svar'])) {
  $svar = $_POST['svar'];

  //Svar 2A
  if ($svar == "2A") {
    $sql = "SELECT taste FROM table_answer_taste
            JOIN table_answers ON table_answers.answerID = table_answer_taste.answerID
            JOIN table_taste ON table_taste.tasteID = table_answer_taste.tasteID
            WHERE table_answer_taste.answerID = 6";
    $result = $conn->query($sql);
  }

  //Svar 2B
  elseif ($svar == "2B") {
    $sql = "SELECT taste FROM table_answer_taste
            JOIN table_answers ON table_answers.answerID = table_answer_taste.answerID
            JOIN table_taste ON table_taste.tasteID = table_answer_taste.tasteID
            WHERE table_answer_taste.answerID = 7";
    $result = $conn->query($sql);
  }

  //Svar 2C
  elseif ($svar == "2C") {
    $sql = "SELECT taste FROM table_answer_taste
            JOIN table_answers ON table_answers.answerID = table_answer_taste.answerID
            JOIN table_taste ON table_taste.tasteID = table_answer_taste.tasteID
            WHERE table_answer_taste.answerID = 8";
    $result = $conn->query($sql);
  }

  //Svar 2D
  elseif ($svar == "2D") {
    $sql = "SELECT taste FROM table_answer_taste
            JOIN table_answers ON table_answers.answerID = table_answer_taste.answerID
            JOIN table_taste ON table_taste.tasteID = table_answer_taste.tasteID
            WHERE table_answer_taste.answerID = 9";
    $result = $conn->query($sql);
  }

  //Svar 2E
  elseif ($svar == "2E") {
    $sql = "SELECT taste FROM table_answer_taste
            JOIN table_answers ON table_answers.answerID = table_answer_taste.answerID
            JOIN table_taste ON table_taste.tasteID = table_answer_taste.tasteID
            WHERE table_answer_taste.answerID = 10";
    $result = $conn->query($sql);
  }

  if($result->num_rows>0){
    //output data of each row
    while($row = $result->fetch_assoc()){
      $spg2 = $row['taste']."";
      $_SESSION[] = $spg2;

      $i = 0;
      foreach ($_SESSION as $key => $value) {
        if($i <= 0) $spg2 = ' WHERE table_taste.tasteID = ' . $value;
        $i++;
      }
    }
    print_r($_SESSION);
  }
}
?>
