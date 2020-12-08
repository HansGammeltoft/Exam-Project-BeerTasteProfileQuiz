<?php
  require 'config.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="./css/stylesheet.css" rel="stylesheet">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <body>
    <section>
      <div class="test-wrapper">
        <h1 id="question-header">Spørgsmål 1</h1>
        <div id="button-form-wrapper">
          <button class="quiz-button quiz-button1 quiz-buttonx4">Tilbage</button>
          <div class="question-answers">
            <?php
              $sql="SELECT answer FROM table_answers LIMIT 5";
              $result=$conn->query($sql);
              while($row=$result->fetch_assoc()){
            ?>
            <label class="product_check answers">
              <input type="radio" name="radio1" value="<?= $row['answer']; ?>" id="answer1">
              <div class="answer-border">
                  <img src="./images/5.png" alt="Et pink billede">
                  <p><?= $row['answer'] ?></p>
              </div>
            </label>
            <?php } ?>
            <button class="quiz-button quiz-button2 quiz-buttonx4">Næste</button>
        </div>
      </div>
    </div>

      <div class="test-wrapper">
        <h1 id="question-header">Spørgsmål 2</h1>
        <div id="button-form-wrapper">
          <button class="quiz-button quiz-button1 quiz-buttonx4">Tilbage</button>
          <div class="question-answers">
            <?php
              $sql="SELECT answer FROM table_answers LIMIT 5 OFFSET 5";
              $result=$conn->query($sql);
              while($row=$result->fetch_assoc()){
            ?>
            <label class="product_check answers">
              <input type="radio" name="radio2" value="<?= $row['answer']; ?>" id="answer2">
              <div class="answer-border">
                <img src="./images/5.png" alt="Et pink billede">
                <p><?= $row['answer'] ?></p>
              </div>
            </label>
            <?php } ?>
            <button class="quiz-button quiz-button2 quiz-buttonx4">Næste</button>
          </div>
        </div>
      </div>

      <div class="test-wrapper">
        <h1 id="question-header">Spørgsmål 3</h1>
        <div id="button-form-wrapper">
          <button class="quiz-button quiz-button1 quiz-buttonx4">Tilbage</button>
          <div class="question-answers">
            <?php
              $sql="SELECT answer FROM table_answers LIMIT 4 OFFSET 10";
              $result=$conn->query($sql);
              while($row=$result->fetch_assoc()){
            ?>
            <label class="product_check answers">
              <input type="radio" name="radio3" value="<?= $row['answer']; ?>" id="answer3">
              <div class="answer-border">
                <img src="./images/5.png" alt="Et pink billede">
                <p><?= $row['answer'] ?></p>
              </div>
            </label>
            <?php } ?>
            <button class="quiz-button quiz-button2 quiz-buttonx4">Næste</button>
          </div>
        </div>
      </div>

      <div class="test-wrapper">
        <h1 id="question-header">Spørgsmål 4</h1>
        <div id="button-form-wrapper">
          <button class="quiz-button quiz-button1 quiz-buttonx4">Tilbage</button>
          <div class="question-answers">
            <?php
              $sql="SELECT answer FROM table_answers LIMIT 4 OFFSET 14";
              $result=$conn->query($sql);
              while($row=$result->fetch_assoc()){
            ?>
            <label class="product_check answers">
              <input type="radio" name="radio4" value="<?= $row['answer']; ?>" id="answer4">
              <div class="answer-border">
                <img src="./images/5.png" alt="Et pink billede">
                <p><?= $row['answer'] ?></p>
              </div>
            </label>
            <?php } ?>
            <button class="quiz-button quiz-button2 quiz-buttonx4">Næste</button>
        </div>
      </div>
    </div>
    </section>

    <div class="row" id="result">
      </li></ul>
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
