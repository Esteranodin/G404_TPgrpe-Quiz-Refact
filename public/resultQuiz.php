<?php 

require_once '../utils/autoloader.php';

session_start();

$score = 0;

foreach ($_POST['answers'] as $key ) {
$keyInt = (int)$key;
   if($_POST['isRight'][$keyInt] == "1"){
    $score += 1;
   }




}




