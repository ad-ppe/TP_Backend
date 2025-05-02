<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h1>🔐 Connexion</h1>

    <?php if (!empty($error)): ?>
        <p style="color:red"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="/gestion_projets/public/?controller=user&action=authenticate" method="POST">
        <p>
            <label for="email">Adresse e-mail :</label><br>
            <input type="email" name="email" id="email" required>
        </p>

        <p>
            <label for="password">Mot de passe :</label><br>
            <input type="password" name="password" id="password" required>
        </p>

        <p>
            <button type="submit">Se connecter</button>
        </p>

        <p>
            Pas encore inscrit ? <a href="/gestion_projets/public/?controller=user&action=register">Créer un compte</a>
        </p>
    </form>
</body>
</html>
