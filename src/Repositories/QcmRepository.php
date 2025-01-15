<?php

final class QcmRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    // Méthode pour trouver tous les QCMs
    public function findAll(): ?array
    {
        // Exécute une requête SQL pour récupérer tous les QCMs
        $query = "SELECT * FROM quiz";
        $stmt = $this->db->query($query);
        $qcmDatas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Si des QCMs sont trouvés, les mapper en objets Qcm
        if ($qcmDatas) {
            $qcms = [];
            foreach ($qcmDatas as $qcmData) {
                $qcms[] = QcmMapper::mapToObject($qcmData);
            }
            return $qcms;
        }
        return null;
    }

    // Méthode pour trouver un QCM spécifique par son ID


    public function find(int $qcmId): Qcm
    {

        // Prépare et exécute une requête SQL pour récupérer le QCM par ID
        $query = "SELECT * FROM quiz WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $qcmId]);
        $qcmDatas = $stmt->fetch(PDO::FETCH_ASSOC);

        return QcmMapper::mapToObject($qcmDatas);
    }


}
