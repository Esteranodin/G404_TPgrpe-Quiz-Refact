<?php
include_once '../utils/autoloader.php';

session_start(); // Si vous avez besoin de la session

// Vérifier que l'ID du quiz est passé via POST
if (isset($_POST['id_quiz'])) {
    $idQuiz = $_POST['id_quiz'];

    // Créer une instance du QcmManager
    $qcmManager = new QcmManager();

    // Générer et afficher les questions et réponses pour ce quiz
    echo $qcmManager->generateQuestions($idQuiz);
} else {
    echo "Aucun quiz sélectionné."; // Si l'ID du quiz n'est pas passé
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Questions</title>
</head>
<body>
    <!-- La méthode generateQuestions affichera les questions et réponses ici -->
</body>
</html>
