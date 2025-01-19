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

        <?php require_once './partials/headerQuizHome.php'; ?>



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

        <?php require_once './partials/footerQuizHome.php'; ?>



    </section>
</body>

</html>