<?php

class QcmRepository
{
    private PDO $db;

    // Methode magique
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    //Methode
    public function findAll(): ?array
    {
        $stmt = $this->db->query("SELECT * FROM quiz");
        $qcmDatas = $stmt->fetchAll(PDO::FETCH_ASSOC);


        if ($qcmDatas) {
            $qcms = [];
            foreach ($qcmDatas as $qcmData) {
                $qcms[] = QcmMapper::mapToObject($qcmData);
            }
            return $qcms;
        }
        return null;
    }
}
