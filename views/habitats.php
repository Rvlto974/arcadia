<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nos Habitats - Zoo Arcadia</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="/">Accueil</a>
            <!-- Autres liens de navigation si nécessaire -->
        </nav>
    </header>

    <main>
        <h1>Nos Habitats</h1>

        <div class="habitats-grid">
            <?php if (!empty($habitats)): ?>
                <?php foreach ($habitats as $habitat): ?>
                    <div class="habitat-card">
                        <h2><?= htmlspecialchars($habitat['nom']) ?></h2>
                        <p><?= htmlspecialchars($habitat['description']) ?></p>
                        <!-- Lien dynamique vers la page de détail -->
                        <a href="/habitat/<?= $habitat['id'] ?>">Découvrir cet habitat</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun habitat n'est disponible pour le moment.</p>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>