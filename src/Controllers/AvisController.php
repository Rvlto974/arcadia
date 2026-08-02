<?php

namespace App\Controllers;

use App\Models\Avis;

class AvisController
{
    private $avisModel;

    public function __construct()
    {
        $this->avisModel = new Avis();
    }

    /**
     * Affiche la liste des avis validés et le formulaire de dépôt
     */
    public function index()
    {
        $avisValides = $this->avisModel->getValides();
        require_once __DIR__ . '/../../views/avis/index.php';
    }

    /**
     * Traite la soumission d'un nouvel avis (is_visible sera à 0 par défaut)
     */
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pseudo = trim($_POST['pseudo'] ?? '');
            $commentaire = trim($_POST['commentaire'] ?? '');

            if (!empty($pseudo) && !empty($commentaire)) {
                $this->avisModel->creer($pseudo, $commentaire);
                header('Location: /avis?success=1');
                exit;
            }
        }

        header('Location: /avis?error=1');
        exit;
    }
}