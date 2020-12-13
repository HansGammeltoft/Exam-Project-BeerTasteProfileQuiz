if ($beername == '') {
  $beername = $row['name'];
  echo '<div class="beername_wrapper"><div>';
  echo '<img style="height:200px;" src="./images/oelkassenlogod.png">';
  echo '<div class="description-left">
          <div class="description">
              <h2 class="beer-name">'; echo $row['name']; echo '</h2>';
              echo '<p class="beer-description">'; echo $row['description']."</br>" .' '; echo '</p>';
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
              echo '<p class="beer-description">'; echo $row['description']."</br>" .' '; echo '</p>';
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
  //echo $row['taste'] .' ';
}



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
            echo '<img src="'; echo $row['img']; echo '"></br>';
          echo '<div class="beer-information">';
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
            echo '<img src="'; echo $row['img']; echo '"></br>';
          echo '<div class="beer-information default-hidden">';
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







 <?php
   require 'php-db-projekt7.php';
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <link href="./css/stylesheet.css" rel="stylesheet">
     <!-- jQuery library -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   </head>
   <body>
     <section class="test">
       <div id="q1_hidden" class="test-wrapper">
         <img class="logo" src="images/logouflasker.png" alt="Ølkassens logo">
         <?php
           $sql="SELECT question FROM table_questions
           WHERE questionID = 1";
           $result=$conn->query($sql);
           while($row=$result->fetch_assoc()){
         ?>
         <h1 id="question-header"><?php echo $row['question'] ?></h1>
           <div id="button-form-wrapper">
             <a href="index.php" class="quiz-button quiz-button1 quiz-buttonx4">Tilbage</a>
             <div class="question-answers">
               <?php
                 $sql="SELECT answer, img FROM table_test
                 WHERE questionID = 1";
                 $result=$conn->query($sql);
                 while($row=$result->fetch_assoc()){
               ?>
               <label class="product_check answers">
                 <input type="radio" name="radio1" value="<?= $row['answer']; ?>" id="answer1">
                 <div class="answer-border">
                   <img src=" <?php echo $row['img']; ?> ">
                   <p><?= $row['answer'] ?></p>
                 </div>
               </label>
             <?php } } ?>
               <button id="q2" class="quiz-button quiz-button2 quiz-buttonx4">Næste</button>
             </div>
           </div>
           <?php
             $sql="SELECT img FROM table_questions
             WHERE questionID = 1";
             $result=$conn->query($sql);
             while($row=$result->fetch_assoc()){
               echo '<img class="progress-bar" src="' . $row['img'] . '">';
             }
           ?>
         </div>

         <div id="q2_hidden" class="test-wrapper-hidden test-wrapper">
           <img class="logo" src="images/logouflasker.png" alt="Ølkassens logo">
           <?php
             $sql="SELECT question FROM table_questions
             WHERE questionID = 2";
             $result=$conn->query($sql);
             while($row=$result->fetch_assoc()){
           ?>
           <h1 id="question-header"><?php echo $row['question'] ?></h1>
             <div id="button-form-wrapper">
               <button id="backQ1" class="quiz-button quiz-button1 quiz-buttonx4">Tilbage</button>
               <div class="question-answers">
                 <?php
                   $sql="SELECT answer, img FROM table_test
                   WHERE questionID = 2";
                   $result=$conn->query($sql);
                   while($row=$result->fetch_assoc()){
                 ?>
                 <label class="product_check answers">
                   <input type="radio" name="radio2" value="<?= $row['answer']; ?>" id="answer2">
                   <div class="answer-border">
                     <img src=" <?php echo $row['img']; ?> ">
                     <p><?= $row['answer'] ?></p>
                   </div>
                 </label>
               <?php } } ?>
                 <button id="q3" class="quiz-button quiz-button2 quiz-buttonx4">Næste</button>
               </div>
             </div>
             <?php
               $sql="SELECT img FROM table_questions
               WHERE questionID = 2";
               $result=$conn->query($sql);
               while($row=$result->fetch_assoc()){
                 echo '<img class="progress-bar" src="' . $row['img'] . '">';
               }
             ?>
           </div>

           <div id="q3_hidden" class="test-wrapper-hidden test-wrapper">
             <img class="logo" src="images/logouflasker.png" alt="Ølkassens logo">
             <?php
               $sql="SELECT question FROM table_questions
               WHERE questionID = 3";
               $result=$conn->query($sql);
               while($row=$result->fetch_assoc()){
             ?>
             <h1 id="question-header"><?php echo $row['question'] ?></h1>
             <div id="button-form-wrapper">
               <button id="backQ2" class="quiz-button quiz-button1 quiz-buttonx4">Tilbage</button>
               <div class="question-answers">
                 <?php
                   $sql="SELECT answer, img FROM table_test
                   WHERE questionID = 3";
                   $result=$conn->query($sql);
                   while($row=$result->fetch_assoc()){
                 ?>
                 <label class="product_check answers">
                   <input type="radio" name="radio3" value="<?= $row['answer']; ?>" id="answer3">
                   <div class="answer-border">
                     <img src=" <?php echo $row['img']; ?> ">
                     <p><?= $row['answer'] ?></p>
                   </div>
                 </label>
               <?php } } ?>
               <button id="q4" class="quiz-button quiz-button2 quiz-buttonx4">Næste</button>
               </div>
             </div>
             <?php
               $sql="SELECT img FROM table_questions
               WHERE questionID = 3";
               $result=$conn->query($sql);
               while($row=$result->fetch_assoc()){
                 echo '<img class="progress-bar" src="' . $row['img'] . '">';
               }
             ?>
           </div>

           <div id="q4_hidden" class="test-wrapper-hidden test-wrapper">
             <img class="logo" src="images/logouflasker.png" alt="Ølkassens logo">
             <?php
               $sql="SELECT question FROM table_questions
               WHERE questionID = 4";
               $result=$conn->query($sql);
               while($row=$result->fetch_assoc()){
             ?>
             <h1 id="question-header"><?php echo $row['question'] ?></h1>
             <div id="button-form-wrapper">
               <button id="backQ3" class="quiz-button quiz-button1 quiz-buttonx4">Tilbage</button>
               <div class="question-answers">
                 <?php
                   $sql="SELECT answer, img FROM table_test
                   WHERE questionID = 4";
                   $result=$conn->query($sql);
                   while($row=$result->fetch_assoc()){
                 ?>
                 <label class="product_check answers">
                   <input type="radio" name="radio4" value="<?= $row['answer']; ?>" id="answer4">
                   <div class="answer-border">
                     <img src=" <?php echo $row['img']; ?> ">
                     <p><?= $row['answer'] ?></p>
                   </div>
                 </label>
               <?php } } ?>
               <button id="showResult" class="quiz-button quiz-button2 quiz-buttonx4">Afslut</button>
             </div>
           </div>
           <?php
             $sql="SELECT img FROM table_questions
             WHERE questionID = 4";
             $result=$conn->query($sql);
             while($row=$result->fetch_assoc()){
               echo '<img class="progress-bar" src="' . $row['img'] . '">';
             }
           ?>
         </div>
       </section>
       <section class="result-dd"id="result-section">
         <div class="result-dd">

         </div>
         <?php include 'includes/animation.php'; ?>
         <?php include 'includes/header.php' ?>
         <h1>Her er dit perfekte match</h1>
         <div id="result-page">
           <div class="beer-wrapper">
             <div id="result"></div>
           </div>
         </div>
         <div class="add-all">
             <div class="add-all-text">
                 <p>Køb hele den personlige kasse og spar 10%</p>
             </div>
             <div class="input-button">
                 <div class="input-calc">
                     <button>&#43;</button>
                     <input placeholder="0">
                     <button>&#8722;</button>
                 </div>
             </div>
             <button class="add-all-button">Læg alle i kurv</button>
         </div>
         <footer>
           <?php include 'includes/footer.php' ?>
         </footer>
       </section>
       <script src="./script/filter.js"></script>
       <script src="./script/showhide.js"></script>
   </body>
 </html>

 //frem
 $(document).ready(function(){
   $(function() {
      $('button#q2').click(function() {
         $('div#q2_hidden').show();
         return false;
      });
   });
 });

 $(document).ready(function(){
   $(function() {
      $('button#q2').click(function() {
         $('div#q1_hidden').hide();
         return false;
      });
   });
 });
 $(document).ready(function(){
   $(function() {
      $('button#q3').click(function() {
         $('div#q3_hidden').show();
         return false;
      });
   });
 });
 $(document).ready(function(){
   $(function() {
      $('button#q3').click(function() {
         $('div#q2_hidden').hide();
         return false;
      });
   });
 });
 $(document).ready(function(){
   $(function() {
      $('button#q4').click(function() {
         $('div#q4_hidden').show();
         return false;
      });
   });
 });
 $(document).ready(function(){
   $(function() {
      $('button#q4').click(function() {
         $('div#q3_hidden').hide();
         return false;
      });
   });
 });
 $(document).ready(function(){
   $(function() {
      $('button#showResult').click(function() {
         $('div#q4_hidden').hide();
         return false;
      });
   });
 });
   //Tilbage
 $(document).ready(function(){
   $(function() {
      $('button#backQ1').click(function() {
         $('div#q1_hidden').show();
         return false;
      });
   });
 });
 $(document).ready(function(){
   $(function() {
      $('button#backQ1').click(function() {
         $('div#q2_hidden').hide();
         return false;
      });
   });
 });
 $(document).ready(function(){
   $(function() {
      $('button#backQ2').click(function() {
         $('div#q2_hidden').show();
         return false;
      });
   });
 });
 $(document).ready(function(){
   $(function() {
      $('button#backQ2').click(function() {
         $('div#q3_hidden').hide();
         return false;
      });
   });
 });
 $(document).ready(function(){
   $(function() {
      $('button#backQ3').click(function() {
         $('div#q3_hidden').show();
         return false;
      });
   });
 });
 $(document).ready(function(){
   $(function() {
      $('button#backQ3').click(function() {
         $('div#q4_hidden').hide();
         return false;
      });
   });
 });
   //show final result (limit 5)
 $(document).ready(function(){
   $(function() {
      $('button#showResult').click(function() {
         $('section.result-dd').show();
         $('section.test').hide();
         $('div#result').show();
         return false;
      });
   });
 });
