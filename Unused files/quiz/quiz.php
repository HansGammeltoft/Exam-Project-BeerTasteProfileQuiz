<?php require_once 'pdo.php';

//https://www.w3schools.com/php/php_mysql_prepared_statements.asp - Prepared statements
$stmt = $conn->prepare("SELECT * FROM table_answer_taste");
$stmt->execute();
?>

<h3>TEST</h3>
<form method="post" action="end.php">
  <ol type="1">
    <?php while ($answer = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
      <li>
        <?php echo $answer->id; ?>
        <input type="hidden" name="answerID" value="<?php echo $answer->id; ?>">
        <ol type="a">
          <?php
            $stmt2 = $conn->prepare("SELECT * FROM table_answers WHERE answerID = :answerID");
            $stmt2->bindValue("answerID", $answer->id);
            $stmt2->execute();
          ?>
          <?php while($taste = $stmt2->fecth(PDO::FETCH_OBJ)) { ?>
            <li>
              <input type="radio" name="<?php echo $taste->id; ?>" value="<?php echo $taste->id ?>">
              <?php echo $taste->id; ?>
            </li>
          <?php } ?>
        </ol>
      </li>
    <?php } ?>
    </ol>
    <br>
    <input type="submit" value="submit">
</form>
