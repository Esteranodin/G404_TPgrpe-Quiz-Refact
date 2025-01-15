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
      









        <form action="./resultQuiz.php" method="post">

<article class="m-4">
<?php foreach ($qcmsQuestions as $qcmQuestion) :
            $qcmAnswers = $qcmQuestion->getAnswers();

            ?>
        <div class="bg-[#541A25] text-light font-chara rounded-lg p-6 mb-5 lg:w-[60%] ml-[25%]">
        <?= $qcmQuestion->getNameQuestion() ?>

        </div>


        <!-- LES REPONSES -->
        <div class="flex flex-col mx-3 gap-5 mb-5">
            <?php
            
             foreach ($qcmAnswers as $qcmAnswer) : 
               

                ?>
                <label class="bg-[#6E433C] text-light font-chara rounded-lg p-6">
                    <input type="hidden" name="isRight[<?= $qcmAnswer->getId() ?>]" value="<?= $qcmAnswer->getisRight() ?>">
                    <input type="checkbox" name="answers[<?= $qcmAnswer->getIdQuestion() ?>]" value="<?= $qcmAnswer->getId() ?> " />
                    <?= $qcmAnswer->getNameAnswer() ?>
                </label><br>
            <?php
            endforeach
            ?>
        </div>

</article>

<?php
    endforeach
?>
<button type="submit" class="btn-custom2 btn-custom2:hover btn-custom2:focus">
Valider
</button>
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


?>