<?php

final class QcmManager
{
    private QcmRepository $qcmRepository;
    private QuestionRepository $questionRepository;
    private AnswerRepository $answerRepository;

    public function __construct()
    {
        $this->qcmRepository = new QcmRepository();
        $this->questionRepository = new QuestionRepository();
        $this->answerRepository = new AnswerRepository();
    }



    private function buildQcm(int $idQuiz): Qcm
    {


        // Ici on récupère juste le thème du quiz à la position $idQuiz
        $qcm = $this->qcmRepository->find($idQuiz);


        // Ici on récupère les questions liées a ce thème 
        if ($qcm) {
            $questions = $this->questionRepository->findAllByQcm($qcm->getId());
            $qcm->setQuestions($questions);
        }
       

        // Ici on récupère les réponses d'une question
        foreach ($qcm->getQuestions() as $question) {
            $answers = $this->answerRepository->findAllByQuestion($question->getId());
            $question->setAnswers($answers);
        }

        return $qcm;
    }


    private function displayQuestion(Qcm $qcm): string
    {
        ob_start();

?>
        <section>
            <h1>
            <?= $qcm->getNameQuestion() ?>
            </h1>


            <h2>


            <?= $answers->getNameAnswer() ?>



            </h2>



        </section>
<?php

        return ob_get_clean();
    }






    // Hub 


    public function generateQuestions(int $idQuiz)
    {
        
// Logique déroulement quiz


        $this->displayQuestion($this->buildQcm($idQuiz));
    }
}









?>