<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nos Habitats - Zoo Arcadia</title>
</head>
<body>
    <h1>Nos Habitats</h1>
    <ul>
        <?php foreach ($habitats as $habitat): ?>
            <li>
                <h2><?= htmlspecialchars($habitat['nom']) ?></h2>
                <p><?= htmlspecialchars($habitat['description']) ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="/">Accueil</a>
</body>
</html>