<?php include 'php-db-projekt7.php';
$query = "SELECT * FROM table_questions";
$total_questions = mysqli_num_rows(mysqli_query($conn,$query));
?>

<html>
  <head>
    <title>QUIZ</title>
  </head>
  <body>
    <ul>
      <li><strong>Number of Questions:</strong><?php echo $total_questions; ?> </li>
      <li><strong>Estimated Time:</strong> <?php echo $total_questions*1.5; ?></li>

    </ul>

    <a href="filter-test.php?n=1" class="start">Start Quiz</a>
  </body>
</html>
