<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail de la Tâche</title>
</head>
<body>
    <h1>🔍 Détail de la tâche</h1>

    <?php if (!empty($task)): ?>
        <h2><?= htmlspecialchars($task['title']) ?></h2>

        <p><strong>Description :</strong><br>
            <?= nl2br(htmlspecialchars($task['description'])) ?>
        </p>

        <p>
            <strong>Statut :</strong> <?= $task['status'] ?><br>
            <strong>Projet associé :</strong> <?= $task['project_id'] ?><br>
            <strong>Assignée à :</strong> <?= $task['assigned_to'] ?? 'Non assignée' ?>
        </p>

        <a href="/gestion_projets/public/?controller=task&action=index">⬅ Retour à la liste</a>
    <?php else: ?>
        <p>❌ Tâche introuvable.</p>
    <?php endif; ?>
</body>
</html>
