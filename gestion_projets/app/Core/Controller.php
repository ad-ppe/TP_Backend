<?php

// 👇 Classe abstraite de base pour tous les contrôleurs (Project, Task, User...)
abstract class Controller
{
    /**
     * 👉 Permet de charger une vue et de lui passer des données
     * @param string $view Le chemin de la vue (ex: 'projects/list')
     * @param array $data Les données à rendre disponibles dans la vue
     */
    protected function render($view, $data = [])
    {
        // 👉 On transforme les clés du tableau $data en variables PHP
        extract($data);

        // 👉 On construit le chemin absolu du fichier de vue à inclure
        $viewFile = __DIR__ . '/../Views/' . $view . '.php';

        // 👉 Si la vue existe, on l'inclut
        if (file_exists($viewFile)) {
            require $viewFile;
        } else {
            // 👉 Sinon, on affiche une erreur
            echo "Vue non trouvée : $viewFile";
        }
    }
}
