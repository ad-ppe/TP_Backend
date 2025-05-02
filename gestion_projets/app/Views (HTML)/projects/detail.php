<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail du Projet</title>
</head>
<body>
    <h1>🔍 Détail du projet</h1>

    <?php if (!empty($project)): ?>
        <h2><?= htmlspecialchars($project['name']) ?></h2>
        <p><strong>Description :</strong><br>
            <?= nl2br(htmlspecialchars($project['description'])) ?>
        </p>
        <p>
            <strong>Date de début :</strong> <?= $project['start_date'] ?><br>
            <strong>Date limite :</strong> <?= $project['deadline'] ?>
        </p>

        <a href="/gestion_projets/public/?controller=project&action=index">⬅ Retour à la liste</a>
    <?php else: ?>
        <p>❌ Projet introuvable.</p>
    <?php endif; ?>
</body>
</html>
