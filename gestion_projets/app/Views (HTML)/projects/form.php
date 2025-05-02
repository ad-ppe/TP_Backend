<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un Projet</title>
</head>
<body>
    <h1>➕ Créer un nouveau projet</h1>

    <form action="/gestion_projets/public/?controller=project&action=store" method="POST">
        <p>
            <label for="name">Nom du projet :</label><br>
            <input type="text" name="name" id="name" required>
        </p>

        <p>
            <label for="description">Description :</label><br>
            <textarea name="description" id="description" rows="5" required></textarea>
        </p>

        <p>
            <label for="start_date">Date de début :</label><br>
            <input type="date" name="start_date" id="start_date" required>
        </p>

        <p>
            <label for="deadline">Date limite :</label><br>
            <input type="date" name="deadline" id="deadline" required>
        </p>

        <p>
            <button type="submit">💾 Enregistrer</button>
            <a href="/gestion_projets/public/?controller=project&action=index">⬅ Retour</a>
        </p>
    </form>
</body>
</html>
