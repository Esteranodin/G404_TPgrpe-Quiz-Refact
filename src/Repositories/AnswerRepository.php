<?php

final class AnswerRepository extends AbstractRepository
{
    // Constructeur de la classe, appelle le constructeur de la classe parente
    public function __construct()
    {
        parent::__construct();
    }

    // Méthode pour trouver toutes les réponses associées à une question spécifique
    public function findAllByQuestion(int $idQuestion): ?array
    {
        // Prépare et exécute une requête SQL pour récupérer les réponses de la question
        $sqlAnswers = "SELECT id, content, id_question, is_right FROM answer WHERE id_question = :id_question";
        $stmt = $this->db->prepare($sqlAnswers);
        $stmt->bindParam(':id_question', $idQuestion, PDO::PARAM_INT);
        $stmt->execute();
        $answersDatas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Si des réponses sont trouvées, les mapper en objets Answer
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