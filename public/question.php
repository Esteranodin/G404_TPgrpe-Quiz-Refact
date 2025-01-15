<?php 

include_once '../utils/autoloader.php';

session_start();
// Stocke l'ID du quiz dans la session
$_SESSION['idQuiz'] = $_POST['idQuiz'];


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
echo  $qcmManager->generateQuestions($_SESSION['idQuiz']);
?>

</body>
</html>