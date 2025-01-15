<?php
// Démarrage de la session
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUIZ || PAGE D'ACCUEIL </title>
    <link rel="stylesheet" href="./assets/styles/output.css">
    <link href="./assets/styles/style.css" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="fond-quadrille animate-bg-scroll overflow-x-hidden">
    <!-- <body class="bg-fond-quadrille bg-cover bg-center h-screen overflow-x-hidden"> -->
    <!-- Section principale -->
    <section class="relative h-screen max-w-full lg:h-[calc(100vh-20px)] m-10 p-10 bg-gradient-clair-orange border-t-[7px] border-l-[7px] border-r-[15px] border-b-[15px] border-primary rounded-[42px] 
    lg:mx-[5%] lg:my-[2%] overflow-y-hidden box-border items-center">
        <!-- Contenu principal -->


             <!-- MOBILE -->
        <div class="flex justify-between w-full">
            <img src="./assets/images/Phone - accueil/Feu tricolore.png" alt="Feu tricolore de décoration"
                class="h-10 max-w-full lg:hidden -ml-4 -mt-4  lg:ml-0">
            <img src="./assets/images/Phone - accueil/Point interrogation.png" alt="Points d'interrogation"
                class="max-w-full -mr-8 -mt-4 lg:hidden">

            <!-- ORDINATEUR   -->
            <img src="./assets/images/Desktop - accueil/Feu tricolore.png" alt="Feu tricolore de décoration"
                class="hidden lg:block">
        </div>

        <h1 class="font-changa text-9xl text-center mb-16 lg:text-[15rem] lg:mb-0">QUIZ</h1>


        <!-- *****************************************************************************************************************
         *********************************************************************************************************************
         ***************************************************************************************************** VERSION MOBILE -->
        <!-- Message d'erreur (si le pseudo est dèja dans la base de donnée) -->
        <?php if (isset($_SESSION['error'])): ?>
        <div class="error-message text-red-500 text-lg text-center mb-4 lg:hidden">
            <?= $_SESSION['error']; ?>
        </div>
        <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <form action="../process/connexion_process.php" method="post"
            class="flex flex-col justify-center items-center w-full lg:w-1/2 lg:mx-auto lg:my-auto lg:flex lg:flex-col lg:justify-center lg:items-center">
            <label for="pseudo" class="font-changa text-3xl lg:text-5xl">Votre pseudo</label>
            <input type="text" id="pseudo" name="pseudo"
                class="border-[3px] border-black rounded-[17px] shadow-inner-lg bg-white w-[70%] lg:w-[50%] h-10 lg:h-14 pl-3"
                placeholder="Votre pseudo ici" required>

            <button type="submit"
                class="flex w-[103px] h-[40px] lg:w-[25%] lg:h-[60px] align-middle gap-[10px] flex-shrink-0 font-changa text-lg lg:text-2xl text-black rounded-[17px] shadow-lg mt-4 justify-center items-center hover:bg-darkprimary"
                style="background-color: var(--primary-color);">

                Valider
            </button>
        </form>



        <!-- POLYGONES VERSION TEL -->
        <section class="bottom-0 left-0 lg:hidden">
            <!-- Conteneur principal -->
            <div class="absolute h-[400px] w-full max-w-[400px] overflow-hidden bottom-[0rem] left-[0rem]">
                <div class="relative w-full h-[90%] bottom-0 right-0">
                    <!-- Polygone 1 -->
                    <div class="absolute top-[50%] left-[5%] animate-float">
                        <img src="./assets/images/Phone - accueil/P-4.png" alt="Polygone 1"
                            class="w-auto max-w-[70px] md:max-w-[100px] lg:hidden">
                    </div>
                    <!-- Polygone 2 -->
                    <div class="absolute top-[80%] left-[5%] animate-float2">
                        <img src="./assets/images/Phone - accueil/P-1.png" alt="Polygone 2"
                            class="w-auto max-w-[80px] md:max-w-[110px] lg:hidden">
                    </div>
                    <!-- Polygone 3 -->
                    <div class="absolute top-[50%] left-[30%] animate-float">
                        <img src="./assets/images/Phone - accueil/P-5.png" alt="Polygone 3"
                            class="w-auto max-w-[90px] md:max-w-[120px] lg:hidden">
                    </div>
                    <!-- Polygone 4 -->
                    <div class="absolute top-[70%] left-[45%] animate-float2">
                        <img src="./assets/images/Phone - accueil/P-6.png" alt="Polygone 4"
                            class="w-auto max-w-[80px] md:max-w-[110px] lg:hidden">
                    </div>
                    <!-- Polygone 5 -->
                    <div class="absolute top-[85%] left-[35%] animate-float">
                        <img src="./assets/images/Phone - accueil/P-3.png" alt="Polygone 5"
                            class="w-auto max-w-[70px] md:max-w-[100px] lg:hidden">
                    </div>
                    <!-- Polygone 6 -->
                    <div class="absolute top-[65%] left-[22%] animate-float2">
                        <img src="./assets/images//Phone - accueil/P-2.png" alt="Polygone 6"
                            class="w-auto max-w-[70px] md:max-w-[100px] lg:hidden">
                    </div>
                </div>
            </div>
        </section>



        <!-- *****************************************************************************************************************
         *********************************************************************************************************************
         ***************************************************************************************************** VERSION ORDINATEUR -->
        <section class="hidden lg:block">
            <!-- Conteneur principal -->
            <div class="absolute h-[700px] w-full max-w-[560px] overflow-hidden bottom-0 left-0">
                <div class="relative w-full h-[90%]">
                    <!-- Polygone 1 -->
                    <div class="absolute bottom-[337px] left-[5%] animate-float">
                        <img src="./assets/images/Desktop - accueil/P-6.png" alt="Polygone 1"
                            class="hidden lg:block">
                    </div>
                    <!-- Polygone 2 -->
                    <div class="absolute bottom-[218px] left-[10%] animate-float2">
                        <img src="./assets/images/Desktop - accueil/P-5.png" alt="Polygone 2"
                            class="hidden lg:block">
                    </div>
                    <!-- Polygone 3 -->
                    <div class="absolute bottom-[100px] left-[1px] animate-float">
                        <img src="./assets/images/Desktop - accueil/P-4.png" alt="Polygone 3"
                            class="hidden lg:block">
                    </div>
                    <!-- Polygone 4 -->
                    <div class="absolute bottom-[-2rem] left-[37px] animate-float2">
                        <img src="./assets/images/Desktop - accueil/P-1.png" alt="Polygone 4"
                            class="hidden lg:block">
                    </div>
                    <!-- Polygone 5 -->
                    <div class="absolute bottom-[-2rem] left-[165px] animate-float">
                        <img src="./assets/images/Desktop - accueil/P-2.png" alt="Polygone 5"
                            class="hidden lg:block">
                    </div>
                    <!-- Polygone 6 -->
                    <div class="absolute bottom-[-2rem] left-[250px] animate-float2">
                        <img src="./assets/images/Desktop - accueil/P-3.png" alt="Polygone 6"
                            class="hidden lg:block">
                    </div>
                </div>
            </div>
        </section>
    </section>
</body>

</html>