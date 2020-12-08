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
