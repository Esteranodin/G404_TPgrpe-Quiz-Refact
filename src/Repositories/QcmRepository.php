<?php

class QcmRepository extends AbstractRepository 
{
    // Constructeur de la classe, appelle le constructeur de la classe parente
    public function __construct()
    {
        parent::__construct();
    }

    // Méthode pour trouver tous les QCMs
    public function findAll(): ?array
    {
        // Exécute une requête SQL pour récupérer tous les QCMs
        $stmt = $this->db->query("SELECT * FROM quiz");
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
    public function find(int $id): ?Qcm
    {
        // Prépare et exécute une requête SQL pour récupérer le QCM par ID
        $stmt = $this->db->prepare("SELECT id FROM quiz WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $idQcm = $stmt->fetch(PDO::FETCH_ASSOC);

        return $idQcm;
    }
}
