<?php

require_once __DIR__ . '/../Core/Controller.php';
require_once __DIR__ . '/../Models/Task.php';
require_once __DIR__ . '/../Core/Auth.php';

class TaskController extends Controller
{
    public function index()
    {
        Auth::checkAccess(['admin', 'chef', 'collab']);
        $taskModel = new Task();
        $tasks = $taskModel->getAll();
        $this->render('tasks/list', ['tasks' => $tasks]);
    }

    public function show($id)
    {
        Auth::checkAccess(['admin', 'chef', 'collab']);
        $taskModel = new Task();
        $task = $taskModel->getById($id);
        $this->render('tasks/detail', ['task' => $task]);
    }

    public function store()
    {
        Auth::checkAccess(['admin', 'chef']);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $task = new Task();
            $task->title = $_POST['title'];
            $task->description = $_POST['description'];
            $task->status = $_POST['status'];
            $task->project_id = $_POST['project_id'];
            $task->assigned_to = $_POST['assigned_to'];
            $task->save();

            header('Location: /gestion_projets/public/?controller=task&action=index');
            exit;
        }
    }

    public function delete($id)
    {
        Auth::checkAccess(['admin']);
        $taskModel = new Task();
        $taskModel->delete($id);

        header('Location: /gestion_projets/public/?controller=task&action=index');
        exit;
    }
}
