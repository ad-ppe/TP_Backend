<?php

class Auth
{
    /**
     * Vérifie que l'utilisateur est connecté avec un rôle autorisé
     */
    public static function checkAccess(array $allowedRoles = [])
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /gestion_projets/public/?controller=user&action=login');
            exit;
        }

        if (!in_array($_SESSION['user']['role'], $allowedRoles)) {
            require_once __DIR__ . '/../Views/errors/403.php';
            exit;
        }
    }
}
