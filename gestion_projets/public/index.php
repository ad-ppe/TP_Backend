<?php

// Démarre une session utilisateur
session_start();

// 🛠 Affiche les erreurs PHP (à désactiver en production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 🗺 Inclut et lance le routeur
require_once __DIR__ . '/../app/Core/Router.php';

$router = new Router();
$router->handleRequest();
