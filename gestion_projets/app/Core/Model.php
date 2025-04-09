<?php
// 👇 On inclut le fichier de config qui contient les infos de connexion
require_once __DIR__ . '/../../../config/config.php';

// 👇 Classe abstraite = on ne pourra jamais faire "new Model()"
abstract class Model {
    protected $pdo; // 👉 Attribut PDO pour se connecter à la BDD

    public function __construct() {
        try {
            // 👉 Construction du DSN = infos de connexion MySQL
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
            
            // 👉 Création de l'objet PDO avec le DSN, l'utilisateur et le mot de passe
            $this->pdo = new PDO($dsn, DB_USER, DB_PASS);

            // 👉 Si DEBUG est activé, on affiche les erreurs PDO
            if (DEBUG) {
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (PDOException $e) {
            // 👉 En cas d'erreur de connexion, on arrête le script et affiche le message
            die("Erreur de connexion : " . $e->getMessage());
        }
    }
}
