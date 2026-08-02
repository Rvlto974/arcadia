-- Clean up des données existantes (dans l'ordre inverse des dépendances FK)
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE rapport_veterinaire;
TRUNCATE TABLE animal;
TRUNCATE TABLE habitat;
TRUNCATE TABLE service;
TRUNCATE TABLE avis;
TRUNCATE TABLE utilisateur;
TRUNCATE TABLE role;
SET FOREIGN_KEY_CHECKS = 1;

-- 1. Rôles
INSERT INTO role (id, label) VALUES 
(1, 'Admin'),
(2, 'Vétérinaire'),
(3, 'Employé');

-- 2. Utilisateurs (Mots de passe hashés avec PASSWORD_BCRYPT pour "password123")
INSERT INTO utilisateur (email, password, nom, prenom, role_id) VALUES 
('admin@arcadia.fr', '$2y$10$wT3xZ5v41f4l/q9vIq9fxe/M1p99G9w9g9G9w9g9G9w9g9G9w9g9G', 'José', 'Directeur', 1),
('veto@arcadia.fr', '$2y$10$wT3xZ5v41f4l/q9vIq9fxe/M1p99G9w9g9G9w9g9G9w9g9G9w9g9G', 'Dupont', 'Dr. Marc', 2),
('employe@arcadia.fr', '$2y$10$wT3xZ5v41f4l/q9vIq9fxe/M1p99G9w9g9G9w9g9G9w9g9G9w9g9G', 'Martin', 'Sophie', 3);

-- 3. Habitats
INSERT INTO habitat (id, nom, description, commentaire_habitat) VALUES 
(1, 'La Savane', 'Plaines arides et dégagées abritant les grands mammifères d Afrique.', 'Clôtures et abreuvoirs contrôlés. RAS.'),
(2, 'La Jungle', 'Environnement tropical très dense avec hygrométrie contrôlée.', 'Végétation taillée, brumisateurs fonctionnels.'),
(3, 'Le Marais', 'Zone humide aménagée pour la faune semi-aquatique.', 'Niveau d eau et filtration optimaux.');

-- 4. Animaux
INSERT INTO animal (id, prenom, race, habitat_id) VALUES 
(1, 'Simba', 'Lion d Afrique', 1),
(2, 'Nala', 'Lionne d Afrique', 1),
(3, 'Kaa', 'Python de Seba', 2),
(4, 'Tango', 'Toucan Toco', 2),
(5, 'Victor', 'Alligator du Mississippi', 3);

-- 5. Rapports Vétérinaires
INSERT INTO rapport_veterinaire (id, date, detail, animal_id) VALUES 
(1, '2026-07-28', 'Examen de routine. Simba est en parfaite santé, poids stable.', 1),
(2, '2026-07-29', 'Suivi alimentation. Nala présente un très bon appétit.', 2),
(3, '2026-08-01', 'Mue terminée sans complication pour Kaa. Comportement calme.', 3),
(4, '2026-08-01', 'Contrôle des yeux effectué sur Victor. Bon état général.', 5);

-- 6. Services
INSERT INTO service (id, nom, description) VALUES 
(1, 'Restauration', 'Snack gourmand et restaurant panoramique avec vue sur La Savane.'),
(2, 'Visite Guidée', 'Circuit commenté par un guide expert pour découvrir le quotidien des animaux.'),
(3, 'Petit Train', 'Tour du parc en petit train électrique, idéal pour les familles.');

-- 7. Avis des visiteurs (sans spécifier d'ID car il est AUTO_INCREMENT)
INSERT INTO avis (pseudo, commentaire, is_visible) VALUES 
('JeanMichel974', 'Une journée exceptionnelle en famille ! Les animaux semblent très bien traités.', TRUE),
('Claire_M', 'La visite guidée du Marais était passionnante. Je recommande !', TRUE),
('Lucas_B', 'Très beau parc, les habitats sont spacieux et bien entretenus.', FALSE);