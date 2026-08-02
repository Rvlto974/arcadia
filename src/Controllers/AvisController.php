<?php

namespace App\Controllers;

use App\Models\Avis;

class AvisController
{
    /**
     * Affiche la page des avis (liste des avis validés + formulaire)
     */
    public function index(): void
    {
        // Récupérer uniquement les avis validés par un employé
        $avisModel = new Avis();
        $avisValides = $avisModel->getValides();

        // Charger la vue en lui passant les données
        require_once __DIR__ . '/../../views/avis/index.php';
    }

    /**
     * Traite la soumission du formulaire d'avis (POST)
     */
    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // 1. Assainissement et récupération des données
            $pseudo = trim(filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS));
            $commentaire = trim(filter_input(INPUT_POST, 'commentaire', FILTER_SANITIZE_SPECIAL_CHARS));

            // 2. Validation de base
            if (!empty($pseudo) && !empty($commentaire)) {
                $avisModel = new Avis();
                // Par défaut, l'avis est créé avec is_visible = false (en attente de modération)
                $avisModel->create($pseudo, $commentaire);

                // Redirection avec un paramètre de succès pour informer l'utilisateur
                header('Location: /avis?success=1');
                exit();
            } else {
                // Redirection avec un paramètre d'erreur si champs vides
                header('Location: /avis?error=1');
                exit();
            }
        }

        // Si accès en GET direct sur /avis/creer, rediriger vers la page principale
        header('Location: /avis');
        exit();
    }
}