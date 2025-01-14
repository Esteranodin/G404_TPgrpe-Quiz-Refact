<?php

class Question
{
    // propriétés
    private string $questionName;
    private array $answers;
    private string $explanationAnswer;


    // Méthodes magiques

    public function __construct(string $questionName)
    {
        $this->questionName = $questionName;
    }

    // geter-seter

    public function getNameQuestion(): string
    {
        return $this->questionName;
    }

    public function getAnswers(): array
    {
        return $this->answers;
    }

    public function getExplanationAnswer() : string 
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
         return $this ;

    }

    // Méthodes

}
