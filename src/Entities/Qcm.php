<?php

final class Qcm
{
    // propriétés

    private int $id;
    private string $name;
    private array $questions;


    // Méthodes magiques

    public function __construct( int $id, string $name )
    {
        $this->id = $id;
        $this->name = $name;
    }

    // geter-seter
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getQuestions(): array
    {
        return $this->questions;
    }

    public function setQuestions(array $questions): self
    {

        foreach ($questions as $question) {
            if (!$question instanceof Question) {
                throw new Exception("Il faut que le tableau ne soit composé uniquement de questions");
            }
        }

        $this->questions = $questions;
        return $this;
    }

    // Méthodes

    

}
