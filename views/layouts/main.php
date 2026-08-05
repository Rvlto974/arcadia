<!DOCTYPE html>
<!-- Page d'accueil principale du Zoo Arcadia -->
<html lang="fr">
<head>
    <!-- Encodage et configuration de la vue responsive -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Titre de la page -->
    <title>Zoo Arcadia - Accueil</title>
    <!-- Lien vers le fichier CSS avec un chemin absolu -->
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <!-- En-tête global du site -->
    <header>
        <nav>
            <!-- Logo / Titre du site -->
            <h1>Zoo Arcadia</h1>
        </nav>
    </header>

    <!-- Contenu principal de la page d'accueil -->
    <main>
        <!-- SECTION HERO : Bannière principale immersive -->
        <section class="hero-section">
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <!-- Titre principal de la section hero -->
                <h1>Explorez la biodiversité du Zoo Arcadia</h1>
                <!-- Description d'accroche -->
                <p>Plongez au cœur de nos habitats naturels et découvrez des espèces d'exception tout en participant à leur protection.</p>
                <!-- Bouton d'appel à l'action vers les habitats -->
                <a href="#habitats" class="btn-primary">Découvrir nos habitats</a>
            </div>
        </section>

        <!-- SECTION PRÉSENTATION : Chiffres clés / Intro -->
        <section class="intro-section">
            <div class="container">
                <!-- Titre de bienvenue -->
                <h2>Bienvenue au Zoo Arcadia</h2>
                <!-- Texte de présentation du zoo -->
                <p class="intro-text">
                    Situé en plein cœur de la forêt, notre zoo s'engage pour le bien-être animal et la préservation des espèces menacées. 
                    Venez vivre une expérience inoubliable au plus près de la nature.
                </p>
                
                <!-- Statistiques clés du zoo -->
                <div class="stats-grid">
                    <div class="stat-item">
                        <span class="stat-number">350</span>
                        <span class="stat-label">Animaux</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">40</span>
                        <span class="stat-label">Espèces</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">3</span>
                        <span class="stat-label">Habitats uniques</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">100%</span>
                        <span class="stat-label">Éco-responsable</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION HABITATS : Grille de présentation dynamique -->
        <section id="habitats" class="habitats-section">
            <div class="container">
                <!-- Titre de la section des habitats -->
                <h2>Nos Habitats Naturels</h2>
                <p class="section-subtitle">Chaque habitat est conçu pour reproduire fidèlement l'écosystème d'origine de nos pensionnaires.</p>
                
                <div class="habitats-grid">
                    <!-- Vérification et boucle dynamique pour afficher chaque habitat depuis la base de données -->
                    <?php if (!empty($habitats)): ?>
                        <?php foreach ($habitats as $habitat): ?>
                            <!-- Carte individuelle d'un habitat -->
                            <div class="habitat-card">
                                <!-- Image de l'habitat -->
                                <img src="assets/images/<?= htmlspecialchars($habitat['image'] ?? 'default.jpg') ?>" alt="Habitat <?= htmlspecialchars($habitat['nom']) ?>">
                                
                                <!-- Informations textuelles de l'habitat -->
                                <div class="habitat-info">
                                    <!-- Nom de l'habitat -->
                                    <h3><?= htmlspecialchars($habitat['nom']) ?></h3>
                                    <!-- Description courte -->
                                    <p><?= htmlspecialchars($habitat['description']) ?></p>
                                    
                                    <!-- Lien dynamique vers la page de détail avec l'ID correct -->
                                    <a href="/habitat/<?= $habitat['id'] ?>" class="btn-secondary">Explorer</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <!-- Message si aucun habitat n'est trouvé en base de données -->
                        <p>Aucun habitat n'est disponible pour le moment.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- SECTION ENGAGEMENT : Conservation & Nature -->
        <section class="commitment-section">
            <div class="container commitment-container">
                <div class="commitment-text">
                    <!-- Titre de l'engagement écologique -->
                    <h2>Notre engagement pour la planète</h2>
                    <!-- Description de la démarche -->
                    <p>
                        À Zoo Arcadia, la conservation des espèces n'est pas seulement une mission, c'est une raison d'être. 
                        Grâce à vos visites et à nos programmes de recherche, nous agissons chaque jour pour la sauvegarde de la biodiversité mondiale.
                    </p>
                    <!-- Lien vers la page d'engagement -->
                    <a href="/engagement" class="btn-primary">En savoir plus</a>
                </div>
            </div>
        </section>
    </main>

    <!-- Pied de page global du site -->
    <footer>
        <p>&copy; 2026 - Zoo Arcadia</p>
    </footer>
</body>
</html>