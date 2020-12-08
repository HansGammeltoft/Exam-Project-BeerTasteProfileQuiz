<?php
  include 'php-db-projekt7.php';
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

<div>Spørgsmål: <?php echo $number; ?> af <?php echo $total_questions; ?></div>
<p><?php echo $question['question'];?></p>
<form method="post" action="analyse.php">
  <ul>
    <?php while($row=mysqli_fetch_assoc($answers)){ ?>
      <li><input type="radio" name="answer" value="<?php echo $row['id']; ?>"><?php echo $row['answer']; ?></li>
    <?php } ?>
  </ul>
  <input type="hidden" name="number" value="<?php echo $number; ?>">
  <input type="submit" name="submit" value="submit">
</form>
