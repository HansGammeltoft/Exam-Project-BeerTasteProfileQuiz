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
          echo '<div class="beername_wrapper"><div class="beer">';
          echo '<div class="beer1"><div class="beer-img-wrapper">';
              echo "<label id='defaultOpen' class='tablinks' onclick=\"openBeer(event,'". $row['productID'] ."')\"></br>";
                echo '<input type="radio" name="img" checked><div class="img-arrow">';
                  echo '<img src="' . $row['img'] . '">';
                  echo '<div class="arrow-wrapper"><div class="arrow"></div></div></div></label></div></div>';
          echo '<div id="'; echo $row['productID']; echo'"class="beer-information tabcontent">';
          echo '<div class="information-left">';
            echo '<h2 class="name">'; echo $row['name']; echo '</h2>';
            echo '<p class="description">'; echo $row['description']; echo '</p>';
          echo '<div class="price-n-btn">';
          echo '<div class="price-n-stock">';
            echo '<p class="price">'; echo $row['price'] .' '; echo 'DKK</br><p class="in-stock">På lager</p></p></div>';
            echo '<button class="buy-beer">Læg i kurv</button>';
          echo '</div></div><div class="information-right">';
            echo '<p class="beer-info">Kategori: '; echo $row['categoryID']; echo '</p>';
            echo '<p class="beer-info">Type: '; echo $row['type']; echo '</p>';
            echo '<p class="beer-info">Alkohol: '; echo $row['alcohol']; echo '%</p>';
            echo '<p class="beer-info">Størrelse: '; echo $row['size']; echo 'ml</p>';
            echo '<p class="beer-info">Bryggeri: '; echo $row['brewery']; echo '</p>';
            echo '<p class="beer-info">Land: '; echo 'some tekst</p>';
            echo '<p class="beer-info">Rating: '; echo 'some tekst</p>';
        //If the "name" from the database ISN'T EQUAL to the previous $beername, then close the list, and echo out the next $beername.
        }elseif ($row['name'] != $beername) {
          $beername = $row['name'];
          echo '</div></div></div><div class="beer">';
          echo '<div class="beer1"><div class="beer-img-wrapper">';
              echo "<label id='defaultOpen' class='tablinks' onclick=\"openBeer(event,'". $row['productID'] ."')\"></br>";
                echo '<input type="radio" name="img" checked><div class="img-arrow">';
                  echo '<img src="' . $row['img'] . '">';
                  echo '<div class="arrow-wrapper"><div class="arrow"></div></div></div></label></div></div>';
        echo '<div id="'; echo $row['productID']; echo'"class="beer-information default-hidden tabcontent">';
          echo '<div class="information-left">';
            echo '<h2 class="name">'; echo $row['name']; echo '</h2>';
            echo '<p class="description">'; echo $row['description']; echo '</p>';
          echo '<div class="price-n-btn">';
          echo '<div class="price-n-stock">';
            echo '<p class="price">'; echo $row['price'] .' '; echo 'DKK</br><p class="in-stock">På lager</p></p></div>';
            echo '<button class="buy-beer">Læg i kurv</button>';
          echo '</div></div><div class="information-right">';
            echo '<p class="beer-info">Kategori: '; echo $row['categoryID']; echo '</p>';
            echo '<p class="beer-info">Type: '; echo $row['type']; echo '</p>';
            echo '<p class="beer-info">Alkohol: '; echo $row['alcohol']; echo '%</p>';
            echo '<p class="beer-info">Størrelse: '; echo $row['size']; echo 'ml</p>';
            echo '<p class="beer-info">Bryggeri: '; echo $row['brewery']; echo '</p>';
            echo '<p class="beer-info">Land: '; echo 'some tekst</p>';
            echo '<p class="beer-info">Rating: '; echo 'some tekst</p>';
        //Else only echo the values in the "answer" column.
        }else {
          echo '';
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

 <script>
  function openBeer(evt, beerName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(beerName).style.display = "flex";
    evt.currentTarget.className += " active";
  }

  document.getElementById("defaultOpen").click();
  </script>
