<?php

class QcmMapper
{
    // Méthode statique pour mapper un tableau de données en objet Qcm
    public static function mapToObject(array $datasQcm): Qcm
    {
        return new Qcm(  
            $datasQcm["id"],
            $datasQcm["name"]
        );
    }
}