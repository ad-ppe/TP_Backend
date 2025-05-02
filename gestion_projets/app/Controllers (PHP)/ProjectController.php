<?php

require_once __DIR__ . '/../Core/Controller.php';
require_once __DIR__ . '/../Models/Project.php';
require_once __DIR__ . '/../Core/Auth.php';

class ProjectController extends Controller
{
    public function index()
    {
        Auth::checkAccess(['admin', 'chef', 'collab']);
        $projectModel = new Project();
        $projects = $projectModel->getAll();
        $this->render('projects/list', ['projects' => $projects]);
    }

    public function show($id)
    {
        Auth::checkAccess(['admin', 'chef', 'collab']);
        $projectModel = new Project();
        $project = $projectModel->getById($id);
        $this->render('projects/detail', ['project' => $project]);
    }

    public function store()
    {
        Auth::checkAccess(['admin', 'chef']);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $project = new Project();
            $project->name = $_POST['name'];
            $project->description = $_POST['description'];
            $project->start_date = $_POST['start_date'];
            $project->deadline = $_POST['deadline'];
            $project->save();

            header('Location: /gestion_projets/public/?controller=project&action=index');
            exit;
        }
    }

    public function delete($id)
    {
        Auth::checkAccess(['admin']);
        $projectModel = new Project();
        $projectModel->delete($id);

        header('Location: /gestion_projets/public/?controller=project&action=index');
        exit;
    }
}
