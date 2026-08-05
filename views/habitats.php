<!DOCTYPE html>
<!-- Page de présentation des différents habitats du Zoo Arcadia -->
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Titre de la page des habitats -->
    <title>Zoo Arcadia - Nos Habitats</title>
    <style>
        body {
            font-family: 'Open Sans', Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 40px;
        }
        .habitats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .habitat-card {
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.2s ease;
        }
        .habitat-card:hover {
            transform: translateY(-5px);
        }
        .habitat-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .habitat-content {
            padding: 20px;
        }
        .habitat-title {
            font-size: 1.5rem;
            color: #2c3e50;
            margin-top: 0;
        }
        .habitat-desc {
            color: #555;
            line-height: 1.5;
        }
        .btn-details {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 18px;
            background-color: #2e7d32;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }
        .btn-details:hover {
            background-color: #1b5e20;
        }
    </style>
</head>
<body>

    <!-- En-tête principal de la section habitats -->
    <header class="header">
        <h1>Nos Habitats</h1>
        <p>Découvrez les environnements naturels préservés du Zoo Arcadia</p>
    </header>

    <!-- Grille d'affichage dynamique des habitats -->
    <main class="habitats-grid">
        <?php if (!empty($habitats)): ?>
            <?php foreach ($habitats as $habitat): ?>
                <!-- Carte dynamique pour l'habitat : <?= htmlspecialchars($habitat['nom']) ?> -->
                <article class="habitat-card">
                    
                    <!-- Bloc d'affichage de l'image de l'habitat -->
                    <?php if (!empty($habitat['image'])): ?>
                        <img src="<?= htmlspecialchars($habitat['image']) ?>" alt="Habitat <?= htmlspecialchars($habitat['nom']) ?>">
                    <?php else: ?>
                        <!-- Image par défaut si aucune image n'est renseignée -->
                        <img src="https://via.placeholder.com/400x200?text=Zoo+Arcadia" alt="Image indisponible">
                    <?php endif; ?>

                    <!-- Contenu textuel et détails de l'habitat -->
                    <div class="habitat-content">
                        <h2 class="habitat-title"><?= htmlspecialchars($habitat['nom']) ?></h2>
                        <p class="habitat-desc"><?= htmlspecialchars($habitat['description']) ?></p>
                        
                        <!-- Lien vers la vue détaillée et la liste des animaux associés -->
                        <a href="index.php?action=habitat&id=<?= $habitat['id_habitat'] ?? $habitat['id'] ?>" class="btn-details">
                            Voir les animaux
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- Message d'information si la table des habitats est vide -->
            <p style="text-align: center; grid-column: 1 / -1;">Aucun habitat n'est actuellement disponible dans la base de données.</p>
        <?php endif; ?>
    </main>

    <!-- Pied de page de l'application -->
    <footer style="text-align: center; margin-top: 50px; color: #777;">
        <p>&copy; <?= date('Y') ?> Zoo Arcadia - Tous droits réservés</p>
    </footer>

</body>
</html>