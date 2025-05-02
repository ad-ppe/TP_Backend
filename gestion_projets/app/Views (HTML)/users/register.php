<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
    <h1>📝 Inscription</h1>

    <form action="/gestion_projets/public/?controller=user&action=store" method="POST">
        <p>
            <label for="username">Nom d'utilisateur :</label><br>
            <input type="text" name="username" id="username" required>
        </p>

        <p>
            <label for="email">Adresse e-mail :</label><br>
            <input type="email" name="email" id="email" required>
        </p>

        <p>
            <label for="password">Mot de passe :</label><br>
            <input type="password" name="password" id="password" required>
        </p>

        <p>
            <button type="submit">Créer un compte</button>
        </p>

        <p>
            Déjà un compte ? <a href="/gestion_projets/public/?controller=user&action=login">Se connecter</a>
        </p>
    </form>
</body>
</html>
