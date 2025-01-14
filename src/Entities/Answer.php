<?php 

class Answer
{
    // Propriétés
    private int $id;          // Ajoutez un ID pour la réponse
    private string $answerName; // Nom de la réponse (correspond à content dans la DB)
    private int $id_question;   // L'ID de la question associée
    private bool $answerGood;   // Le fait que la réponse soit correcte ou non (is_right dans la DB)

    // Méthodes magiques
    public function __construct(int $id, string $answerName, int $id_question, bool $answerGood)
    {
        $this->id = $id;
        $this->answerName = $answerName;
        $this->id_question = $id_question;
        $this->answerGood = $answerGood;
    }

    // Getters et Setters

    public function getId(): int
    {
        return $this->id;
    }

    public function getNameAnswer(): string
    {
        return $this->answerName;
    }

    public function getIdQuestion(): int
    {
        return $this->id_question;
    }

    public function getAnswerGood(): bool
    {
        return $this->answerGood;
    }
}
