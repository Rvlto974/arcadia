-- Création de la base de données
CREATE DATABASE IF NOT EXISTS arcadia_zoo CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE arcadia_zoo;

-- 1. Table Rôle
CREATE TABLE IF NOT EXISTS role (
    id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 2. Table Utilisateur
CREATE TABLE IF NOT EXISTS utilisateur (
    email VARCHAR(255) PRIMARY KEY,
    password VARCHAR(255) NOT NULL,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    role_id INT NOT NULL,
    FOREIGN KEY (role_id) REFERENCES role(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3. Table Habitat
CREATE TABLE IF NOT EXISTS habitat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    description TEXT,
    commentaire_habitat TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 4. Table Animal
CREATE TABLE IF NOT EXISTS animal (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(100) NOT NULL,
    race VARCHAR(100) NOT NULL,
    habitat_id INT NOT NULL,
    FOREIGN KEY (habitat_id) REFERENCES habitat(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 5. Table Rapport Vétérinaire
CREATE TABLE IF NOT EXISTS rapport_veterinaire (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    detail TEXT,
    animal_id INT NOT NULL,
    FOREIGN KEY (animal_id) REFERENCES animal(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 6. Table Avis
CREATE TABLE IF NOT EXISTS avis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(100) NOT NULL,
    commentaire TEXT NOT NULL,
    is_visible BOOLEAN DEFAULT FALSE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 7. Table Service
CREATE TABLE IF NOT EXISTS service (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    description TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;