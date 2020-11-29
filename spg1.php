<?php include 'php-db-projekt7.php'; ?>

<form action="spg1.php" method="post">
  <input type="radio" name="svar" value="1A"><label for="1A">Svar1</label><br>
  <input type="radio" name="svar" value="1B"><label for="1B">Svar2</label><br>
  <input type="radio" name="svar" value="1C"><label for="1C">Svar3</label><br>
  <input type="radio" name="svar" value="1D"><label for="1D">Svar4</label><br>
  <input type="radio" name="svar" value="1E"><label for="1E">Svar5</label><br>
  <input type="submit" value="Næste" name="Submit">
</form>

<?php
//Session
session_start();

if(isset($_POST['svar'])) {
  $svar = $_POST['svar'];

  //Svar 1A
  if ($svar == "1A") {
    $sql = "SELECT taste FROM table_answer_taste
            JOIN table_answers ON table_answers.answerID = table_answer_taste.answerID
            JOIN table_taste ON table_taste.tasteID = table_answer_taste.tasteID
            WHERE table_answer_taste.answerID = 1";
    $result = $conn->query($sql);
  }

  //Svar 1B
  elseif ($svar == "1B") {
    $sql = "SELECT taste FROM table_answer_taste
            JOIN table_answers ON table_answers.answerID = table_answer_taste.answerID
            JOIN table_taste ON table_taste.tasteID = table_answer_taste.tasteID
            WHERE table_answer_taste.answerID = 2";
    $result = $conn->query($sql);
  }

  //Svar 1C
  elseif ($svar == "1C") {
    $sql = "SELECT taste FROM table_answer_taste
            JOIN table_answers ON table_answers.answerID = table_answer_taste.answerID
            JOIN table_taste ON table_taste.tasteID = table_answer_taste.tasteID
            WHERE table_answer_taste.answerID = 3";
    $result = $conn->query($sql);
  }

  //Svar 1D
  elseif ($svar == "1D") {
    $sql = "SELECT taste FROM table_answer_taste
            JOIN table_answers ON table_answers.answerID = table_answer_taste.answerID
            JOIN table_taste ON table_taste.tasteID = table_answer_taste.tasteID
            WHERE table_answer_taste.answerID = 4";
    $result = $conn->query($sql);
  }

  //Svar 1E
  elseif ($svar == "1E") {
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
