<?php

require_once __DIR__ . '/../Core/Controller.php';
require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Core/Auth.php';

class UserController extends Controller
{
    public function register()
    {
        $this->render('users/register');
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            $user->username = $_POST['username'];
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];
            $user->role = 'collab';
            $user->save();

            header('Location: /gestion_projets/public/?controller=user&action=login');
            exit;
        }
    }

    public function login()
    {
        $this->render('users/login');
    }

    public function authenticate()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = new User();
            $user = $userModel->findByEmail($_POST['email']);

            if ($user && password_verify($_POST['password'], $user['password'])) {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role']
                ];

                header('Location: /gestion_projets/public/?controller=user&action=dashboard');
                exit;
            } else {
                $this->render('users/login', ['error' => 'Identifiants invalides']);
            }
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: /gestion_projets/public/?controller=user&action=login');
        exit;
    }

    public function dashboard()
    {
        Auth::checkAccess(['admin', 'chef', 'collab']);
        $this->render('users/dashboard', ['user' => $_SESSION['user']]);
    }
}
