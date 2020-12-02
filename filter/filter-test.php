<?php
  require 'config.php';
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
    <ul>
    <?php
    //SELECT DISCTINCT will only select unique values from the column
      $sql="SELECT DISTINCT answer FROM table_answers LIMIT 5";
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
        $sql="SELECT DISTINCT answer FROM table_answers LIMIT 5 OFFSET 5";
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
        $sql="SELECT DISTINCT answer FROM table_answers LIMIT 4 OFFSET 10";
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
        $sql="SELECT DISTINCT answer FROM table_answers LIMIT 4 OFFSET 14";
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
        $sql="SELECT * FROM table_beers";
        $result=$conn->query($sql);
        while($row=$result->fetch_assoc()){
      ?>
      <div>
        <div>
          <img>
        </div>
        <div>
          <h6><?= $row['name']; ?></h6>
        </div>
          <p>
            Product ID : <?= $row['productID']; ?>
          </p>
      </div>
    </div>
    <?php } ?>
    <?php
      $sql="SELECT taste FROM table_beer_taste
	     JOIN table_beers ON table_beers.productID = table_beer_taste.productID
	     JOIN table_taste ON table_taste.tasteID = table_beer_taste.tasteID
	     WHERE table_beer_taste.productID = 1"; 
  ?>
  </body>
</html>
