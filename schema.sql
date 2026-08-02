-- Création des tables pour le Zoo Arcadia

CREATE TABLE IF NOT EXISTS role (
    id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS utilisateur (
    email VARCHAR(255) PRIMARY KEY,
    password VARCHAR(255) NOT NULL,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    role_id INT NOT NULL,
    FOREIGN KEY (role_id) REFERENCES role(id)
);

CREATE TABLE IF NOT EXISTS habitat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    description TEXT,
    commentaire_habitat TEXT
);

CREATE TABLE IF NOT EXISTS animal (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(100) NOT NULL,
    race VARCHAR(100) NOT NULL,
    habitat_id INT NOT NULL,
    FOREIGN KEY (habitat_id) REFERENCES habitat(id)
);

CREATE TABLE IF NOT EXISTS rapport_veterinaire (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    detail TEXT,
    animal_id INT NOT NULL,
    FOREIGN KEY (animal_id) REFERENCES animal(id)
);

CREATE TABLE IF NOT EXISTS avis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(100) NOT NULL,
    commentaire TEXT NOT NULL,
    is_visible BOOLEAN DEFAULT FALSE
);