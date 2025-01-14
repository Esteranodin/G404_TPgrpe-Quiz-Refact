<?php

final class AnswerRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAllByQuestion(int $idQuestion): ?array
    {

        $sqlAnswers = "SELECT id, content, id_question, is_right FROM answer WHERE id_question = :id_question";
        $stmt = $this->db->prepare($sqlAnswers);
        $stmt->bindParam(':id_question', $idQuestion, PDO::PARAM_INT);
        $stmt->execute();
        $answersDatas = $stmt->fetchAll(PDO::FETCH_ASSOC);


        if ($answersDatas) {
            $answers = [];
            foreach ($answersDatas as $answersData) {
                $answers[] = QuestionMapper::mapToObject($answersData);
            }
            return $answers;
        }
        return null;
    }

}