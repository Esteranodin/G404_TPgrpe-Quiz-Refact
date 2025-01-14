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

    // Méthode privée pour construire le QCM
    private function buildQcm(int $idQuiz): Qcm
    {
        // Récupérer le QCM depuis la base de données
        $qcm = $this->qcmRepository->find($idQuiz);

        if ($qcm) {
            // Ajouter les questions liées au QCM
            $questions = $this->questionRepository->findAllByQcm($qcm->getId());
            $qcm->setQuestions($questions);
        }

        // Ajouter les réponses pour chaque question
        foreach ($qcm->getQuestions() as $question) {
            $answers = $this->answerRepository->findAllByQuestion($question->getIdQuestion());
            $question->setAnswers($answers);
        }

        return $qcm;
    }

    // Méthode publique pour générer et afficher les questions et réponses du QCM
    public function generateQuestions(int $idQuiz)
    {
        // Construire le QCM en appelant la méthode privée
        $qcm = $this->buildQcm($idQuiz);

        // Appeler la méthode pour afficher les questions et réponses
        return $this->displayQuestions($qcm);
    }

    // Méthode privée pour afficher les questions et réponses
    private function displayQuestions(Qcm $qcm): string
    {
        ob_start(); // Démarrer la capture de la sortie HTML

        // Parcourir chaque question et l'afficher
        foreach ($qcm->getQuestions() as $question) {
            echo '<section>';
            echo '<h2>' . $question->getNameQuestion() . '</h2>'; // Afficher le nom de la question

            // Afficher les réponses pour chaque question
            echo '<ul>';
            foreach ($question->getAnswers() as $answer) {
                echo '<li>' . $answer->getNameAnswer() . '</li>'; // Afficher le nom de la réponse
            }
            echo '</ul>';
            echo '</section>';
        }

        return ob_get_clean(); // Retourner la sortie capturée
    }
}
