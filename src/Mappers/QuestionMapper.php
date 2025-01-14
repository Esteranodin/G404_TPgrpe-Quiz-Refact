<?php

class QuestionMapper
{
    public static function mapToObject(array $datas): Question
    {
        return new Question(  
            $datas["id"],
            $datas["content"],
            $datas["id_quiz"]
          
        );
    }
}