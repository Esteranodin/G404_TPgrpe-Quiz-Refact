<?php

class Question {

    // propriétés
    private string $question;
    private array $answers;
 

    // Méthodes magiques

    public function __construct()
    {
        // $this->question;
        $this->answers = [];
    }
  
    // geter-seter

    public function getAnswers(): array
    {
        return $this->answers;
    }
    
    // Méthodes
    
}

?>