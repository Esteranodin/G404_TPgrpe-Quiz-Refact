<?php

class Question
{

    // propriétés
    private string $question;
    private array $answers;
    private string $explanation;


    // Méthodes magiques

    public function __construct(string $question)
    {
        $this->question = $question;
        $this->answers = [];
    }

    // geter-seter

    public function getNameQuestion(): string
    {
        return $this->question;
    }

    public function getAnswers(): array
    {
        return $this->answers;
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

    public function setExplanation(string $explanation): self
    {
        $this->explanation = $explanation;
         return $this ;

    }

    public function getExplanation() : string 
    {
        return "La réponse correcte est : {$this->explanation}";
    }

    // Méthodes

}
