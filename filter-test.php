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
    <script type="text/javascript">
        $(document).ready(function(){
          $('section.result-dd').hide();
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
    <script type="text/javascript">
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
    </script>
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
  </body>
</html>
