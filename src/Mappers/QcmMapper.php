<?php

class QcmMapper
{
    public static function mapToObject(array $datas): Qcm
    {
        return new Qcm(  
            $datas["id"],
            $datas["name"]
          

        );
    }
}