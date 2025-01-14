<?php 

include_once '../utils/autoloader.php';

session_start();
$_SESSION['id_quiz'] = $_POST['id_quiz'] ;
var_dump($_SESSION);


var_dump($_POST);

$qcmManager = new QcmManager();





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 

$qcmManager ->generateQuestions($_POST['id_quiz'])

?>


</body>
</html>