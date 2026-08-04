-- Insertion des rôles
INSERT INTO role (role_id, label) VALUES 
(1, 'administrateur'),
(2, 'employe'),
(3, 'veterinaire');

-- Insertion du compte Administrateur par défaut (Mot de passe haché de test ou à générer via PHP)
-- Note: Le mot de passe en clair pour cet exemple admin est "Admin123!"
INSERT INTO utilisateur (username, password, nom, prenom, role_id) VALUES 
('jose.admin@arcadia.fr', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Directeur', 'José', 1);

-- Insertion de services de base du zoo
INSERT INTO service (nom, description) VALUES 
('Restauration', 'Profitez de nos points de restauration éco-responsables proposant des produits locaux et bio.'),
('Visite guidée', 'Visite guidée des différents habitats en compagnie de nos guides passionnés (Gratuit).'),
('Petit train', 'Parcourez le zoo à bord de notre petit train 100% électrique pour une découverte ludique.');