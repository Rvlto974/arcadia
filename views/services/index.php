<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Services - Zoo Arcadia</title>
</head>
<body>

    <main class="container my-5">
        <h1 class="mb-4">Nos Services</h1>

        <div class="row">
            <?php foreach ($services as $service): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title h5 text-success">
                                <?= htmlspecialchars($service['nom'], ENT_QUOTES, 'UTF-8') ?>
                            </h3>
                            <p class="card-text text-muted">
                                <?= htmlspecialchars($service['description'], ENT_QUOTES, 'UTF-8') ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

</body>
</html>