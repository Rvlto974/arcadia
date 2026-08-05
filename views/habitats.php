<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Habitats - Zoo Arcadia</title>
    <link rel="stylesheet" href="/assets/css/style.css"> <!-- Ajuste le chemin de ton CSS si besoin -->
</head>
<body>

    <!-- En-tête de la page -->
    <header>
        <h1>Découvrez nos Habitats</h1>
        <p>Plongez au cœur des différents écosystèmes de notre parc.</p>
    </header>

    <!-- Contenu principal -->
    <main class="container">
        <section class="habitats-grid">
            <?php if (!empty($habitats)): ?>
                <?php foreach ($habitats as $habitat): ?>
                    <!-- Carte d'un habitat -->
                    <div class="habitat-card">
                        <!-- Nom de l'habitat -->
                        <h2><?= htmlspecialchars($habitat['nom']) ?></h2>
                        
                        <!-- Description de l'habitat -->
                        <p><?= nl2br(htmlspecialchars($habitat['description'])) ?></p>
                        
                        <!-- Commentaire éventuel sur l'habitat -->
                        <?php if (!empty($habitat['commentaire_habitat'])): ?>
                            <div class="habitat-comment">
                                <small><strong>Note du vétérinaire / soin :</strong> <?= htmlspecialchars($habitat['commentaire_habitat']) ?></small>
                            </div>
                        <?php endif; ?>

                        <!-- Lien vers les animaux de cet habitat -->
                        <a href="/animaux?habitat_id=<?= $habitat['habitat_id'] ?>" class="btn-see-animals">
                            Voir les animaux
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun habitat n'a été trouvé pour le moment.</p>
            <?php endif; ?>
        </section>
    </main>

    <!-- Pied de page -->
    <footer>
        <p>&copy; <?= date('Y') ?> Zoo Arcadia - Tous droits réservés.</p>
    </footer>

</body>
</html>