<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Projets</title>
</head>
<body>
    <h1>📋 Liste des projets</h1>

    <a href="/gestion_projets/public/?controller=project&action=create">➕ Créer un projet</a>

    <ul>
        <?php if (!empty($projects)): ?>
            <?php foreach ($projects as $project): ?>
                <li>
                    <strong><?= htmlspecialchars($project['name']) ?></strong><br>
                    <?= nl2br(htmlspecialchars($project['description'])) ?><br>
                    Début : <?= $project['start_date'] ?> | Deadline : <?= $project['deadline'] ?> <br>
                    <a href="/gestion_projets/public/?controller=project&action=show&id=<?= $project['id'] ?>">🔍 Voir</a>
                    |
                    <a href="/gestion_projets/public/?controller=project&action=delete&id=<?= $project['id'] ?>" onclick="return confirm('Supprimer ce projet ?')">🗑 Supprimer</a>
                </li>
                <hr>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Aucun projet pour le moment.</li>
        <?php endif; ?>
    </ul>
</body>
</html>
