<!DOCTYPE html>
<!-- Page d'accueil principale du Zoo Arcadia -->
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Titre de la page -->
    <title>Zoo Arcadia - Accueil</title>
    <!-- Lien vers le fichier CSS avec un chemin absolu -->
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <header>
        <nav>
            <!-- En-tête du site -->
            <h1>Zoo Arcadia</h1>
        </nav>
    </header>

    <main>
        <!-- SECTION HERO : Bannière principale immersive -->
        <section class="hero-section">
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <!-- Titre principal de la section hero -->
                <h1>Explorez la biodiversité du Zoo Arcadia</h1>
                <p>Plongez au cœur de nos habitats naturels et découvrez des espèces d'exception tout en participant à leur protection.</p>
                <a href="#habitats" class="btn-primary">Découvrir nos habitats</a>
            </div>
        </section>

        <!-- SECTION PRÉSENTATION : Chiffres clés / Intro -->
        <section class="intro-section">
            <div class="container">
                <h2>Bienvenue au Zoo Arcadia</h2>
                <p class="intro-text">
                    Situé en plein cœur de la forêt, notre zoo s'engage pour le bien-être animal et la préservation des espèces menacées. 
                    Venez vivre une expérience inoubliable au plus près de la nature.
                </p>
                
                <!-- Statistiques du zoo -->
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

        <!-- SECTION HABITATS : Grille de présentation -->
        <section id="habitats" class="habitats-section">
            <div class="container">
                <h2>Nos Habitats Naturels</h2>
                <p class="section-subtitle">Chaque habitat est conçu pour reproduire fidèlement l'écosystème d'origine de nos pensionnaires.</p>
                
                <div class="habitats-grid">
                    <!-- Habitat 1 : La Jungle -->
                    <div class="habitat-card">
                        <img src="assets/images/jungle.jpg" alt="Habitat La Jungle">
                        <div class="habitat-info">
                            <h3>La Jungle</h3>
                            <p>Une végétation luxuriante abritant félins et primates.</p>
                            <a href="index.php?page=habitat&id=jungle" class="btn-secondary">Explorer</a>
                        </div>
                    </div>

                    <!-- Habitat 2 : Les Marais -->
                    <div class="habitat-card">
                        <img src="assets/images/marais.jpg" alt="Habitat Les Marais">
                        <div class="habitat-info">
                            <h3>Les Marais</h3>
                            <p>Zones humides et rivières à la découverte de la faune aquatique.</p>
                            <a href="index.php?page=habitat&id=marais" class="btn-secondary">Explorer</a>
                        </div>
                    </div>

                    <!-- Habitat 3 : La Savane -->
                    <div class="habitat-card">
                        <img src="assets/images/savane.jpg" alt="Habitat La Savane">
                        <div class="habitat-info">
                            <h3>La Savane</h3>
                            <p>De vastes espaces ouverts pour les grands animaux d'Afrique.</p>
                            <a href="index.php?page=habitat&id=savane" class="btn-secondary">Explorer</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION ENGAGEMENT : Conservation & Nature -->
        <section class="commitment-section">
            <div class="container commitment-container">
                <div class="commitment-text">
                    <h2>Notre engagement pour la planète</h2>
                    <p>
                        À Zoo Arcadia, la conservation des espèces n'est pas seulement une mission, c'est une raison d'être. 
                        Grâce à vos visites et à nos programmes de recherche, nous agissons chaque jour pour la sauvegarde de la biodiversité mondiale.
                    </p>
                    <a href="index.php?page=engagement" class="btn-primary">En savoir plus</a>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <!-- Pied de page -->
        <p>&copy; 2026 - Zoo Arcadia</p>
    </footer>
</body>
</html>