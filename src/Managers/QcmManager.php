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

    public function generateQuestions(int $idQuiz)
    {
        



        $this->displayQuestion($this->buildQcm($idQuiz));
    }

    private function buildQcm(int $idQuiz): Qcm
    {
        $qcm = $this->qcmRepository->find($idQuiz);

        if ($qcm) {
            $questions = $this->questionRepository->findAllByQcm($qcm->getId());
            $qcm->setQuestions($questions);
        }

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
                Test
            </h1>


            <h2>






            </h2>



        </section>
<?php

        return ob_get_clean();
    }
}

?>