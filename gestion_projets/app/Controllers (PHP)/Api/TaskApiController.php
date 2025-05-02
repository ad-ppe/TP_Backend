<?php

require_once __DIR__ . '/../../Models/Task.php';

class TaskApiController
{
    private $taskModel;

    public function __construct()
    {
        $this->taskModel = new Task();
        header('Content-Type: application/json');
    }

    public function index()
    {
        echo json_encode($this->taskModel->getAll());
    }

    public function show($id)
    {
        $task = $this->taskModel->getById($id);
        if ($task) {
            echo json_encode($task);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Tâche non trouvée']);
        }
    }

    public function store()
    {
        $input = json_decode(file_get_contents('php://input'), true);

        if (!isset($input['title'], $input['description'], $input['status'], $input['project_id'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Champs requis manquants']);
            return;
        }

        $this->taskModel->title = $input['title'];
        $this->taskModel->description = $input['description'];
        $this->taskModel->status = $input['status'];
        $this->taskModel->project_id = $input['project_id'];
        $this->taskModel->assigned_to = $input['assigned_to'] ?? null;

        $this->taskModel->save();
        http_response_code(201);
        echo json_encode(['message' => 'Tâche créée']);
    }

    public function update($id)
    {
        $input = json_decode(file_get_contents('php://input'), true);

        if (!$this->taskModel->getById($id)) {
            http_response_code(404);
            echo json_encode(['error' => 'Tâche introuvable']);
            return;
        }

        $this->taskModel->title = $input['title'] ?? null;
        $this->taskModel->description = $input['description'] ?? null;
        $this->taskModel->status = $input['status'] ?? null;
        $this->taskModel->project_id = $input['project_id'] ?? null;
        $this->taskModel->assigned_to = $input['assigned_to'] ?? null;

        $this->taskModel->update($id);
        echo json_encode(['message' => 'Tâche mise à jour']);
    }

    public function delete($id)
    {
        if (!$this->taskModel->getById($id)) {
            http_response_code(404);
            echo json_encode(['error' => 'Tâche introuvable']);
            return;
        }

        $this->taskModel->delete($id);
        echo json_encode(['message' => 'Tâche supprimée']);
    }
}
