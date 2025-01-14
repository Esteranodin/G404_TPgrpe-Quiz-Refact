<?php 


class AnswerMapper
{
    public static function mapToObject(array $datas): Answer
    {
        return new Answer(
            $datas['id'],             // ID de la réponse
            $datas['content'],        // Contenu de la réponse
            $datas['id_question'],    // ID de la question associée
            (bool) $datas['is_right'] // Indique si la réponse est correcte (0 ou 1 dans la DB)
        );
    }
}


