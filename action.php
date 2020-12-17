<?php
  header('Content-Type: text/html; charset=utf-8');
  require 'php-db-projekt7.php';

  if (isset($_POST['action'])) {
    $sql = "SELECT * FROM table_beers
            INNER JOIN table_brewery ON table_beers.breweryID = table_brewery.breweryID
            INNER JOIN table_country ON table_brewery.countryID = table_country.CountryID
            INNER JOIN table_rating ON table_beers.ratingID = table_rating.ratingID
            INNER JOIN table_type ON table_beers.typeID = table_type.typeID
            INNER JOIN table_category ON table_type.categoryID = table_category.CategoryID
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
        //If $beername is EQUAL to empty, which it is, then SET it as the values in the "name" column in the database and show the beer.
        if ($beername == '') {
          $beername = $row['name'];
          echo '<div class="beername_wrapper">
                  <div class="beer">
                    <div class="beer-image">
                      <div class="beer-img-wrapper">'
                      . "<label id='defaultOpen' class='tablinks' onclick=\"openBeer(event,'". $row['productID'] ."')\">
                        </br>"
                        . '<input type="radio" name="img" checked>
                          <div class="img-arrow">
                            <img src="' . $row['img'] . '">
                              <div class="arrow-wrapper">
                                <div class="arrow">
                                </div>
                              </div>
                          </div>
                        </label>
                      </div>
                    </div>
                    <div id="' . $row['productID'] .'"class="beer-information tabcontent">
                    <h2 class="name">' . $row['name'] . '</h2>
                    <div class="information-wrapper">
                      <div class="information-left">
                        <p class="description">' . $row['description'] . '</p>
                          <div class="price-n-btn">
                            <div class="price-n-stock">
                              <p class="price">' . $row['price'] .' ' . 'DKK
                                </br>
                                <p class="in-stock">På lager</p>
                              </p>
                            </div>
                            <button class="buy-beer">Læg i kurv</button>
                          </div>
                        </div>
                        <div class="information-right">
                          <div class="beer-info-hide beer-info">
                            <p class="beer-info-bold">Kategori: </p>
                            <p>' . $row['category'] . '</p>
                          </div>
                          <div class="beer-info">
                            <p class="beer-info-bold">Type:</p>
                            <p>' . $row['type'] . '</div>
                            <div class="beer-info">
                              <p class="beer-info-bold">Alkohol:</p>
                              <p>' . $row['alcohol'] . '%
                            </div>
                              <div class="beer-info-hide beer-info">
                            <p class="beer-info-bold">Størrelse:</p>
                            <p>' . $row['size'] . 'ml</p>
                          </div>
                          <div class="beer-info-hide beer-info">
                            <p class="beer-info-bold">Bryggeri:</p>
                            <p>' . $row['brewery'] . '</p>
                          </div>
                          <div class="beer-info-hide beer-info">
                            <p class="beer-info-bold">Land:</p>
                            <p>' . $row['country'] . '</p>
                          </div>
                          <div class="beer-info-hide beer-info">
                            <p class="beer-info-bold">Rating:</p>
                            <p>' . '
                              <a class="rating-link" target="_blank" href="' . $row['url'] .'">' . $row['rating'] .'</a>
                            </p>
                          </div>';
        //If the "name" from the database ISN'T EQUAL to the previous $beername, then close the div, and echo out the next $beername.
        }elseif ($row['name'] != $beername) {
          $beername = $row['name'];
          echo '        </div>
                      </div>
                    </div>
                  </div>
                  <div class="beer">
                    <div class="beer-image"><div class="beer-img-wrapper">'
                  . "<label id='defaultOpen' class='tablinks' onclick=\"openBeer(event,'". $row['productID'] ."')\">
                    </br>"
                  . '<input type="radio" name="img" checked>
                    <div class="img-arrow">
                      <img src="' . $row['img'] . '">
                        <div class="arrow-wrapper">
                          <div class="arrow">
                          </div>
                        </div>
                      </div>
                    </label>
                  </div>
                </div>
                <div id="' . $row['productID'] .'"class="beer-information default-hidden tabcontent">
                <h2 class="name">' . $row['name'] . '</h2>
                <div class="information-wrapper">
                  <div class="information-left">
                    <p class="description">' . $row['description'] . '</p>
                    <div class="price-n-btn">
                      <div class="price-n-stock">
                        <p class="price">' . $row['price'] .' ' . 'DKK
                          </br>
                          <p class="in-stock">På lager</p>
                        </p>
                      </div>
                      <button class="buy-beer">Læg i kurv</button>
                    </div>
                  </div>
                  <div class="information-right">
                    <div class="beer-info-hide beer-info">
                      <p class="beer-info-bold">Kategori: </p>
                      <p>' . $row['category'] . '</p>
                    </div>
                    <div class="beer-info">
                      <p class="beer-info-bold">Type:</p>
                      <p>' . $row['type'] . '
                    </div>
                    <div class="beer-info">
                      <p class="beer-info-bold">Alkohol:</p>
                      <p>' . $row['alcohol'] . '%
                    </div>
                    <div class="beer-info-hide beer-info">
                      <p class="beer-info-bold">Størrelse:</p>
                      <p>' . $row['size'] . 'ml</p>
                    </div>
                    <div class="beer-info-hide beer-info">
                      <p class="beer-info-bold">Bryggeri:</p>
                      <p>' . $row['brewery'] . '</p>
                    </div>
                    <div class="beer-info-hide beer-info">
                      <p class="beer-info-bold">Land:</p>
                      <p>' . $row['country'] . '</p>
                    </div>
                    <div class="beer-info-hide beer-info">
                      <p class="beer-info-bold">Rating:</p>
                      <p>' . '
                        <a class="rating-link" target="_blank" href="' . $row['url'] .'">' . $row['rating'] .'</a>
                      </p>
                    </div>';
        //Else echo nothing.
        }else {
          echo '';
        }
      }
    }
  }
 ?>
 <!--Set limit of showcased beers to the first five-->
 <script src="./script/5limit.js"></script>
 <!--Use tabbed content to show/hide to show and hide related/unrelated content-->
 <script src="./script/beertabs.js"></script>
