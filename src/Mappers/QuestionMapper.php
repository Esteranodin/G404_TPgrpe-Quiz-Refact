<?php

class QuestionMapper
{
    public static function mapToObject(array $datas): Question
    {
        // Vérification et gestion des clés
        if (!isset($datas['id']) || !isset($datas['content']) || !isset($datas['id_quiz'])) {
            throw new Exception("Données manquantes pour mapper la question: " . json_encode($datas));
        }
        return new Question(
            $datas['id'],
            $datas['content'],
            $datas['id_quiz'] // Assurez-vous d'utiliser la bonne clé
        );
    }
}


