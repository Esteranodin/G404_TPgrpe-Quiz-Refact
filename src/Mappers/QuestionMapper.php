<?php

class QuestionMapper
{
    // Méthode statique pour mapper un tableau de données en objet Question
    public static function mapToObject(array $datasQuestion): Question
    {
        return new Question(  
            $datasQuestion["id"],
            $datasQuestion["content"],
            $datasQuestion["id_quiz"]
        );
    }
}