<?php

class Question
{
    // propriétés
    private int $idQuestion;
    private string $questionName;
    private int $idQuiz;
    private array $answers;
    // private string $explanationAnswer;


    // Méthodes magiques

    public function __construct(int $idQuestion, string $questionName, int $idQuiz)
    {
        $this->idQuestion = $idQuestion;
        $this->questionName = $questionName;
        $this->idQuiz = $idQuiz;
    }

    // geter-seter
    public function getIdQuestion(): int
    {
        return $this->idQuestion;
    }


    public function getNameQuestion(): string
    {
        return $this->questionName;
    }

    public function getIdQuiz(): int
    {
        return $this->idQuiz;
    }

    public function getAnswers(): array
    {
        return $this->answers;
    }

    // public function getExplanationAnswer(): string
    // {
    //     return "La réponse correcte est : {$this->explanationAnswer}";
    // }

    public function setAnswers(array $answers): self
    {

        foreach ($answers as $answer) {
            if (!$answer instanceof Answer) {
                throw new Exception("Il faut que le tableau ne soit composé uniquement de réponses");
            }
        }

        $this->answers = $answers;
        return $this;
    }

    // public function setExplanationAnswer(string $explanationAnswer): self
    // {
    //     $this->explanationAnswer = $explanationAnswer;
    //     return $this;
    // }

    // Méthodes

}
