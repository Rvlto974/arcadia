<?php

namespace App\Controllers\Employee;

use App\Models\Avis;

class AvisController
{
    private $avisModel;

    public function __construct()
    {
        $this->avisModel = new Avis();
    }

    /**
     * Affiche la liste des avis en attente de modération (is_visible = 0)
     */
    public function index()
    {
        $avisEnAttente = $this->avisModel->getEnAttente();
        require_once __DIR__ . '/../../../views/employee/avis.php';
    }

    /**
     * Valide un avis (is_visible = 1)
     */
    public function valider()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            if ($id) {
                $this->avisModel->valider($id);
            }
        }
        header('Location: /employe/avis');
        exit;
    }

    /**
     * Supprime/Refuse un avis
     */
    public function refuser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            if ($id) {
                $this->avisModel->supprimer($id);
            }
        }
        header('Location: /employe/avis');
        exit;
    }
}