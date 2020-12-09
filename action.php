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
          echo '<div class="beername_wrapper"><div>';
          echo '<img style="height:200px;" src="./images/oelkassenlogod.png">';
          echo '<div class="description-left">
                  <div class="description">
                      <h2 class="beer-name">'; echo $row['name']; echo '</h2>';
                      echo '<p class="beer-description">'; echo $row['description']."</br>".$row['taste'] .' '; echo '</p>';
                  echo '</div>
                  <div class="description-price-button">
                      <div class="description-price">
                          <p class="price">'; echo $row['price']; echo '</p>';
                          echo '<p class="stock-status">På lager</p>';
                      echo '</div>
                      <div class="description-button">
                          <button>LÆG I KURV</button>
                      </div>
                  </div>
                </div>';
          echo '<div class="description-right">
                  <div class="description-list">
                    <ul>
                      <li><p class="description-list-bold">Kategori:</p><p class="description-list-normal">'; echo $row['categoryID']; echo '</p></li>
                      <li><p class="description-list-bold">Type:</p><p class="description-list-normal">'; echo $row['type']; echo '</p></li>
                      <li><p class="description-list-bold">Alkohol:</p><p class="description-list-normal">'; echo $row['alcohol']; echo '</p></li>
                      <li><p class="description-list-bold">Størrelse:</p><p class="description-list-normal">'; echo $row['size']; echo '</p></li>
                      <li><p class="description-list-bold">Bryggeri:</p><p class="description-list-normal">'; echo $row['brewery']; echo '</p></li>
                      <li><p class="description-list-bold">Land:</p><p class="description-list-normal">'; echo $row['countryID']; echo '</p></li>
                      <li><p class="description-list-bold">Rating:</p><p class="description-list-normal">'; echo $row['ratingID']; echo '</p></li>
                    </ul>
                  </div>
                </div>';

        //If the "name" from the database ISN'T EQUAL to the previous $beername, then close the list, and echo out the next $beername.
        }elseif ($row['name'] != $beername) {
          $beername = $row['name'];
          echo '</div><div>';
          echo '<img style="height:200px;" src="./images/oelkassenlogod.png">';
          echo '<div class="description-left">
                  <div class="description">
                      <h2 class="beer-name">'; echo $row['name']; echo '</h2>';
                      echo '<p class="beer-description">'; echo $row['description']."</br>".$row['taste'] .' '; echo '</p>';
                  echo '</div>
                  <div class="description-price-button">
                      <div class="description-price">
                          <p class="price">'; echo $row['price']; echo '</p>';
                          echo '<p class="stock-status">På lager</p>';
                      echo '</div>
                      <div class="description-button">
                          <button>LÆG I KURV</button>
                      </div>
                  </div>
                </div>';
          echo '<div class="description-right">
                  <div class="description-list">
                    <ul>
                      <li><p class="description-list-bold">Kategori:</p><p class="description-list-normal">'; echo $row['categoryID']; echo '</p></li>
                      <li><p class="description-list-bold">Type:</p><p class="description-list-normal">'; echo $row['type']; echo '</p></li>
                      <li><p class="description-list-bold">Alkohol:</p><p class="description-list-normal">'; echo $row['alcohol']; echo '</p></li>
                      <li><p class="description-list-bold">Størrelse:</p><p class="description-list-normal">'; echo $row['size']; echo '</p></li>
                      <li><p class="description-list-bold">Bryggeri:</p><p class="description-list-normal">'; echo $row['brewery']; echo '</p></li>
                      <li><p class="description-list-bold">Land:</p><p class="description-list-normal">'; echo $row['countryID']; echo '</p></li>
                      <li><p class="description-list-bold">Rating:</p><p class="description-list-normal">'; echo $row['ratingID']; echo '</p></li>
                    </ul>
                  </div>
                </div>';
        //Else only echo the values in the "answer" column.
        }else {
          echo $row['taste'] .' ';
        }
      }
    }
  }
 ?>

 <script>
    //limit to 5
    $beername_wrapper = $('.beername_wrapper');
    $beername_wrapper.each(function() {
       var $bn_wrapper = $(this).children();
       if ($bn_wrapper.length > 5) {
           $beername_wrapper.children(':nth-of-type(n+6)').hide();
       }
   });
 </script>
