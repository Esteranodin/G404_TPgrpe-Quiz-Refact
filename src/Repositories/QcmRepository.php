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
        $stmt = $this->db->prepare("SELECT * FROM quiz WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $qcmData = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($qcmData) {
            return QcmMapper::mapToObject($qcmData); // Utiliser le mapper pour créer l'objet Qcm
        }
        return null;
    }
    
}
