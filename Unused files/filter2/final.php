<?php include 'config.php'; ?>
<?php session_start(); ?>

<h1>Resultat</h1>
<p>Dit resultat er:</p>

<div class="row" id="result">
  <?php
  // if(isset($_POST['answer'])){
  //   $selected_answer = $_POST['answer'];
  // }

  $sql="SELECT * FROM table_beers
          INNER JOIN table_beer_taste ON table_beers.productID = table_beer_taste.productID
          INNER JOIN table_taste ON table_beer_taste.tasteID = table_taste.tasteID
          INNER JOIN table_answer_taste ON table_taste.tasteID = table_answer_taste.tasteID
          INNER JOIN table_answers ON table_answer_taste.answerID = table_answers.answerID";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){
  ?>
  <div>
    <div>
      <img>
    </div>
    <div>
      <p></p>
    </div>
    <ul>
      <li>
        <?php
        $beername = '';

        if($beername = $row['name']){

          echo $row['name']."<br/>".$row['taste']."<br/>".$row['answer'];

        }  //else if ($beer != $row['name'] && $beer != ''){

          //echo $beer;

        //} //else ($beer = $row['name']){

          //print_r($row['taste'].$row['answer'])
        //};
        ?>
      </li>
    </ul>
  </div>
</div>
<?php } ?>
