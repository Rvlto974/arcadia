<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Avis - Zoo Arcadia</title>
</head>
<body>
    <h1>Avis des visiteurs</h1>

    <!-- Messages de confirmation ou d'erreur -->
    <?php if (isset($_GET['success'])): ?>
        <p style="color: green;">Merci ! Votre avis a été soumis et sera publié après validation.</p>
    <?php elseif (isset($_GET['error'])): ?>
        <p style="color: red;">Veuillez remplir tous les champs du formulaire.</p>
    <?php endif; ?>

    <!-- Formulaire de soumission -->
    <h2>Laissez votre avis</h2>
    <form action="/avis/creer" method="POST">
        <div>
            <label for="pseudo">Pseudo :</label><br>
            <input type="text" id="pseudo" name="pseudo" required>
        </div>
        <br>
        <div>
            <label for="commentaire">Commentaire :</label><br>
            <textarea id="commentaire" name="commentaire" rows="4" required></textarea>
        </div>
        <br>
        <button type="submit">Envoyer l'avis</button>
    </form>

    <hr>

    <!-- Liste des avis validés -->
    <h2>Derniers avis publiés</h2>
    <?php if (empty($avisValides)): ?>
        <p>Aucun avis publié pour le moment.</p>
    <?php else: ?>
        <?php foreach ($avisValides as $item): ?>
            <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
                <strong><?= htmlspecialchars($item['pseudo']) ?></strong>
                <p><?= htmlspecialchars($item['commentaire']) ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>