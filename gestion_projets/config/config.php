<?php
// 👉 Paramètres de connexion à la base de données MySQL
define('DB_HOST', 'localhost');          // L'adresse du serveur MySQL (localhost pour ton PC)
define('DB_NAME', 'gestion_projets');    // Le nom de ta base de données
define('DB_USER', 'root');               // Ton nom d'utilisateur MySQL
define('DB_PASS', 'root');                   // Ton mot de passe MySQL (souvent vide en local)

// 👉 Constante utile pour générer des liens vers tes fichiers publics
define('BASE_URL', '/gestion_projets/public/');

// 👉 Mode debug activé (à désactiver plus tard en production)
define('DEBUG', true);
