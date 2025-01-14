<?php

class QuestionMapper
{
    // Méthode statique pour mapper un tableau de données en objet Question
    public static function mapToObject(array $datas): Question
    {
        return new Question(  
            $datas["id"],
            $datas["content"],
            $datas["id_quiz"]
        );
    }
}