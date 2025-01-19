<?php
include_once '../utils/autoloader.php';

session_start();

// Vérifie si idQuiz est défini dans POST avant de l'utiliser
if (isset($_POST['idQuiz'])) {
    $_SESSION['idQuiz'] = $_POST['idQuiz'];
} else {
    die('Erreur : ID du quiz non défini.');
}

// Initialise le QcmManager
$qcmManager = new QcmManager();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUIZ || </title>
    <link rel="stylesheet" href="./assets/styles/output.css">
    <link href="./assets/styles/style.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="fond-quadrille animate-bg-scroll overflow-x-hidden">

    <!-- Ajout d'une div avec une couleur de fond et une opacité de 50% -->
    <div class="fixed inset-0 bg-[#6E433C] bg-opacity-50 z-0 h-full w-full"></div>

    <!-- Section principale -->
    <section class="relative h-full max-w-full my-[39px] mx-[30px] p-2 bg-gradient-clair-orange }}
                    border-t-[7px] border-l-[7px] border-r-[15px] border-b-[15px] border-primary 
                    rounded-[42px] overflow-hidden">

                    
        <!-- Inclusion de l'en-tête -->
        <!-- PHP require_once './partials/headerQuizPlaying1.php';  -->


        <?php
        // Génère les questions pour le quiz spécifié
        if (isset($_SESSION['idQuiz'])) {
            echo $qcmManager->generateQuestions($_SESSION['idQuiz']);
        } else {
            echo '<p class="text-red-500">Aucun quiz sélectionné.</p>';
        }
        ?>


        <!-- Inclusion du pied de page -->
        <?php require_once './partials/footerQuizPlaying.php'; ?>

        
    </section>
</body>

</html>