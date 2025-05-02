<?php

require_once __DIR__ . '/../../Models/Project.php';

class ProjectApiController
{
    private $projectModel;

    public function __construct()
    {
        $this->projectModel = new Project();
        header('Content-Type: application/json');
    }

    public function index()
    {
        echo json_encode($this->projectModel->getAll());
    }

    public function show($id)
    {
        $project = $this->projectModel->getById($id);
        if ($project) {
            echo json_encode($project);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Projet non trouvé']);
        }
    }

    public function store()
    {
        $input = json_decode(file_get_contents('php://input'), true);

        if (!isset($input['name'], $input['description'], $input['start_date'], $input['deadline'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Données incomplètes']);
            return;
        }

        $this->projectModel->name = $input['name'];
        $this->projectModel->description = $input['description'];
        $this->projectModel->start_date = $input['start_date'];
        $this->projectModel->deadline = $input['deadline'];
        $this->projectModel->save();

        http_response_code(201);
        echo json_encode(['message' => 'Projet créé']);
    }

    public function update($id)
    {
        $input = json_decode(file_get_contents('php://input'), true);

        if (!$this->projectModel->getById($id)) {
            http_response_code(404);
            echo json_encode(['error' => 'Projet introuvable']);
            return;
        }

        $this->projectModel->name = $input['name'] ?? null;
        $this->projectModel->description = $input['description'] ?? null;
        $this->projectModel->start_date = $input['start_date'] ?? null;
        $this->projectModel->deadline = $input['deadline'] ?? null;

        $this->projectModel->update($id);
        echo json_encode(['message' => 'Projet mis à jour']);
    }

    public function delete($id)
    {
        if (!$this->projectModel->getById($id)) {
            http_response_code(404);
            echo json_encode(['error' => 'Projet introuvable']);
            return;
        }

        $this->projectModel->delete($id);
        echo json_encode(['message' => 'Projet supprimé']);
    }
}
