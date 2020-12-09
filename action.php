<?php
  require 'php-db-projekt7.php';

  if (isset($_POST['action'])) {
    $sql = "SELECT * FROM table_beers
            INNER JOIN table_brewery ON table_beers.breweryID = table_brewery.breweryID
            INNER JOIN table_type ON table_beers.typeID = table_type.typeID
            INNER JOIN table_alcohol ON table_beers.alcoholID = table_alcohol.alcoholID
            INNER JOIN table_size ON table_beers.sizeID = table_size.sizeID
            INNER JOIN table_price ON table_beers.priceID = table_price.priceID
            INNER JOIN table_beer_taste ON table_beers.productID = table_beer_taste.productID
            INNER JOIN table_taste ON table_beer_taste.tasteID = table_taste.tasteID
            INNER JOIN table_answer_taste ON table_taste.tasteID = table_answer_taste.tasteID
            INNER JOIN table_answers ON table_answer_taste.answerID = table_answers.answerID
            WHERE answer !=''";
    if (isset($_POST['answer1'])) {
      $answer1 = implode("','",$_POST['answer1']);
      $sql .= "AND answer IN('".$answer1."')";
    }
    if (isset($_POST['answer2'])) {
      $answer2 = implode("','",$_POST['answer2']);
      $sql .= "OR answer IN('".$answer2."')";
    }
    if (isset($_POST['answer3'])) {
      $answer3 = implode("','",$_POST['answer3']);
      $sql .= "OR answer IN('".$answer3."')";
    }
    if (isset($_POST['answer4'])) {
      $answer4 = implode("','",$_POST['answer4']);
      $sql .= "OR answer IN('".$answer4."')";
    }
    $result = $conn->query($sql);
    if($result->num_rows>0){
      $beername = '';
      while ($row=$result->fetch_assoc()) {
        //If $beername is EQUAL to empty, which it is, then SET it as the values in the "name" column in the database, and put it inside a list.
        if ($beername == '') {
          $beername = $row['name'];
          echo '<ul class="beername_wrapper"><li>' . $row['name'] .' '. $row['taste'];
        //If the "name" from the database ISN'T EQUAL to the previous $beername, then close the list, and echo out the next $beername.
        }elseif ($row['name'] != $beername) {
          $beername = $row['name'];
          echo '</li><li>';
          echo $row['name'] .' '. $row['taste'] .' ';
        //Else only echo the values in the "answer" column.
        }else {
          echo $row['taste'] .' ';
        }
      }
    }
  }
 ?>

 <!-- <script>
    //limit to 5
    $beername_wrapper = $('.beername_wrapper');
    $beername_wrapper.each(function() {
       var $bn_wrapper = $(this).children();
       if ($bn_wrapper.length > 5) {
           $beername_wrapper.children(':nth-of-type(n+6)').hide();
       }
   });
 </script> -->
