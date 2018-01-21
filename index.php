<?php
  include "../inc/dbinfo.inc";
  
  /* Connect to MySQL and select the database. */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
  $database = mysqli_select_db($connection, DB_DATABASE);

  $poke_choice = htmlentities($_POST['choice']);

  if(strlen($poke_choice)){
    $choiceresult = mysqli_query($connection, "SELECT * FROM `picnicker` WHERE `ID` = '$poke_choice' OR `Name` = '$poke_choice'"); 

    $query_data = mysqli_fetch_row($choiceresult);
    
    $pika_id = $query_data[0];
    $pika_name = $query_data[1];
    $pika_type = $query_data[2];
    $pika_type2 = $query_data[3];
    $pika_height = $query_data[4];
    $pika_weight = $query_data[5];

    //echo $pika_name;
  }

  ?>



<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

  <title>Pokemon!!!! API!!!</title>
  <meta name="author" content="Gena Gizzi">
  <link rel="shortcut icon" href="http://d15dxvojnvxp1x.cloudfront.net/assets/favicon.ico">
  <link rel="icon" href="http://d15dxvojnvxp1x.cloudfront.net/assets/favicon.ico">
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <script type="text/javascript" src="http://ec2-34-229-59-172.compute-1.amazonaws.com/jquery-1.10.2.min.js"></script>
</head>



<body>

<center>
  <div id="w">
    <h1><b>Pokedex</b></h1>
    <p>Enter pokemon name or number:</p>
    
    <form action="<?PHP echo $_SERVER['SCRIPT_NAME'] ?>" method="POST"  >
    <input type="text" name="choice" id="pokename" placeholder="Pokemon...">
    <input type="submit" id="pokesubmitbtn" value="Submit" />
    </form>
    <br>

    <div id="pokedata" class="clearfix">
    
    <?php
    if($pika_id > 0 && $pika_id < 152){
     echo '<img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/',$pika_id,'.png"><br><h2><b>#',$pika_id,' ',$pika_name,'</b></h2><br>';
    // echo $pika_name;
     echo ' <font size="2"><b>Type 1:</b> ',$pika_type;
     echo ' <br><b>Type 2:</b> ',$pika_type2;
     echo ' <br><b>Height: </b>',$pika_height,'m';
     echo ' <br><b>Weight: </b>', $pika_weight,'kg';
   }
     ?>

    </div>
  </div>





</body>
</html>



