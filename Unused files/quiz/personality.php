<?php include 'php-db-projekt7.php';

$sql="SELECT * FROM table_beer_taste";
$result=$conn->query($sql);
print_r($sql);

$data=array();
while($row=$result->fetch_object()) $data[]=$row;
$terms=json_encode($data);
$show_mark = 0;
$cols = 1;
$rows = count($data)/(1*$cols);
//print_r($data);
?>

<doctype html>
  <html>
    <head>
      <title>Øl test</title>
    </head>
    <body>
      <form method="post" action="resul.php">
      <p>Test</p>
      <table>
        <thead>
          <tr>
            <?php for($i=0;$i<$cols;++$i):?>
              <th>svar</th>
            <?php endfor;?>
          </tr>
        </thead>
        <tbody>
          <?php
          for($i=0;$i<$rows;++$i){
            echo "<tr>".($i%2==0?"":"").">";
            for($j=0;$j<$cols;++$j){
              for($n=0;$n<1;++$n){
                if($j>0 && $n==0){
                  echo "<tr>".($i%2==0?"":"").">";
                } elseif($j==0){
                  echo "<th rowspan='$cols'"
                  .($j==0?"":"").">"
                  .($i+$n*$rows+1)
                  ."</th>";
                }
                echo "<td".($j==0?"":"").">
    		          		{$data[$cols*($i+$n*$rows)+$j]->productID}
    		          	  </td>
    		          	  <td".($j==0?"":"").">
    		        		<input type='radio' name='m[".($i+$n*$rows)."]'
    		        			   value='{$data[$cols*($i+$n*$rows)+$j]->productID}'
    		        			   />"
    		        	 .($show_mark?$data[$cols*($i+$n*$rows)+$j]->productID:'')
    		        	 ."</td>
    		          	  <td".($j==0?"":"").">
    		          		<input type='radio'
    		          		       name='l[".($i+$n*$rows)."]'
    		          		       value='{$data[$cols*($i+$n*$rows)+$j]->tasteID}'
    		          		       />"
    		          	 .($show_mark?$data[$cols*($i+$n*$rows)+$j]->tasteID:'')
    		          	 ."</td>";
              }
              echo "</tr>";
            }
          }
          ?>
        </tbody>
        <tfoot>
          <tr>
            <th>
              <input type="submit" value="submit"/>
            </th>
          </tr>
        </tfoot>
      </table>
    </body>
  </html>
