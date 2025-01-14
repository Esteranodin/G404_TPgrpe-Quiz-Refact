<?php

class QuestionRepository
{
    private PDO $db;

    // Methode magique
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    //Methode
    public function findAllQuestions(): ?array
    {
        $sql_questions = "SELECT id, content FROM question WHERE id_quiz = :id_quiz";
        $stmt = $this->db->prepare($sql_questions);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $questionsDatas = $stmt->fetchAll(PDO::FETCH_ASSOC);


        if ($questionsDatas) {
            $questions = [];
            foreach ($questionsDatas as $questionsData) {
                $questions[] = QuestionMapper::mapToObject($questionsData);
            }
            return $questions;
        }
        return null;
    }
}
