<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Encodage et titre de la page -->
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($habitat['nom'] ?? 'Habitat') ?> - Zoo Arcadia</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <!-- En-tête de navigation du site -->
    <header>
        <nav>
            <!-- Lien vers la page d'accueil -->
            <a href="/">Accueil</a> | 
            <!-- Lien de retour vers la liste des habitats -->
            <a href="/habitats">Retour à la liste des habitats</a>
        </nav>
    </header>

    <!-- Début du contenu principal pour le détail de l'habitat -->
    <main class="habitat-detail-page">
        <!-- Vérification si l'habitat existe bien -->
        <?php if (!empty($habitat)): ?>
            <!-- En-tête de la section de l'habitat -->
            <header class="habitat-header">
                <!-- Nom de l'habitat -->
                <h1><?= htmlspecialchars($habitat['nom']) ?></h1>
            </header>

            <!-- Section contenant les informations détaillées -->
            <section class="habitat-info">
                <!-- Description complète de l'habitat -->
                <div class="habitat-description">
                    <h2>À propos de cet habitat</h2>
                    <p><?= nl2br(htmlspecialchars($habitat['description'])) ?></p>
                </div>

                <!-- Commentaire éventuel ou informations supplémentaires -->
                <?php if (!empty($habitat['commentaire_habitat'])): ?>
                    <div class="habitat-comment">
                        <h3>Remarque du vétérinaire / soignant</h3>
                        <p><?= htmlspecialchars($habitat['commentaire_habitat']) ?></p>
                    </div>
                <?php endif; ?>
            </section>

            <!-- Section dédiée aux animaux de cet habitat -->
            <section class="animals-section">
                <h2>Les animaux de cet habitat</h2>

                <!-- Vérification de la présence d'animaux -->
                <?php if (!empty($animals)): ?>
                    <div class="animals-grid">
                        <?php foreach ($animals as $animal): ?>
                            <!-- Carte individuelle pour chaque animal -->
                            <div class="animal-card">
                                <!-- Prénom de l'animal -->
                                <h3><?= htmlspecialchars($animal['prenom']) ?></h3>
                                <!-- Race de l'animal -->
                                <p><strong>Race :</strong> <?= htmlspecialchars($animal['race']) ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <!-- Message si aucun animal n'est rattaché à cet habitat -->
                    <p>Aucun animal n'est actuellement hébergé dans cet habitat.</p>
                <?php endif; ?>
            </section>

            <!-- Bouton de retour vers la liste des habitats -->
            <div class="habitat-actions">
                <a href="/habitats" class="btn-back">← Retour à la liste des habitats</a>
            </div>

        <?php else: ?>
            <!-- Message d'erreur si l'habitat demandé n'existe pas -->
            <div class="error-container">
                <h2>Habitat introuvable</h2>
                <p>Désolé, l'habitat que vous recherchez n'existe pas ou a été supprimé.</p>
                <a href="/habitats" class="btn-back">Retour à la liste des habitats</a>
            </div>
        <?php endif; ?>
    </main>
    <!-- Fin du contenu principal -->
</body>
</html>