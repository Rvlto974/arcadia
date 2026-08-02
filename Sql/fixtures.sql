-- Clean des tables avant insertion
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE avis;
TRUNCATE TABLE rapport_veterinaire;
TRUNCATE TABLE animal;
TRUNCATE TABLE habitat;
TRUNCATE TABLE utilisateur;
TRUNCATE TABLE role;
SET FOREIGN_KEY_CHECKS = 1;

-- 1. Insertion des Rôles
INSERT INTO role (id, label) VALUES 
(1, 'ROLE_ADMIN'),
(2, 'ROLE_VETERINAIRE'),
(3, 'ROLE_EMPLOYE');

-- 2. Insertion des Utilisateurs de démonstration
-- Mot de passe pour tous : Password123!
INSERT INTO utilisateur (email, password, nom, prenom, role_id) VALUES 
('admin@arcadia.fr', '$2y$10$wT.N3D2UvK5h8c1DqQxKDeX9q8bE4wE5Z3rT7uA8bC9dE0f1g2h3i', 'Le grand', 'José', 1),
('veto@arcadia.fr', '$2y$10$wT.N3D2UvK5h8c1DqQxKDeX9q8bE4wE5Z3rT7uA8bC9dE0f1g2h3i', 'Dubois', 'Marie', 2),
('employe@arcadia.fr', '$2y$10$wT.N3D2UvK5h8c1DqQxKDeX9q8bE4wE5Z3rT7uA8bC9dE0f1g2h3i', 'Martin', 'Lucas', 3);

-- 3. Insertion des Habitats
INSERT INTO habitat (id, nom, description, commentaire_habitat) VALUES 
(1, 'La Savane', 'Espace vaste rappelant les plaines africaines, adapté aux grands herbivores et prédateurs.', 'Clôtures vérifiées, végétation en parfait état.'),
(2, 'La Jungle', 'Environnement tropical dense à forte hygrométrie avec cours d eau artificiel.', 'Niveau d humidité optimal.'),
(3, 'Le Marais', 'Zone humide aménagée pour la faune semi-aquatique.', 'Filtres à eau nettoyés cette semaine.');

-- 4. Insertion des Animaux
INSERT INTO animal (id, prenom, race, habitat_id) VALUES 
(1, 'Simba', 'Lion d Afrique', 1),
(2, 'Kaa', 'Python Vert', 2),
(3, 'Charly', 'Alligator du Mississippi', 3),
(4, 'Tiki', 'Toucan Toco', 2);

-- 5. Insertion des Avis clients de démonstration
INSERT INTO avis (pseudo, commentaire, is_visible) VALUES 
('Famille Dupont', 'Superbe journée passée au zoo ! Les animaux de la savane sont magnifiques.', 1),
('Marc92', 'Visite très agréable, zoo très propre et respectueux des animaux.', 1),
('Inconnu', 'Trop de monde le dimanche.', 0);