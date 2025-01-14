<?php

class QcmRepository extends AbstractRepository
{
    
    public function __construct()
    {
        parent::__construct();
    }

    //Methode
    public function findAll(): ?array
    {
        $stmt = $this->db->query("SELECT * FROM quiz");
        $qcmDatas = $stmt->fetchAll(PDO::FETCH_ASSOC);


        if ($qcmDatas) {
            $qcms = [];
            foreach ($qcmDatas as $qcmData) {
                $qcms[] = QcmMapper ::mapToObject($qcmData);
            }
            return $qcms;
        }
        return null;
    }

    public function find(int $id): ?Qcm
    {
        
    }
}
