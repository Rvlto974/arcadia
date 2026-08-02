<?php

namespace App\Controllers\Employee;

use App\Database; // Import de votre classe Database Singleton

class AvisController
{
    /**
     * Affiche la liste des avis pour l'employé
     */
    public function index(): void
    {
        // 1. Sécurisation : Vérifier si l'utilisateur est connecté
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit();
        }

        try {
            // 2. Récupération de l'instance de la base de données (Singleton)
            $db = Database::getInstance();
            $pdo = $db->getConnection(); // Assurez-vous que cette méthode retourne l'objet PDO

            // 3. Requête pour récupérer les avis (adaptez le nom de la table selon votre BDD)
            $stmt = $pdo->query("SELECT * FROM avis ORDER BY created_at DESC");
            $avisList = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        } catch (\Exception $e) {
            $avisList = [];
            $error = "Erreur lors de la récupération des avis : " . $e->getMessage();
        }

        // 4. Affichage temporaire (en attendant de créer des fichiers de vues séparés)
        echo "<h1>Espace Employé - Gestion des avis</h1>";
        
        if (isset($error)) {
            echo "<p style='color: red;'>$error</p>";
        }

        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>ID</th><th>Auteur</th><th>Commentaire</th><th>Note</th><th>Statut</th></tr>";
        
        if (!empty($avisList)) {
            foreach ($avisList as $avis) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($avis['id'] ?? '') . "</td>";
                echo "<td>" . htmlspecialchars($avis['auteur'] ?? 'Anonyme') . "</td>";
                echo "<td>" . htmlspecialchars($avis['commentaire'] ?? '') . "</td>";
                echo "<td>" . htmlspecialchars($avis['note'] ?? '') . "/5</td>";
                echo "<td>" . htmlspecialchars($avis['statut'] ?? 'En attente') . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Aucun avis trouvé.</td></tr>";
        }
        echo "</table>";
    }
}

<?php

namespace App\Controllers\Employee;

use App\Database;

class AvisController
{
    /**
     * Affiche la liste des avis en attente de modération
     */
    public function index(): void
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit();
        }

        $avisEnAttente = [];
        $error = null;

        try {
            $db = Database::getInstance();
            $pdo = $db->getConnection();

            // Récupère uniquement les avis en attente (ajustez selon votre structure, ex: statut = 'en_attente')
            $stmt = $pdo->query("SELECT * FROM avis WHERE statut = 'en_attente' ORDER BY id DESC");
            $avisEnAttente = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        } catch (\Exception $e) {
            $error = "Erreur lors de la récupération des avis : " . $e->getMessage();
        }

        require_once __DIR__ . '/../../Views/employee/avis.php';
    }

    /**
     * Valide un avis (change son statut ou l'affiche publiquement)
     */
    public function valider(): void
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $id = (int) $_POST['id'];

            try {
                $db = Database::getInstance();
                $pdo = $db->getConnection();

                // Exemple : passage du statut à 'valide'
                $stmt = $pdo->prepare("UPDATE avis SET statut = 'valide' WHERE id = ?");
                $stmt->execute([$id]);
            } catch (\Exception $e) {
                // Gérer l'erreur si besoin
            }
        }

        header('Location: /employe/avis');
        exit();
    }

    /**
     * Refuse / Supprime un avis
     */
    public function refuser(): void
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $id = (int) $_POST['id'];

            try {
                $db = Database::getInstance();
                $pdo = $db->getConnection();

                // Suppression de l'avis refusé
                $stmt = $pdo->prepare("DELETE FROM avis WHERE id = ?");
                $stmt->execute([$id]);
            } catch (\Exception $e) {
                // Gérer l'erreur si besoin
            }
        }

        header('Location: /employe/avis');
        exit();
    }
}