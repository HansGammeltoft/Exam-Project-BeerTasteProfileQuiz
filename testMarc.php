<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

  </head>
  <body>
    <form id="radiocb">
      <div class="question" id="question1" onclick="radio1(event)">
        <p>Hvad er din yndlingsfrugt?</p>
        <input type="checkbox" id="answer-option1" name="answer1" value="1">
        <input type="checkbox" id="answer-option2" name="answer2" value="1">
        <input type="checkbox" id="answer-option3" name="answer3" value="1">
        <input type="checkbox" id="answer-option4" name="answer4" value="1">
        <input type="checkbox" id="answer-option5" name="answer5" value="1">
        <input type="checkbox" id="answer-option6" name="answer6" value="1">
      </div>
      <div class="question" id="question2" onclick="radio2(event)">
        <p>Hvilken drink vil du vælge?</p>
        <input type="checkbox" id="answer-option7" name="answer7" value="1">
        <input type="checkbox" id="answer-option8" name="answer8" value="1">
        <input type="checkbox" id="answer-option9" name="answer9" value="1">
        <input type="checkbox" id="answer-option10" name="answer10" value="1">
        <input type="checkbox" id="answer-option11" name="answer11" value="1">
        <input type="checkbox" id="answer-option12" name="answer12" value="1">
      </div>
      <div class="question" id="question3" onclick="radio3(event)">
        <p>Hvad er dit yndlingsslik?</p>
        <input type="checkbox" id="answer-option13" name="answer13" value="1">
        <input type="checkbox" id="answer-option14" name="answer14" value="1">
        <input type="checkbox" id="answer-option15" name="answer15" value="1">
        <input type="checkbox" id="answer-option16" name="answer16" value="1">
        <input type="checkbox" id="answer-option17" name="answer17" value="1">
        <input type="checkbox" id="answer-option18" name="answer18" value="1">
      </div>
      <div class="question" id="question4" onclick="radio4(event)">
        <p>Hvilken te er din yndlings?</p>
        <input type="checkbox" id="answer-option19" name="answer19" value="1">
        <input type="checkbox" id="answer-option20" name="answer20" value="1">
        <input type="checkbox" id="answer-option21" name="answer21" value="1">
        <input type="checkbox" id="answer-option22" name="answer22" value="1">
        <input type="checkbox" id="answer-option23" name="answer23" value="1">
        <input type="checkbox" id="answer-option24" name="answer24" value="1">
      </div>
      <br>
      <input type="submit" value="Afslut" />
      <br><br>
   </form>
   <?php
      
    //Set up variables 
    $server = "localhost"; 
    $user = "root"; 
    $pw = "";
    $db = "projekt7"; 

    //create connection
    $conn = new mysqli($server, $user, $pw, $db); 

    //check connection 
    if($conn->connect_error){
        die("Connection failed:" .$conn->connect_error); 
    }
    echo "Connected successfully"."<br/>";  
      
   // if data is posted, set value to 1, else to 0
   $check_0 = isset($_GET['answer1']) ? 1 : 0;
   $check_1 = isset($_GET['answer2']) ? 1 : 0;
   $check_2 = isset($_GET['answer3']) ? 1 : 0;
   $check_3 = isset($_GET['answer4']) ? 1 : 0;
   $check_4 = isset($_GET['answer5']) ? 1 : 0;
   $check_5 = isset($_GET['answer6']) ? 1 : 0;

   $check_6 = isset($_GET['answer7']) ? 1 : 0;
   $check_7 = isset($_GET['answer8']) ? 1 : 0;
   $check_8 = isset($_GET['answer9']) ? 1 : 0;
   $check_9 = isset($_GET['answer10']) ? 1 : 0;
   $check_10 = isset($_GET['answer11']) ? 1 : 0;
   $check_11 = isset($_GET['answer12']) ? 1 : 0;

   $check_12 = isset($_GET['answer13']) ? 1 : 0;
   $check_13 = isset($_GET['answer14']) ? 1 : 0;
   $check_14 = isset($_GET['answer15']) ? 1 : 0;
   $check_15 = isset($_GET['answer16']) ? 1 : 0;
   $check_16 = isset($_GET['answer17']) ? 1 : 0;
   $check_17 = isset($_GET['answer18']) ? 1 : 0;

   $check_18 = isset($_GET['answer19']) ? 1 : 0;
   $check_19 = isset($_GET['answer20']) ? 1 : 0;
   $check_20 = isset($_GET['answer21']) ? 1 : 0;
   $check_21 = isset($_GET['answer22']) ? 1 : 0;
   $check_22 = isset($_GET['answer23']) ? 1 : 0;
   $check_23 = isset($_GET['answer24']) ? 1 : 0;

   // qustion result lists the answers into a number strong
   $question1_results = $check_0.$check_1.$check_2.$check_3.$check_4.$check_5;
   $question2_results = $check_6.$check_7.$check_8.$check_9.$check_10.$check_11;
   $question3_results = $check_12.$check_13.$check_14.$check_15.$check_16.$check_17;
   $question4_results = $check_18.$check_19.$check_20.$check_21.$check_22.$check_23;

   //tags
   $orange = $æble = $klementin = $hindbær = $mandarin = $ananas = $ananas = $lime = $passionsfrugt = $citrus = $banan = $kokos = $guava = $tropisk_frugt = $fersken = $papaya = $kirsebær = $figner = $brombær = $jordbær = $kaffebær = $figner = $bitter = $frugt = $grape = $blodappelsin = $frisk = $eg = $bourbon = $brændt_sukker = $alkohol = $karamelliserede_figner = $karamelliseret_sukker = $sur = $sødme = $vanilje = $kakao = $chokolade = $kiks = $karamel = $espresso = $kaffe = $ristet = $mørk_chokolade = $skumfiduser = $mandel = $nødder = $valnød = $mango = $honning = $hvede = $koriander = $urter = $blomster = $græs = 0;

      // question1 - Hvad er din yndlingsfrugt?

      // Answer Option 1 - Jeg elsker friske, sure frugter
      if ($question1_results == "100000") {
        ++$orange . ++$æble . ++$hindbær . ++$klementin . ++$mandarin . ++$ananas . ++$lime . ++$passionsfrugt . ++$citrus;
      }
      // Answer Option 2 - Jeg elsker søde, eksotiske frugter
      elseif ($question1_results == "010000") {
        ++$banan . ++$kokos . ++$guava . ++$ananas . ++$tropisk_frugt . ++$fersken . ++$papaya . ++$klementin;
      }
      // Answer Option 3 - Jeg elsker røde, modne frugter
      elseif ($question1_results == "001000") {
        ++$kirsebær . ++$figner . ++$brombær . ++$jordbær;
      }
      // Answer Option 4 - Jeg elsker bitre frugter
      elseif ($question1_results == "000100") {
        ++$kaffebær . ++$bitter . ++$frugt . ++$grape . ++$blodappelsin;
      }
      // Answer Option 5 - Jeg spiser ikke frugt
      elseif ($question1_results == "000010") {
        ++$eg . ++$bourbon . ++$kakao . ++$vanilje . ++$nødder . ++$kiks;
      }
      // Answer Option 6 -
      elseif ($question1_results == "000001") {

      }

      // question2 - Hvilken drink vil du vælge?

      // Answer Option 1 - Gin and Tonic
      if ($question2_results == "100000") {
        ++$frisk . ++$bitter . ++$grape . ++$blodappelsin;
      }
      // Answer Option 2 - Whiskey
      elseif ($question2_results == "010000") {
        ++$eg . ++$bourbon . ++$brændt_sukker . ++$alkohol . ++$karamelliserede_figner . ++$karamelliseret_sukker;
      }
      // Answer Option 3 - Margarita
      elseif ($question2_results == "001000") {
        ++$citrus . ++$klementin . ++$hindbær . ++$sur . ++$lime . ++$orange . ++$æble;
      }
      // Answer Option 4 - Pina colada
      elseif ($question2_results == "000100") {
        ++$sødme . ++$banan . ++$fersken . ++$papaya . ++$klementin . ++$ananas . ++$kokos . ++$guava . ++$tropisk_frugt;
      }
      // Answer Option 5 - Dumle?
      elseif ($question2_results == "000010") {
        ++$vanilje . ++$kakao . ++$chokolade . ++$kiks . ++$karamel;
      }
      // Answer Option 6 - Hvilken drink vil du vælge?
      elseif ($question2_results == "000001") {

      }
      // question3 - Hvad er dit yndlingsslik

      //Mørk chokolade
      if ($question3_results == "100000") {
        ++$kakao . ++$espresso . ++$kaffebær . ++$kaffe . ++$bitter . ++$ristet . ++$mørk_chokolade . ++$chokolade;
      }
      //karamel
      elseif ($question3_results == "010000") {
        ++$vanilje . ++$skumfiduser . ++$mandel . ++$nødder . ++$kiks . ++$valnød . ++$karamelliserede_figner . ++$karamel . ++$karamelliseret_sukker;
      }
      //Sød vingummi
      elseif ($question3_results == "001000") {
        ++$fersken . ++$papaya . ++$tropisk_frugt . ++$mango . ++$guava;
      }
      //Sur vingummi
      elseif ($question3_results == "000100") {
        ++$klementin . ++$hindbær . ++$lime . ++$passionsfrugt . ++$ananas . ++$citrus . ++$æble . ++$mandarin . ++$orange;
      }
      elseif ($question3_results == "000010") {

      }
      elseif ($question3_results == "000001") {

      }
      // question4 - Hvilken te er din yndlings?

      //Urte te
      if ($question4_results == "100000") {
        ++$honning . ++$hvede . ++$koriander . ++$urter . ++$blomster . ++$græs;
      }
      //Frugt te
      elseif ($question4_results == "010000") {
        ++$figner . ++$frugt . ++$kirsebær . ++$jordbær . ++$fersken . ++$klementin . ++$papaya . ++$grape . ++$blodappelsin . ++$ananas . ++$frugt . ++$passionsfrugt . ++$mango . ++$mandarin;
      }
      //Mælk eller sukker
      elseif ($question4_results == "001000") {
        ++$hindbær . ++$lime . ++$passionsfrugt . ++$guava . ++$sur . ++$frisk . ++$sødme . ++$banan . ++$ristet . ++$karamel . ++$kaffe . ++$vanilje . ++$chokolade . ++$nødder;
      }
      //Kaffe
      elseif ($question4_results == "000100") {
        ++$espresso . ++$kaffebær . ++$ristet . ++$bitter . ++$kaffe;
      }
      elseif ($question4_results == "000010") {

      }
      elseif ($question4_results == "000001") {

      }

      //products
         $black_is_beautiful = "SELECT taste FROM table_beer_taste
                    INNER JOIN table_beers ON table_beers.productID = table_beer_taste.productID
                    INNER JOIN table_taste ON table_taste.tasteID = table_beer_taste.tasteID
                    WHERE table_beer_taste.productID = 1";
        $result = $conn->query($black_is_beautiful); 
        if($result->num_rows>0){
        //output data of each row
        while($row = $result->fetch_assoc()){
        echo $row['taste']."<br/>"; 
        }
        } 
      
            //$kakao + $vanilje + $espresso + $kaffebær, "<br>";
      echo "Rocky road ice cream ", $rocky_road_ice_cream = $kakao + $vanilje + $mandel + $skumfiduser, "<br>";
      echo "70K BA ", $k_ba = $ristet = $chokolade + $bourbon, "<br>";
      echo "The mistress bourbon ", $the_mistress_bourbon = $mørk_chokolade + $kaffe + $brændt_sukker + $kirsebær + $bitter + $ristet, "<br>";
      echo "Sey no more ", $sey_no_more = $kaffe + $nødder + $vanilje + $kiks + $chokolade, "<br>";
      echo "Roxy bourbon 2015 ", $roxy_bourbon_2015 = $kakao + $karamelliserede_figner + $brombær + $valnød + $eg + $frugt + $alkohol, "<br>";
      echo "Eartha 2015 ", $eartha_2015 = $vanilje + $kirsebær + $jordbær + $karamelliseret_sukker, "<br>";
      echo "Hefeweissbier dunkel ", $hefeweissbier_dunkel = $frugt + $frisk + $sødme + $banan + $ristet + $karamel, "<br>";
      echo "Particles ", $particles = $fersken + $klementin + $papaya + $grape + $blodappelsin, "<br>";
      echo "Interstratal Abyss ", $interstratal_abyss = $passionsfrugt + $tropisk_frugt + $ananas, "<br>";
      echo "Cloudy People ", $cloudy_people = $mandarin + $ananas + $mango, "<br>";
      echo "Wit ", $wit = $hvede + $æble + $urter + $koriander + $orange + $honning + $frisk, "<br>";
      echo "Pils brosnan ", $pils_brosnan = $blomster + $bitter + $citrus + $græs + $urter, "<br>";
      echo "BlaBlaBla ", $blablabla = $hindbær + $lime + $passionsfrugt + $guava, "<br>";
      echo "My Phone's On Snooze ", $my_phones_on_snooze = $hindbær + $sur, "<br>";

      /* $arrayName = array($black_is_beautiful, $rocky_road_ice_cream, $k_ba, $the_mistress_bourbon, $sey_no_more, $roxy_bourbon_2015, $eartha_2015, $hefeweissbier_dunkel, $particles, $interstratal_abyss, $cloudy_people, $wit, $pils_brosnan, $blablabla, $my_phones_on_snooze);
      rsort($arrayName);
      print_r($arrayName); */
   ?>
    <script>
    function radio1(e){
       e = e || event;
       var radiobutton = e.srcElement || e.target;
       if (radiobutton.type !== 'checkbox') {return true;}
       var radiobuttons = document.getElementById('question1').getElementsByTagName('input'), i=radiobuttons.length;
        while(i--) {
            if (radiobuttons[i].type && radiobuttons[i].type == 'checkbox' && radiobuttons[i].id !== radiobutton.id) {
             radiobuttons[i].checked = false;
            }
        }
    }
    function radio2(e){
       e = e || event;
       var radiobutton = e.srcElement || e.target;
       if (radiobutton.type !== 'checkbox') {return true;}
       var radiobuttons = document.getElementById('question2').getElementsByTagName('input'), i=radiobuttons.length;
        while(i--) {
            if (radiobuttons[i].type && radiobuttons[i].type == 'checkbox' && radiobuttons[i].id !== radiobutton.id) {
             radiobuttons[i].checked = false;
            }
        }
    }
    function radio3(e){
       e = e || event;
       var radiobutton = e.srcElement || e.target;
       if (radiobutton.type !== 'checkbox') {return true;}
       var radiobuttons = document.getElementById('question3').getElementsByTagName('input'), i=radiobuttons.length;
        while(i--) {
            if (radiobuttons[i].type && radiobuttons[i].type == 'checkbox' && radiobuttons[i].id !== radiobutton.id) {
             radiobuttons[i].checked = false;
            }
        }
    }
    function radio4(e){
       e = e || event;
       var radiobutton = e.srcElement || e.target;
       if (radiobutton.type !== 'checkbox') {return true;}
       var radiobuttons = document.getElementById('question4').getElementsByTagName('input'), i=radiobuttons.length;
        while(i--) {
            if (radiobuttons[i].type && radiobuttons[i].type == 'checkbox' && radiobuttons[i].id !== radiobutton.id) {
             radiobuttons[i].checked = false;
            }
        }
    }
    </script>
  </body>
</html>
