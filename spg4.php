<?php
session_start();
$tag4 = 5;

$_SESSION['tag4'] = $tag4;

print_r($_SESSION);

$whereClause = '';
$i = 0;
foreach ($_SESSION as $key => $value) {
  if($i <= 0) $whereClause = ' WHERE table_taste.tasteID = ' . $value;
  else $whereClause .= ' OR table_taste.tasteID = ' . $value;
  $i++;
}

$resultQuery = "SELECT * from `table_taste` ' . $whereClause . '";
  //JOIN 'xx' ON beers.id = bt.bid
  //JOIN 'xx' ON bt.tid = tastes.id
