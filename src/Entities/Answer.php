<?php

class Answer
{

    // propriétés
    
    private string $answerName;
    private bool $answerGood;

    // Méthodes magiques

    public function __construct(string $answerName, bool $answerGood = false)
    {
        $this->answerName = $answerName;
        $this->answerGood = $answerGood;
    }

    
    // geter-seter

  public function getNameAnswer (): string
  {
    return $this->answerName;
    
  }
  
  public function getAnswerGood (): bool
  {
    return $this->answerGood;
    
  }

    // Méthodes

}
