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

// Controllers/AvisController.php

class AvisController {

    public function create() {
        // Indiquer au navigateur qu'on renvoie du JSON
        header('Content-Type: application/json');

        // Récupérer les données JSON envoyées par fetch()
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        // Validation simple
        if (empty($data['nom']) || empty($data['note']) || empty($data['commentaire'])) {
            http_response_code(400); // Bad Request
            echo json_encode(['erreur' => 'Tous les champs sont obligatoires.']);
            exit;
        }

        // Appel au modèle pour insérer en BDD
        $avisModel = new Avis(); // Ton fichier dans Models/
        $succes = $avisModel->creerAvis([
            'pseudo' => htmlspecialchars($data['nom']),
            'note' => (int)$data['note'],
            'commentaire' => htmlspecialchars($data['commentaire']),
            'statut' => 'EN_ATTENTE' // Par défaut
        ]);

        if ($succes) {
            http_response_code(201); // Created
            echo json_encode(['message' => 'Avis envoyé avec succès ! Il sera relu par un employé.']);
        } else {
            http_response_code(500); // Server Error
            echo json_encode(['erreur' => 'Erreur lors de l enregistrement dans la base de données.']);
        }
        exit;
    }
}