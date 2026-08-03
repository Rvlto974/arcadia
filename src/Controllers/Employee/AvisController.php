<?php

namespace App\Controllers\Employee;

use App\Database;

class AvisController
{
    public function index()
    {
        // Connexion à la base de données
        $db = Database::getInstance()->getConnection();

        // Récupération des avis (vérifie si ta colonne s'appelle 'statut' ou 'status')
        $stmt = $db->prepare("SELECT * FROM avis WHERE statut = 'en_attente' ORDER BY created_at DESC");
        $stmt->execute();
        $avisList = $stmt->fetchAll();

        // Inclusion de la vue correspondante
    require_once __DIR__ . '/../../../Views/employee/avis.php';
    }

    public function valider($id)
    {
        $db = Database::getInstance()->getConnection();
        
        $stmt = $db->prepare("UPDATE avis SET statut = 'valide' WHERE id = ?");
        $stmt->execute([$id]);

        header('Location: /employe/avis');
        exit;
    }

    public function refuser($id)
    {
        $db = Database::getInstance()->getConnection();
        
        $stmt = $db->prepare("UPDATE avis SET statut = 'refuse' WHERE id = ?");
        $stmt->execute([$id]);

        header('Location: /employe/avis');
        exit;
    }
}