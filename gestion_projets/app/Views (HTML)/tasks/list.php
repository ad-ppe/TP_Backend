<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Tâches</title>
</head>
<body>
    <h1>📌 Liste des tâches</h1>

    <a href="/gestion_projets/public/?controller=task&action=create">➕ Créer une tâche</a>

    <ul>
        <?php if (!empty($tasks)): ?>
            <?php foreach ($tasks as $task): ?>
                <li>
                    <strong><?= htmlspecialchars($task['title']) ?></strong><br>
                    <?= nl2br(htmlspecialchars($task['description'])) ?><br>
                    ✅ Statut : <?= $task['status'] ?><br>
                    🔗 Projet ID : <?= $task['project_id'] ?><br>
                    👤 Assigné à : <?= $task['assigned_to'] ?? 'Aucun' ?><br>
                    <a href="/gestion_projets/public/?controller=task&action=show&id=<?= $task['id'] ?>">🔍 Voir</a>
                    |
                    <a href="/gestion_projets/public/?controller=task&action=delete&id=<?= $task['id'] ?>" onclick="return confirm('Supprimer cette tâche ?')">🗑 Supprimer</a>
                </li>
                <hr>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Aucune tâche trouvée.</li>
        <?php endif; ?>
    </ul>
</body>
</html>
