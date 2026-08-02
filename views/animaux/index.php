<?php 
$title = "Nos Animaux - Zoo Arcadia";
require_once __DIR__ . '/../layouts/header.php'; 
?>

<h1>Les Animaux du Zoo</h1>

<div class="cards-grid">
    <?php foreach ($animaux as $animal): ?>
        <div class="card">
            <h2 class="card-title"><?= htmlspecialchars($animal['prenom'] ?? 'Animal') ?></h2>
            <p><strong>Habitat :</strong> <?= htmlspecialchars($animal['habitat'] ?? 'Non spécifié') ?></p>
        </div>
    <?php endforeach; ?>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>