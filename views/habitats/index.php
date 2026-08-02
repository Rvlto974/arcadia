<?php 
$title = "Les Habitats - Zoo Arcadia";
require_once __DIR__ . '/../layouts/header.php'; 
?>

<h1>Les Habitats du Zoo</h1>

<div class="cards-grid">
    <?php foreach ($habitats as $habitat): ?>
        <div class="card">
            <h2 class="card-title"><?= htmlspecialchars($habitat['nom']) ?></h2>
            <p><?= htmlspecialchars($habitat['description'] ?? 'Aucune description disponible.') ?></p>
        </div>
    <?php endforeach; ?>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>