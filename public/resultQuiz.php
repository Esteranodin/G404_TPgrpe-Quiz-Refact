<?php

require_once '../utils/autoloader.php';
session_start();

if (empty($_POST['answers'])) {
    header('location: ./choiceQuiz.php?error=1');
    exit;
}

// faire une entity/class Score

$score = 0;
foreach ($_POST['answers'] as $key) {
    $keyInt = (int)$key;
    if ($_POST['isRight'][$keyInt] == "1") {
        $score += 1;
    }
}

$qcm = new QcmRepository;
$qcmName = $qcm->find($_SESSION['idQuiz']);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUIZ || RESULTATS </title>
    <link rel="stylesheet" href="./assets/output.css">
    <link rel="stylesheet" href="./assets/styles/output.css">
    <link href="./assets/styles/style.css" rel="stylesheet">


    <script defer src="./assets/Javascript/animations.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes slideDown {
            0% {
                opacity: 0;
                transform: translateY(-50px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slide-down {
            animation: slideDown 1s ease forwards;
        }

        @keyframes slideUp {
            0% {
                opacity: 0;
                transform: translateY(50px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slide-up {
            animation: slideUp 1s ease forwards;
        }

        .podium-item {
            opacity: 0;
        }
    </style>
</head>

<body class="fond-quadrille animate-bg-scroll">

    <section
        class="relative h-full max-w-full my-[39px] mx-[30px] p-2 bg-gradient-clair-orange border-t-[7px] border-l-[7px] border-r-[15px] border-b-[15px] border-primary rounded-[42px] overflow-hidden">

        <?php require_once './partials/headerQuizResult.php'; ?>


        <h1 class="relative max-w-full font-changa text-darkprimary text-primary text-[45px] mb-10 sm:text-[4rem] lg:text-[6rem] lg:hidden">
            <?= $qcmName->getName()  ?></h1>


        <!-- PODIUM -->
        <article class="flex flex-row mb-10 items-end justify-center">

            <!-- DEUXIEME PLACE -->
            <div class="flex flex-col items-center podium-item">
                <img src="./assets/images/Phone - Quiz résultat/Podium/Silver-Medal.png" alt="Médaille d'argent" class="w-[3rem]">
                <div>
                    <p class="text-black text-xl font-bold ">Davis Curtis</p>
                    <span class="text-graycustom text-[15px] font-semibold">2,569 points</span>
                </div>
                <img src="./assets/images/Phone - Quiz résultat/Podium/2.png" alt="Colone 2" class="bottom-0">
            </div>

            <!-- PREMIERE PLACE -->
            <div class="flex flex-col items-center podium-item">
                <img src="./assets/images/Phone - Quiz résultat/Podium/Gold-Medal.png" alt="Médaille d'or" class="w-[3rem]">
                <p class="text-black text-xl font-bold ">Alena Donin</p>
                <span class="text-graycustom text-[15px] font-semibold">3,469 points</span>
                <img src="./assets/images/Phone - Quiz résultat/Podium/1.png" alt="Colone 1" class="bottom-0">
            </div>

            <!-- TROISEME PLACE -->
            <div class="flex flex-col items-center podium-item">
                <img src="./assets/images/Phone - Quiz résultat/Podium/Bronze-Medal.png" alt="Médaille de Bronze" class="w-[3rem]">
                <p class="text-black text-xl font-bold ">Graig Gouse</p>
                <span class="text-graycustom text-[15px] font-semibold">1,053 points</span>
                <img src="./assets/images/Phone - Quiz résultat/Podium/3.png" alt="Colone 3">
            </div>

        </article>

        <article>
            <h3 class="font-rubik text-darkprimary font-bold text-[2.5rem]">
                Bravo "PLAYER"
            </h3>
            <h4 class="font-rubik text-darkprimary font-bold text-2xl">
                Votre score : <?= $score ?> / <?= count($_POST['answers']) ?> pts
            </h4>


        </article>

        <a href="./choiceQuiz.php">
            <button type="submit" class="btn-custom2 btn-custom2:hover btn-custom2:focus transition-transform hover:scale-105" text-lg">
                Retour aux choix des quiz
            </button>
        </a>



        <?php require_once './partials/footerQuizResult.php'; ?>



    </section>
</body>

</html>