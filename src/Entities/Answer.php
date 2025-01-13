<?php

class Answer
{

    // propriétés
    
    private string $answer;
    private bool $answerGood;

    // Méthodes magiques

    public function __construct(string $answer, bool $answerGood = false)
    {
        $this->answer = $answer;
        $this->answerGood = $answerGood;
    }

    
    // geter-seter

  public function getNameAnswer (): string
  {
    return $this->answer;
    
  }
  
  public function getAnswerGood (): bool
  {
    return $this->answerGood;
    
  }

    // Méthodes

}
