<?php

class QuestionRepository extends AbstractRepository
{

    // Methode magique
    public function __construct()
    {
        parent::__construct();
    }

    //Methode
    public function findAllByQcm(int $idQuiz): ?array
    {

        $sqlQuestions = "SELECT id, content , id_quiz FROM question WHERE id_quiz = :id_quiz";
        $stmt = $this->db->prepare($sqlQuestions);
        $stmt->bindParam(':id_quiz', $idQuiz, PDO::PARAM_INT);
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
