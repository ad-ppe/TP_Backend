<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord</title>
</head>
<body>
    <h1>👋 Bienvenue <?= htmlspecialchars($user['username']) ?></h1>

    <p>Rôle : <strong><?= $user['role'] ?></strong></p>

    <ul>
        <li><a href="/gestion_projets/public/?controller=project&action=index">📁 Mes projets</a></li>
        <li><a href="/gestion_projets/public/?controller=task&action=index">📝 Mes tâches</a></li>
    </ul>

    <p>
        <a href="/gestion_projets/public/?controller=user&action=logout">🚪 Se déconnecter</a>
    </p>
</body>
</html>
