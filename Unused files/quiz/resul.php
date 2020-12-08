<doctype html>
  <html>
    <head>
      <title>Øl test</title>
    </head>
    <body>
      <?php
      if(isset($_POST['m']) && isset($_POST['l'])){
        $most=array_count_values($_POST['m']);
        $least=array_count_values($_POST['l']);
        $result=array();
        // $aspect=array('D','I','S','C','#');
        // foreach($aspect as $a){
        //   $result[$a]['most']=isset($most[$a])?$most[$a]:0;
        //   $result[$a]['least']=isset($least[$a])?$least[$a]:0;
        //   $result[$a]['change']=($a!='#'?$result[$a]['most']-$result[$a]['least']:0);
        // }

        include 'php-db-projekt7.php';
        $sql="SELECT * FROM table_beer_taste";
        $result=$conn->query($sql);
        if($result->num_rows>0){
          //output data of each row
          while($row = $result->fetch_assoc()){
            $data=(isset($result))?$result->fetch_assoc():'';

      ?>
      <h1>RESULTAT</h1>
      <?php print_r($data);?>
    <?php } ?>
    </body>
  </html>
