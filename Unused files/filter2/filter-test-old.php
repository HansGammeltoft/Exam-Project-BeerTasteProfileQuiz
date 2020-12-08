<?php
  require 'config.php';
  session_start();

  //set question number
  $number = $_GET['n'];

  //query for question
  $query = "SELECT * FROM table_questions WHERE questionID = $number";

  //get question
  $result = mysqli_query($conn,$query);
  $question = mysqli_fetch_assoc($result);

  //get answers
  $query = "SELECT * FROM table_test WHERE questionID = $number";
  $answers = mysqli_query($conn,$query);

  //get total questions
  $query = "SELECT * FROM table_questions";
  $total_questions = mysqli_num_rows(mysqli_query($conn,$query));
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <body>

    <div>Spørgsmål: <?php echo $number; ?> af <?php echo $total_questions; ?></div>
    <p><?php echo $question['question'];?></p>
    <form method="post" action="action.php">
      <ul>
        <?php while($row=mysqli_fetch_assoc($answers)){ ?>
          <li><input type="radio" name="answer" value="<?php echo $row['id']; ?>"><?php echo $row['answer']; ?></li>
        <?php } ?>
      </ul>
      <input type="hidden" name="number" value="<?php echo $number; ?>">
      <input type="submit" name="submit" value="submit">
    </form>

    <ul>
    <?php
    //SELECT DISCTINCT will only select unique values from the column
      $sql="SELECT answer FROM table_answers LIMIT 5";
      $result=$conn->query($sql);
      while($row=$result->fetch_assoc()){
    ?>
      <li>
        <div class="">
          <label>
            <input type="radio" name="radio1" value="<?= $row['answer']; ?>" id="answer"><?= $row['answer'];  ?>
          </label>
        </div>
      </li>
      <?php } ?>
      <hr>
      <?php
      //SELECT DISCTINCT will only select unique values from the column
        $sql="SELECT answer FROM table_answers LIMIT 5 OFFSET 5";
        $result=$conn->query($sql);
        while($row=$result->fetch_assoc()){
      ?>
        <li>
          <div class="">
            <label>
              <input type="radio" name="radio2" value="<?= $row['answer']; ?>" id="answer"><?= $row['answer'];  ?>
            </label>
          </div>
        </li>
        <?php } ?>
      <hr>
      <?php
      //SELECT DISCTINCT will only select unique values from the column
        $sql="SELECT answer FROM table_answers LIMIT 4 OFFSET 10";
        $result=$conn->query($sql);
        while($row=$result->fetch_assoc()){
      ?>
        <li>
          <div class="">
            <label>
              <input type="radio" name="radio3" value="<?= $row['answer']; ?>" id="answer"><?= $row['answer'];  ?>
            </label>
          </div>
        </li>
        <?php } ?>
      <hr>
      <?php
      //SELECT DISCTINCT will only select unique values from the column
        $sql="SELECT answer FROM table_answers LIMIT 4 OFFSET 14";
        $result=$conn->query($sql);
        while($row=$result->fetch_assoc()){
      ?>
        <li>
          <div class="">
            <label>
              <input type="radio" name="radio4" value="<?= $row['answer']; ?>" id="answer"><?= $row['answer'];  ?>
            </label>
          </div>
        </li>
        <?php } ?>
      <hr>
    </ul>
    <div class="row" id="result">
      <?php
      $sql="SELECT name, taste, answer FROM table_beers
              INNER JOIN table_beer_taste ON table_beers.productID = table_beer_taste.productID
              INNER JOIN table_taste ON table_beer_taste.tasteID = table_taste.tasteID
              INNER JOIN table_answer_taste ON table_taste.tasteID = table_answer_taste.tasteID
              INNER JOIN table_answers ON table_answer_taste.answerID = table_answers.answerID";
        $result=$conn->query($sql);
        while($row=$result->fetch_assoc()){
      ?>
      <div>
        <div>
          <img>
        </div>
        <div>
          <p></p>
        </div>
        <ul>
          <li>
            <?php
            $beername = '';

            if($beername = $row['name']){

              echo $row['name'].$row['taste'].$row['answer'];

            }  //else if ($beer != $row['name'] && $beer != ''){

              //echo $beer;

            //} //else ($beer = $row['name']){

              //print_r($row['taste'].$row['answer'])
            //};
            ?>
          </li>
        </ul>
      </div>
    </div>
    <?php } ?>
  </body>
</html>
