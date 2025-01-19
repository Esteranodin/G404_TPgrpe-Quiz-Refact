<?php

final class QcmManager
{
    private QcmRepository $qcmRepository;
    private QuestionRepository $questionRepository;
    private AnswerRepository $answerRepository;

    // Constructeur de la classe, initialise les repositories
    public function __construct()
    {
        $this->qcmRepository = new QcmRepository();
        $this->questionRepository = new QuestionRepository();
        $this->answerRepository = new AnswerRepository();
    }

    // Méthode pour construire un QCM complet avec ses questions et réponses
    private function buildQcm(int $idQuiz): Qcm
    {
        // Récupère le QCM par son ID
        $qcm = $this->qcmRepository->find($idQuiz);

        // Récupère les questions liées au QCM
        if ($qcm) {
            $questions = $this->questionRepository->findAllByQcm($qcm->getId());
            $qcm->setQuestions($questions);
        }

        // Récupère les réponses pour chaque question du QCM
        foreach ($qcm->getQuestions() as $question) {
            $answers = $this->answerRepository->findAllByQuestion($question->getIdQuestion());
            $question->setAnswers($answers);
        }

        return $qcm;
    }

    // Méthode pour afficher une question du QCM
    private function displayQuestion(Qcm $qcm): string

    {

        $qcmsQuestions = $qcm->getQuestions();

        ob_start();

?>



        <header>


            <form action="./resultQuiz.php" method="post">

                <!-- *****************************************************************************************************************
         *********************************************************************************************************************
         ***************************************************************************************************** VERSION TELEPHONE -->
                <section class="top-0 left-0 lg:hidden mb-[5%] z-2 ">

                    <!-- Conteneur principal -->
                    <div
                        class="relative h-[225px] w-full overflow-hidden sm:h-[140px] md:h-[160px] z-index-2 sm:h-[260px] md:h-[255px]">
                        <div class="relative w-full h-[90%] z-2 md:h-[100%]">
                            <!-- Polygone 1 -->
                            <div class="absolute top-[7px] left-[5%] animate-float sm:top-[10px] sm:left-[6%]">
                                <img src="./assets/images/Phone - Quiz sélection/Déco haut gauche/P-1.png" alt="Polygone 1"
                                    class="sm:w-[120px] md:w-[155px] lg:hidden">
                            </div>
                            <!-- Polygone 2 -->
                            <div class="absolute top-[7px] left-[27%] animate-float2 md:left-[25%]">
                                <img src="./assets/images/Phone - Quiz sélection/Déco haut gauche/P-2.png" alt="Polygone 2"
                                    class="sm:w-[120px] md:w-[180px] lg:hidden">
                            </div>
                            <!-- Polygone 3 -->
                            <div class="absolute top-[7px] left-[55%] animate-float sm:left-[50%] ">
                                <img src="./assets/images/Phone - Quiz sélection/Déco haut droite/P-5.png" alt="Polygone 3"
                                    class="sm:w-[150px] md:w-[240px] lg:hidden">
                            </div>
                            <!-- Polygone 4 -->
                            <div class="absolute top-[7px] left-[92%] animate-float2 sm:left-[85%] md:left-[85%]">
                                <img src="./assets/images/Phone - Quiz sélection/Déco haut droite/P-3.png" alt="Polygone 4"
                                    class="sm:w-[60px] md:w-[90px] lg:hidden">
                            </div>
                            <!-- Polygone 5 -->
                            <div class="absolute top-[15%] left-[5%] animate-float2 sm:left-[7%] sm:top-[20%] md:top-[22%]">
                                <img src="./assets/images/Phone - Quiz sélection/Déco haut gauche/P-3.png" alt="Polygone 5"
                                    class="sm:w-[80px] md:w-[90px] lg:hidden">
                            </div>
                            <!-- Polygone 6 -->
                            <div class="absolute top-[25%] left-[18%] animate-float sm:top-[30%] md:top-[45%] left-[27%]">
                                <img src="./assets/images/Phone - Quiz sélection/Déco haut gauche/P-4.png" alt="Polygone 6"
                                    class="sm:w-[100px] md:w-[100px] lg:hidden">
                            </div>
                            <!-- Polygone 7 -->
                            <div
                                class="absolute top-[15%] left-[55%] animate-float2 sm:left-[57%] md:top-[28%] md:left-[60%]">
                                <img src="./assets/images/Phone - Quiz sélection/Déco haut droite/P-4.png" alt="Polygone 7"
                                    class="sm:w-[120px] md:w-[190px] lg:hidden">
                            </div>
                            <!-- Polygone 8 -->
                            <div class="absolute top-[27%] left-[35%] animate-float2 sm:top-[24%] left-[40%]">
                                <img src="./assets/images/Phone - Quiz sélection/Déco haut droite/P-6.png" alt="Polygone 8"
                                    class="md:w-[190px] lg:hidden">
                            </div>
                            <!-- Polygone 9 -->
                            <div
                                class="absolute top-[28%] left-[82%] animate-float sm:top-[32%] md:left-[80%] md:top-[45%]">
                                <img src="./assets/images/Phone - Quiz sélection/Déco haut droite/P-2.png" alt="Polygone 9"
                                    class="md:w-[100px] lg:hidden">
                            </div>
                            <!-- Polygone 10 -->
                            <div class="absolute top-[48%] left-[82%] animate-float2 sm:top-[50%] md:top-[70%]">
                                <img src="./assets/images/Phone - Quiz sélection/Déco haut droite/P-1.png" alt="Polygone 10"
                                    class="md:w-[120px] lg:hidden">
                            </div>
                            <!-- Polygone 11 -->
                            <div class="absolute top-[35%] left-[5%] animate-float2 sm:top-[50%] md:top-[42%]">
                                <img src="./assets/images/Phone - Quiz question/Décoration haut gauche/P-6.png" alt="Polygone 10"
                                    class="sm:w-[50px] z-2 lg:hidden">
                            </div>
                            <!-- Polygone 12 -->
                            <div
                                class="absolute top-[46%] left-[18%] animate-float sm:top-[60%] md:top-[43%] md:left-[20%] ">
                                <img src="./assets/images/Phone - Quiz question/Décoration haut gauche/P-5.png" alt="Polygone 10"
                                    class="sm:w-[60px] md:w-[50px] z-2 lg:hidden">
                            </div>

                            <section
                                class="absolute top-[150px] left-[25.4px] w-full sm:top-[85%] left-[0%] md:top-[70%] lg:hidden">

                                <div class="flex relative top-[-2rem] items-center h-[100px] w-full lg:hidden">
                                    <div class="w-[100px] h-[100px] flex justify-center align-middle sm:ml-6">
                                        <img src="./assets/images/Phone - Quiz question/Décoration haut gauche/Question.png"
                                            alt="Numéro question" class="lg:hidden">
                                        <h4
                                            class="absolute z-1 top-[50%] left-[2rem] text-light font-changa text-5xl sm:ml-6">
                                            1</h4>
                                        <h5
                                            class="absolute top-[8%] left-[4.5rem] text-light font-changa text-lg mt-3 sm:ml-6">
                                            /6
                                        </h5>

                                    </div>

                                    <h1
                                        class="flex justify-center w-[60%] font-changa text-primary text-2xl sm:text-[3.5rem] md:text-6xl lg:text-6xl">
                                        Jeux Vidéo
                                    </h1>

                                </div>

                            </section>

                        </div>
                    </div>
                </section>

                <!-- *****************************************************************************************************************
     *********************************************************************************************************************
     ***************************************************************************************************** VERSION ORDINATEUR -->

                <!-- HAUT A GAUCHE -->
                <section class="hidden lg:flex flex-row justify-between">
                    <section class="flex flex-col w-[220px] top-0 left-0">
                        <!-- Conteneur principal -->
                        <div class="relative h-[325px] w-full max-w-[210px] overflow-hidden top-0 left-0">
                            <div class="relative w-full h-[230px]">
                                <!-- Polygone 1 -->
                                <div class="absolute top-[5%] left-[5%] animate-float">
                                    <img src="./assets/images/Desktop - Quiz selection/Deco haut gauche/P-1.png" alt="Polygone 1"
                                        class="hidden lg:block">
                                </div>
                                <!-- Polygone 2 -->
                                <div class="absolute top-[5%] left-[50%] animate-float2">
                                    <img src="./assets/images/Desktop - Quiz selection/Deco haut gauche/P-2.png" alt="Polygone 2"
                                        class="hidden lg:block">
                                </div>
                                <!-- Polygone 3 -->
                                <div class="absolute top-[25%] left-[5%] animate-float2">
                                    <img src="./assets/images/Desktop - Quiz selection/Deco haut gauche/P-4.png" alt="Polygone 3"
                                        class="hidden lg:block">
                                </div>
                                <!-- Polygone 4 -->
                                <div class="absolute top-[45%] left-[43%] animate-float">
                                    <img src="./assets/images/Desktop - Quiz selection/Deco haut gauche/P-3.png" alt="Polygone 4"
                                        class="hidden lg:block">
                                </div>

                                <div class="absolute top-[65%] left-[5%]">
                                    <img src="./assets/images/Desktop - Quiz question/Décoration haut gauche/Question.png"
                                        alt="Polygone question" class="z-0 hidden lg:block">
                                    <h4
                                        class="hidden lg:block absolute z-1 top-[28%] left-[3rem] text-light font-changa text-[96px]">
                                        1</h4>
                                    <h5
                                        class="hidden lg:block absolute top-[20%] left-[8rem] text-light font-changa text-[32px] mt-3">
                                        /6
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- HAUT A DROITE -->
                    <section class="hidden lg:block flex-grow mr-[8rem]">
                        <h1 class="font-changa text-darkprimary text-[115px] mb-[1.5rem]">Jeux Vidéo</h1>
                        <div
                            class="absolute top-[-1rem] right-[-4rem] w-[100px] z-2 hidden lg:block lg:w-[250px] h-[250px]">
                            <img src="./assets/images/Desktop - Quiz question/Point interrogation.png"
                                alt="Point d'interrogation">
                        </div>

                        <?php foreach ($qcmsQuestions as $qcmQuestion) :
                            $qcmAnswers = $qcmQuestion->getAnswers();
                        ?>
                            <!-- Question -->
                            <div class="hidden lg:block bg-darkprimary text-light font-changa text-[1.8rem] rounded-lg p-6 w-[9 0%]">
                                <?= htmlspecialchars($qcmQuestion->getNameQuestion()) ?>
                            </div>



                            <div class="absolute h-[300px] w-[108px] top-0 right-0">
                                <div class="h-[100%]">
                                    <!-- Polygone 1 -->
                                    <div class="absolute top-[35%] left-[5%] animate-float">
                                        <img src="./assets/images/Desktop - Quiz question/Décoration haut droite/P-1.png"
                                            alt="Polygone 1">
                                    </div>
                                    <!-- Polygone 2 -->
                                    <div class="absolute top-[63%] left-[-1rem] animate-float">
                                        <img src="./assets/images/Desktop - Quiz question/Décoration haut droite/P-2.png"
                                            alt="Polygone 2">
                                    </div>
                                    <!-- Polygone 3 -->
                                    <div class="absolute top-[63%] left-[3rem] animate-float2">
                                        <img src="./assets/images/Desktop - Quiz question/Décoration haut droite/P-3.png"
                                            alt="Polygone 3">
                                    </div>
                                    <!-- Polygone 4 -->
                                    <div class="absolute top-[80%] left-[2rem] animate-float">
                                        <img src="./assets/images/Desktop - Quiz question/Décoration haut droite/P-4.png"
                                            alt="Polygone 4">
                                    </div>
                                    <!-- Polygone 5 -->
                                    <div class="absolute top-[90%] left-[-1rem] animate-float2">
                                        <img src="./assets/images/Desktop - Quiz question/Décoration haut droite/P-5.png"
                                            alt="Polygone 4">
                                    </div>
                                </div>
                            </div>

                    </section>
                </section>

        </header>


        <article>

            <!-- Réponses -->
            <div class="flex flex-wrap mx-3 gap-5 mb-5">
                <?php foreach ($qcmAnswers as $index => $qcmAnswer) : ?>
                    <label class="bg-primary text-light font-chara rounded-lg p-6 lg:w-[calc(50%-10px)] text-[1.5rem]">
                        <input type="hidden" name="isRight[<?= $qcmAnswer->getId() ?>]" value="<?= $qcmAnswer->getIsRight() ?>">
                        <input type="checkbox" name="answers[<?= $qcmAnswer->getIdQuestion() ?>]" value="<?= $qcmAnswer->getId() ?>" />
                        <?= htmlspecialchars($qcmAnswer->getNameAnswer()) ?>
                    </label>

                    <!-- Forcer le retour à la ligne après chaque 2 réponses -->
                    <?php if (($index + 1) % 2 == 0) : ?>
                        <div class="w-full"></div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
        </article>


        <button type="submit" class="btn-custom2 bg-[#541A25]:hover btn-custom2:focus transition-transform hover:scale-105">Valider</button>

        </form>


























<?php

        return ob_get_clean();
    }

    // Méthode principale pour générer les questions d'un QCM
    public function generateQuestions(int $idQuiz)
    {
        // Logique de déroulement du quiz
        return  $this->displayQuestion($this->buildQcm($idQuiz));
    }
}
