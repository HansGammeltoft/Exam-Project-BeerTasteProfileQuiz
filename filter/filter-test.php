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
      $sql="SELECT answer FROM table_answers LIMIT 5";
      $result=$conn->query($sql);
      while($row=$result->fetch_assoc()){
    ?>
      <li>
        <div class="">
          <label class="product_check">
            <input type="radio" name="radio1" value="<?= $row['answer']; ?>" id="answer1"><?= $row['answer'];  ?>
          </label>
        </div>
      </li>
      <?php } ?>
      <hr>
      <?php
        $sql="SELECT answer FROM table_answers LIMIT 5 OFFSET 5";
        $result=$conn->query($sql);
        while($row=$result->fetch_assoc()){
      ?>
        <li>
          <div class="">
            <label class="product_check">
              <input type="radio" name="radio2" value="<?= $row['answer']; ?>" id="answer2"><?= $row['answer'];  ?>
            </label>
          </div>
        </li>
        <?php } ?>
      <hr>
      <?php
        $sql="SELECT answer FROM table_answers LIMIT 4 OFFSET 10";
        $result=$conn->query($sql);
        while($row=$result->fetch_assoc()){
      ?>
        <li>
          <div class="">
            <label class="product_check">
              <input type="radio" name="radio3" value="<?= $row['answer']; ?>" id="answer3"><?= $row['answer'];  ?>
            </label>
          </div>
        </li>
        <?php } ?>
      <hr>
      <?php
        $sql="SELECT answer FROM table_answers LIMIT 4 OFFSET 14";
        $result=$conn->query($sql);
        while($row=$result->fetch_assoc()){
      ?>
        <li>
          <div class="">
            <label class="product_check">
              <input type="radio" name="radio4" value="<?= $row['answer']; ?>" id="answer4"><?= $row['answer'];  ?>
            </label>
          </div>
        </li>
        <?php } ?>
      <hr>
    </ul>
        <h5 class="text-center" id="textChange">All Products</h5>    
    <div class="row" id="result">
      <div>
        <?php
        //SELECTs from the data base, with the use of innter joins, to join the tables.
        $sql="SELECT * FROM table_beers
                INNER JOIN table_brewery ON table_beers.breweryID = table_brewery.breweryID
				        INNER JOIN table_type ON table_beers.typeID = table_type.typeID
				        INNER JOIN table_alcohol ON table_beers.alcoholID = table_alcohol.alcoholID
				        INNER JOIN table_size ON table_beers.sizeID = table_size.sizeID
				        INNER JOIN table_price ON table_beers.priceID = table_price.priceID
                INNER JOIN table_beer_taste ON table_beers.productID = table_beer_taste.productID
                INNER JOIN table_taste ON table_beer_taste.tasteID = table_taste.tasteID
                INNER JOIN table_answer_taste ON table_taste.tasteID = table_answer_taste.tasteID
                INNER JOIN table_answers ON table_answer_taste.answerID = table_answers.answerID";
          //It performs a query function against the sql variable, which selects information from the database
          $result=$conn->query($sql);
          //beername variable is SET to an empty string
          $beername = '';
          //while loop, it loops the result from the query function
          while($row=$result->fetch_assoc())
          {
            //If $beername is EQUAL to empty, which it is, then SET it as the values in the "name" column in the database, and put it inside a list.
            if ($beername == '') {
              $beername = $row['name'];
              echo '<ul><li>' . $row['name'] .' '. $row['answer'];
            //If the "name" from the database ISN'T EQUAL to the previous $beername, then close the list, and echo out the next $beername.
            }elseif ($row['name'] != $beername) {
              $beername = $row['name'];
              echo '</li><li>';
              echo $row['name'] .' '. $row['answer'];
            //Else only echo the values in the "answer" column.
            }else {
              echo $row['answer'];
            }
          }
        ?>
        </li></ul>
      </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
          $(".product_check").click(function(){

            var action = 'data';
            var answer1 = get_filter_text('answer1');
            var answer2 = get_filter_text('answer2');
            var answer3 = get_filter_text('answer3');
            var answer4 = get_filter_text('answer4');

            $.ajax({
              url:'action.php',
              method: 'POST',
              data:{action:action,answer1:answer1,answer2:answer2,answer3:answer3,answer4:answer4},
              success:function(response){
                $("#result").html(response);
                $("#textChange").text("Filtedered Products");
              }
            });
          });

          function get_filter_text(text_id){
            var filterData = [];
            $('#'+text_id+':checked').each(function(){
              filterData.push($(this).val());
            });
            return filterData;
          }
        });
    </script>
  </body>
</html>
