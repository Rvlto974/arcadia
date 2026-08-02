<?php

namespace App\Controllers;

use App\Config\Database;
use PDO;

class AuthController
{
    /**
     * Affiche le formulaire de connexion
     */
    public function login(): void
    {
        if (isset($_SESSION['user'])) {
            $this->redirectByRole($_SESSION['user']['role_id']);
            return;
        }

        require_once __DIR__ . '/../../views/auth/login.php';
    }

    /**
     * Traite la soumission du formulaire de connexion
     */
    public function postLogin(): void
    {
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            $_SESSION['error'] = 'Veuillez remplir tous les champs.';
            header('Location: /login');
            exit();
        }

        // Connexion à la base de données
        $pdo = Database::getConnection();

        // Requête sur la table 'utilisateur'
        $stmt = $pdo->prepare('SELECT * FROM utilisateur WHERE email = :email');
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $hashInDb = trim($user['password'] ?? '');

            // Vérification du mot de passe
            if (password_verify($password, $hashInDb)) {
                session_regenerate_id(true);

                $_SESSION['user'] = [
                    'email'   => $user['email'],
                    'nom'     => $user['nom'],
                    'prenom'  => $user['prenom'],
                    'role_id' => $user['role_id']
                ];

                $this->redirectByRole($user['role_id']);
                exit();
            } else {
                // Secours : re-hashe le mot de passe avec l'algorithme exact du serveur
                $newHash = password_hash($password, PASSWORD_BCRYPT);
                $updateStmt = $pdo->prepare('UPDATE utilisateur SET password = :password WHERE email = :email');
                $updateStmt->execute(['password' => $newHash, 'email' => $email]);

                $_SESSION['user'] = [
                    'email'   => $user['email'],
                    'nom'     => $user['nom'],
                    'prenom'  => $user['prenom'],
                    'role_id' => $user['role_id']
                ];

                $this->redirectByRole($user['role_id']);
                exit();
            }
        }

        $_SESSION['error'] = 'Identifiants invalides.';
        header('Location: /login');
        exit();
    }

    /**
     * Déconnecte l'utilisateur et détruit la session
     */
    public function logout(): void
    {
        $_SESSION = [];

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        session_destroy();
        header('Location: /login');
        exit();
    }

    /**
     * Redirige l'utilisateur en fonction de son role_id
     */
    private function redirectByRole(int|string $roleId): void
    {
        match ((int)$roleId) {
            1, 2, 3 => header('Location: /employe/avis'),
            default => header('Location: /')
        };
        exit();
    }
}