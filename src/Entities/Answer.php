<?php

class Answer
{

    // propriétés
    

    private int $id;
    private string $answerName;
    private int $idQuestion;
    private bool $isRight;


    // Méthodes magiques

    public function __construct(int $id, string $answerName,int $idQuestion, bool $isRight = false)
    {
        $this->id = $id;
        $this->answerName = $answerName;
        $this->idQuestion = $idQuestion;
        $this->isRight = $isRight;
    }

    
    // geter-seter

  public function getNameAnswer (): string
  {
    return $this->answerName;
    
  }
  
  public function getisRight (): bool
  {
    return $this->isRight;
    
  }


  public function getIdQuestion (): int
  {
    return $this->idQuestion;
    
  }

  public function getId (): int
  {
    return $this->id;
    
  }

    // Méthodes

}
