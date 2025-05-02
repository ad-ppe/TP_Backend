<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer une Tâche</title>
</head>
<body>
    <h1>➕ Nouvelle tâche</h1>

    <form action="/gestion_projets/public/?controller=task&action=store" method="POST">
        <p>
            <label for="title">Titre :</label><br>
            <input type="text" name="title" id="title" required>
        </p>

        <p>
            <label for="description">Description :</label><br>
            <textarea name="description" id="description" rows="5" required></textarea>
        </p>

        <p>
            <label for="status">Statut :</label><br>
            <select name="status" id="status">
                <option value="todo">À faire</option>
                <option value="in_progress">En cours</option>
                <option value="done">Terminé</option>
            </select>
        </p>

        <p>
            <label for="project_id">Projet ID :</label><br>
            <input type="number" name="project_id" id="project_id" required>
        </p>

        <p>
            <label for="assigned_to">ID utilisateur assigné :</label><br>
            <input type="number" name="assigned_to" id="assigned_to">
        </p>

        <p>
            <button type="submit">💾 Enregistrer</button>
            <a href="/gestion_projets/public/?controller=task&action=index">⬅ Retour</a>
        </p>
    </form>
</body>
</html>
