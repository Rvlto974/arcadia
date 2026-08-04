-- Création de la base de données
CREATE DATABASE IF NOT EXISTS arcadia_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE arcadia_db;

-- 1. Table des rôles
CREATE TABLE role (
    role_id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(50) NOT NULL
) ENGINE=InnoDB;

-- 2. Table des utilisateurs (Administrateur, Employés, Vétérinaires)
CREATE TABLE utilisateur (
    username VARCHAR(50) PRIMARY KEY, -- Correspond à l'e-mail
    password VARCHAR(255) NOT NULL,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    role_id INT NOT NULL,
    CONSTRAINT fk_utilisateur_role FOREIGN KEY (role_id) REFERENCES role(role_id)
) ENGINE=InnoDB;

-- 3. Table des habitats
CREATE TABLE habitat (
    habitat_id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    commentaire_habitat TEXT DEFAULT NULL
) ENGINE=InnoDB;

-- 4. Table des races d'animaux
CREATE TABLE race (
    race_id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(50) NOT NULL
) ENGINE=InnoDB;

-- 5. Table des animaux
CREATE TABLE animal (
    animal_id INT AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(50) NOT NULL,
    etat VARCHAR(100) NOT NULL,
    habitat_id INT NOT NULL,
    race_id INT NOT NULL,
    CONSTRAINT fk_animal_habitat FOREIGN KEY (habitat_id) REFERENCES habitat(habitat_id),
    CONSTRAINT fk_animal_race FOREIGN KEY (race_id) REFERENCES race(race_id)
) ENGINE=InnoDB;

-- 6. Table des rapports vétérinaires (US 4, US 8)
CREATE TABLE rapport_veterinaire (
    rapport_veterinaire_id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    detail TEXT NOT NULL,
    animal_id INT NOT NULL,
    username VARCHAR(50) NOT NULL,
    CONSTRAINT fk_rapport_animal FOREIGN KEY (animal_id) REFERENCES animal(animal_id),
    CONSTRAINT fk_rapport_utilisateur FOREIGN KEY (username) REFERENCES utilisateur(username)
) ENGINE=InnoDB;

-- 7. Table de la consommation de nourriture (Saisie employé - US 7)
CREATE TABLE consommation_nourriture (
    consommation_id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    heure TIME NOT NULL,
    nourriture VARCHAR(100) NOT NULL,
    quantite VARCHAR(50) NOT NULL,
    animal_id INT NOT NULL,
    username VARCHAR(50) NOT NULL,
    CONSTRAINT fk_conso_animal FOREIGN KEY (animal_id) REFERENCES animal(animal_id),
    CONSTRAINT fk_conso_utilisateur FOREIGN KEY (username) REFERENCES utilisateur(username)
) ENGINE=InnoDB;

-- 8. Table des services du zoo (US 3)
CREATE TABLE service (
    service_id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    description TEXT NOT NULL
) ENGINE=InnoDB;

-- 9. Table des avis visiteurs (US 5)
CREATE TABLE avis (
    avis_id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(50) NOT NULL,
    commentaire TEXT NOT NULL,
    isVisible BOOLEAN NOT NULL DEFAULT FALSE
) ENGINE=InnoDB;

-- 10. Table des images (liées aux habitats)
CREATE TABLE image (
    image_id INT AUTO_INCREMENT PRIMARY KEY,
    image_data VARCHAR(255) NOT NULL, -- Stockage du chemin d'accès de l'image
    habitat_id INT DEFAULT NULL,
    CONSTRAINT fk_image_habitat FOREIGN KEY (habitat_id) REFERENCES habitat(habitat_id)
) ENGINE=InnoDB;