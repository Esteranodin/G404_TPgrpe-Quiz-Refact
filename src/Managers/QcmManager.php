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
        ob_start();

?>
        <section>
            <h1>

            Test
               
           
            </h1>


            <h2>

            <?php  var_dump($qcm->getQuestions()[0]->getAnswers()[2])  ?>
          
            </h2>



        </section>
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