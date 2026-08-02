<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Animaux - Arcadia</title>
</head>
<body>
    <h1>Les animaux du Zoo Arcadia</h1>

    <?php if (!empty($animaux)): ?>
        <ul>
            <?php foreach ($animaux as $animal): ?>
                <li>
                    <strong><?= htmlspecialchars($animal['prenom'] ?? $animal['nom'] ?? 'Animal') ?></strong>
                    <?php if (isset($animal['habitat'])): ?>
                        - Habitat : <?= htmlspecialchars($animal['habitat']) ?>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucun animal trouvé.</p>
    <?php endif; ?>
</body>
</html>