<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Employé - Modération des Avis</title>
</head>
<body>
    <h1>Espace Employé : Modération des avis</h1>
    <p><a href="/avis" target="_blank">Consulter la page publique des avis ↗</a></p>

    <hr>

    <h2>Avis en attente de validation</h2>

    <?php if (empty($avisEnAttente)): ?>
        <p>✅ Aucun avis en attente pour le moment.</p>
    <?php else: ?>
        <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #f2f2f2; text-align: left;">
                    <th>ID</th>
                    <th>Pseudo</th>
                    <th>Commentaire</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($avisEnAttente as $avis): ?>
                    <tr>
                        <td><?= htmlspecialchars($avis['id']) ?></td>
                        <td><strong><?= htmlspecialchars($avis['pseudo']) ?></strong></td>
                        <td><?= htmlspecialchars($avis['commentaire']) ?></td>
                        <td style="white-space: nowrap;">
                            <!-- Formulaire Valider -->
                            <form action="/employe/avis/valider" method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $avis['id'] ?>">
                                <button type="submit" style="background-color: #4CAF50; color: white; border: none; padding: 6px 12px; cursor: pointer; border-radius: 3px;">
                                    Valider
                                </button>
                            </form>

                            <!-- Formulaire Refuser -->
                            <form action="/employe/avis/refuser" method="POST" style="display:inline; margin-left: 5px;">
                                <input type="hidden" name="id" value="<?= $avis['id'] ?>">
                                <button type="submit" onclick="return confirm('Confirmer la suppression de cet avis ?');" style="background-color: #f44336; color: white; border: none; padding: 6px 12px; cursor: pointer; border-radius: 3px;">
                                    Refuser
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>