<?php

class Router
{
    public function handleRequest()
    {
        $controllerParam = $_GET['controller'] ?? 'project';
        $action = $_GET['action'] ?? 'index';
        $id = $_GET['id'] ?? null;
        $method = strtolower($_SERVER['REQUEST_METHOD']);

        // 🎯 Détection API (ex: ?controller=ProjectApi)
        if (str_ends_with(strtolower($controllerParam), 'api')) {
            $controllerName = ucfirst($controllerParam) . 'Controller';
            $controllerFile = __DIR__ . '/../Controllers/Api/' . $controllerName . '.php';

            if (file_exists($controllerFile)) {
                require_once $controllerFile;
                $controller = new $controllerName();

                switch ($method) {
                    case 'get':
                        isset($id) ? $controller->show($id) : $controller->index();
                        break;
                    case 'post':
                        $controller->store();
                        break;
                    case 'put':
                        $controller->update($id ?? 0);
                        break;
                    case 'delete':
                        $controller->delete($id ?? 0);
                        break;
                }
                exit;
            } else {
                require_once __DIR__ . '/../Views/errors/404.php';
                exit;
            }
        }

        // 🎯 Route MVC normale
        $controllerName = ucfirst(strtolower($controllerParam)) . 'Controller';
        $controllerFile = __DIR__ . '/../Controllers/' . $controllerName . '.php';

        if (file_exists($controllerFile)) {
            require_once $controllerFile;

            if (class_exists($controllerName)) {
                $controller = new $controllerName();

                if (method_exists($controller, $action)) {
                    $id !== null ? $controller->$action($id) : $controller->$action();
                } else {
                    require_once __DIR__ . '/../Views/errors/404.php';
                }
            } else {
                require_once __DIR__ . '/../Views/errors/404.php';
            }
        } else {
            require_once __DIR__ . '/../Views/errors/404.php';
        }
    }
}
