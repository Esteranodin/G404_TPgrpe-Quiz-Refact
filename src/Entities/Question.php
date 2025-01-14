<?php

class Question
{
    // propriétés
    private int $id_question;
    private string $questionName;
    private int $id_quiz;
    private array $answers;
    private string $explanationAnswer;


    // Méthodes magiques

    public function __construct(int $id_question, string $questionName, int $id_quiz)
    {
        $this->id_question = $id_question;
        $this->questionName = $questionName;
        $this->id_quiz = $id_quiz;
    }

    // geter-seter
    public function getIdQuestion(): int
    {
        return $this->id_question;
    }


    public function getNameQuestion(): string
    {
        return $this->questionName;
    }

    public function getIdQuiz(): int
    {
        return $this->id_quiz;
    }

    public function getAnswers(): array
    {
        return $this->answers;
    }

    public function getExplanationAnswer(): string
    {
        return "La réponse correcte est : {$this->explanationAnswer}";
    }

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

    public function setExplanationAnswer(string $explanationAnswer): self
    {
        $this->explanationAnswer = $explanationAnswer;
        return $this;
    }

    // Méthodes

}
