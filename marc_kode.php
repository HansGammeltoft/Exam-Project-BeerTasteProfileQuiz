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
