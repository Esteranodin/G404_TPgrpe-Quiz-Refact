<?php 

include_once '../utils/autoloader.php';

session_start();
// Stocke l'ID du quiz dans la session
$_SESSION['id_quiz'] = $_POST['id_quiz'];
var_dump($_SESSION);

var_dump($_POST);

// Initialise le QcmManager
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
// Génère les questions pour le quiz spécifié
$qcmManager->generateQuestions($_POST['id_quiz']);
?>

</body>
</html>