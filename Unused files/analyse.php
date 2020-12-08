<?php include 'php-db-projekt7.php'; ?>
<?php session_start(); ?>
<?php
  if(!isset($_SESSION['svar'])) {
  $_SESSION['svar'] = "";
  }

  if($_POST){

    //We need total question in process file too
   	$query = "SELECT * FROM table_questions";
  	$total_questions = mysqli_num_rows(mysqli_query($conn,$query));

    //We need to capture the question number from where form was submitted
   	$number = $_POST['number'];

    //Here we are storing the selected option by user
   	$selected_answer = $_POST['answer'];

    //What will be the next question number
    $next = $number+1;

    //correct answer
    $query = "SELECT * FROM table_test WHERE questionID = $number";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);

    $correct_answer = $row['answer'];

    if($selected_answer == $correct_answer){
      $_SESSION['svar']++;
    }

    //Redirect to next question or final score page.
   if($number == $total_questions){
    header("LOCATION: final.php");
   }else{
    header("LOCATION: spg.php?n=". $next);
   }
 }
?>
