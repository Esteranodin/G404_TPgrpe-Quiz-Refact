<?php

class QcmMapper
{
    // Méthode statique pour mapper un tableau de données en objet Qcm
    public static function mapToObject(array $datas): Qcm
    {
        return new Qcm(  
            $datas["id"],
            $datas["name"]
        );
    }
}