<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($habitat['nom']) ?> - Zoo Arcadia</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="/">Accueil</a> | 
            <a href="/habitats">Retour à la liste des habitats</a>
        </nav>
    </header>

    <main class="habitat-detail-container">
        <!-- Informations principales de l'habitat -->
        <h1><?= htmlspecialchars($habitat['nom']) ?></h1>
        <p class="description"><?= htmlspecialchars($habitat['description']) ?></p>

        <!-- Section dédiée aux animaux de cet habitat -->
        <section class="animals-section">
            <h2>Les animaux de cet habitat</h2>

            <?php if (!empty($animals)): ?>
                <div class="animals-grid">
                    <?php foreach ($animals as $animal): ?>
                        <div class="animal-card">
                            <h3><?= htmlspecialchars($animal['prenom']) ?></h3>
                            <p><strong>Race :</strong> <?= htmlspecialchars($animal['race']) ?></p>
                            <!-- Vous pouvez ajouter d'autres champs si présents dans votre table animal (ex: état de santé, etc.) -->
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>Aucun animal n'est actuellement hébergé dans cet habitat.</p>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>