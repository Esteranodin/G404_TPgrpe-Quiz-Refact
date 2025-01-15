<?php

class AnswerMapper
{
    // Méthode statique pour mapper un tableau de données en objet Question
    public static function mapToObject(array $datasAnswer): Answer
    {
        return new Answer(  
            $datasAnswer["id"],
            $datasAnswer["content"],
            $datasAnswer["id_question"],
            $datasAnswer["is_right"]
        );
    }
}