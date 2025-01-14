<?php

final class Qcm
{
    // propriétés

    private string $name;
    private array $questions;


    // Méthodes magiques

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    // geter-seter

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

    // public function addNameQcm(string $name): self
    // {

    //     $this->name = $name;
    //     return $this;
    // }

}
