<?php
session_start();

include_once '../utils/autoloader.php';





$qcmRepository = new QcmRepository();

$qcms = $qcmRepository->findAll();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz-Choice</title>
    <link rel="stylesheet" href="./assets/styles/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body class="fond-quadrille animate-bg-scroll overflow-x-hidden bg-[#6E433C] bg-opacity-50">

    
    <!-- Section principale -->
    <section class="relative h-full max-w-full m-10 p-3 bg-gradient-clair-orange border-t-[7px] border-l-[7px] border-r-[15px] border-b-[15px] border-primary rounded-[42px]">

    <?php require_once './partials/headerQuizChoice.php'; ?>

        <main class="flex flex-wrap justify-center gap-10">
            <?php
            foreach ($qcms as $qcm) {
            ?>

                <!-- Choix de quiz -->
                <article class="relative h-full max-w-full bg-primaryopacity border-[5px] border-primary rounded-[1rem] shadow-inner-box lg:flex-row">

                    <h3 class="text-light font-changa my-3 text-stroke"><?= $qcm->getName() ?></h3>
                  <!-- input caché pour récup idQuiz -->
                    <input type="hidden" name="idQuiz" value="<?=htmlspecialchars($qcm->getId());?>">
                    <input type="hidden" name="NameQuiz" value="<?=htmlspecialchars($qcm->getName());?>">
                  
                    <!-- Trait décoratif -->
                    <div class="border-t-8 border-light rounded-full mx-4 mb-6"></div>

                    <div class="flex flex-col gap-4">
                        <!-- RANK 1 -->
                        <div class="flex flex-row items-center justify-between mx-10 p-4 bg-white border-b border-primary rounded-3xl shadow-2xl">
                            <div class="flex gap-2">
                                <span class="inline-flex items-center justify-center w-8 h-8 border-4 border-gray-custom rounded-full text-center bg-transparent">
                                    1
                                </span>
                                <div class="flex flex-col ml-4">
                                    <span class="text-black text-lg font-bold">Davis Curtis</span>
                                    <span class="text-graycustom text-base font-semibold">2,569 points</span>
                                </div>
                            </div>
                            <div>
                                <img src="../images/Phone - Quiz sélection/Gold.png" alt="Médaille d'or" class="w-[2.5rem] inline-flex items-center justify-center ">
                            </div>
                        </div>

                        <!-- RANK 2 -->
                        <div class="flex flex-row items-center justify-between mx-10 p-6 bg-white border-b border-primary rounded-3xl shadow-2xl">
                            <div class="flex gap-2">
                                <span class="inline-flex items-center justify-center w-8 h-8 border-4 border-gray-custom rounded-full text-center bg-transparent">
                                    2
                                </span>
                                <div class="flex flex-col ml-4">
                                    <span class="text-black text-lg font-bold">Alena Donin</span>
                                    <span class="text-graycustom text-base font-semibold">1,469 points</span>
                                </div>
                            </div>
                            <div>
                                <img src="../images/Phone - Quiz sélection/Silver.png" alt="Médaille d'argent" class="w-[2.5rem] inline-flex items-center justify-center ">
                            </div>
                        </div>

                        <!-- RANK 3 -->
                        <div class="flex flex-row items-center justify-between mx-10 p-6 bg-white border-b border-primary rounded-3xl shadow-2xl">
                            <div class="flex gap-2">
                                <span class="inline-flex items-center justify-center w-8 h-8 border-4 border-gray-custom rounded-full text-center bg-transparent">
                                    3
                                </span>
                                <div class="flex flex-col ml-4">
                                    <span class="text-black text-lg font-bold">Graig Gouse</span>
                                    <span class="text-graycustom text-base font-semibold">1,053 points</span>
                                </div>
                            </div>
                            <div>
                                <img src="../images/Phone - Quiz sélection/Bronze.png" alt="Médaille de Bronze" class="w-[2.5rem] inline-flex items-center justify-center ">
                            </div>
                        </div>
                    </div>

                    <form action="./question.php" method="post">
                        <input type="hidden" name="idQuiz" value="<?= htmlspecialchars($qcm->getId()) ?>" />
                        <button type="submit" class="btn-custom2 bg-[#541A25]:hover btn-custom2:focus">Let's go!</button>
                    </form>

                </article>

            <?php
            }
            ?>
        </main>
        <?php require_once './partials/footerQuizChoice.php'; ?>
    </section>
</body>


</html>