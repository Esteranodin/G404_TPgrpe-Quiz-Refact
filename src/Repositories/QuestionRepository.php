<?php

class QuestionRepository extends AbstractRepository
{
    // Constructeur de la classe, appelle le constructeur de la classe parente
    public function __construct()
    {
        parent::__construct();
    }

    // Méthode pour trouver toutes les questions associées à un quiz spécifique
    public function findAllByQcm(int $idQuiz): ?array
    {
        // Prépare et exécute une requête SQL pour récupérer les questions du quiz
        $sqlQuestions = "SELECT id, content , id_quiz FROM question WHERE id_quiz = :idQuiz";
        $stmt = $this->db->prepare($sqlQuestions);
        $stmt->bindParam(':idQuiz', $idQuiz, PDO::PARAM_INT);
        $stmt->execute();
        $questionsDatas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Si des questions sont trouvées, les mapper en objets Question
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
