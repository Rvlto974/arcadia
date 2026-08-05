-- Désactivation temporaire des vérifications de clés étrangères pour l'insertion
SET FOREIGN_KEY_CHECKS = 0;

-- 1. Insertion des rôles
TRUNCATE TABLE role;
INSERT INTO role (role_id, label) VALUES
(1, 'Administrateur'),
(2, 'Vétérinaire'),
(3, 'Employé');

-- 2. Insertion d'un utilisateur de test (mot de passe haché ou texte selon ton appli, ici un exemple)
TRUNCATE TABLE utilisateur;
INSERT INTO utilisateur (username, password, nom, prenom, role_id) VALUES
('admin@arcadia.fr', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Admin', 'Arcadia', 1);

-- 3. Insertion des habitats
TRUNCATE TABLE habitat;
INSERT INTO habitat (habitat_id, nom, description, commentaire_habitat) VALUES
(1, 'Jungle', 'Un espace luxuriant simulant la forêt tropicale humide.', 'Humidité contrôlée, végétation dense.'),
(2, 'Marais', 'Une zone humide aménagée pour les animaux aquatiques et amphibies.', 'Eau filtrée régulièrement.'),
(3, 'Savane', 'Une vaste plaine sèche reproduisant l\'écosystème africain.', 'Zone ensoleillée avec abris ombragés.');

-- 4. Insertion des races
TRUNCATE TABLE race;
INSERT INTO race (race_id, label) VALUES
(1, 'Lion d\'Afrique'),
(2, 'Singe Araignée'),
(3, 'Crocodile du Nil');

-- 5. Insertion des animaux
TRUNCATE TABLE animal;
INSERT INTO animal (animal_id, prenom, etat, habitat_id, race_id) VALUES
(1, 'Simba', 'En bonne santé', 3, 1),
(2, 'Coco', 'Vif et joueur', 1, 2),
(3, 'Snappy', 'Calme', 2, 3);

-- 6. Insertion des services
TRUNCATE TABLE service;
INSERT INTO service (service_id, nom, description) VALUES
(1, 'Restauration', 'Profitez de nos snacks et restaurants au cœur du zoo.'),
(2, 'Visite guidée', 'Visite commentée par nos soigneurs passionnés.'),
(3, 'Petit train', 'Parcourez le zoo facilement en petit train pour toute la famille.');

-- Réactivation des vérifications de clés étrangères
SET FOREIGN_KEY_CHECKS = 1;