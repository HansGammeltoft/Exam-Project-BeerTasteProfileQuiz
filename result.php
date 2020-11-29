<?php include 'php-db-projekt7.php'; ?>

<?php
//Session
session_start();

$whereClause = '';
$i = 0;
foreach ($_SESSION as $key => $value) {
  if($i <= 0) $whereClause = ' WHERE table_taste.tasteID = ' . $value;
  else $whereClause .= ' OR table_taste.tasteID = ' . $value;
  $i++;
}

$resultQuery = "SELECT taste FROM table_answer_taste ' . $whereClause . '
JOIN table_answers ON table_answers.answerID = table_answer_taste.answerID
JOIN table_taste ON table_taste.tasteID = table_answer_taste.tasteID";
?>
