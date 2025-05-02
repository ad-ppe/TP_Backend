<?php

require_once __DIR__ . '/../Core/Model.php';
require_once __DIR__ . '/../Core/Interfaces/CrudInterface.php';

class Task extends Model implements CrudInterface
{
    public $id;
    public $title;
    public $description;
    public $status;
    public $project_id;
    public $assigned_to;

    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM tasks");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM tasks WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function save()
    {
        $stmt = $this->pdo->prepare("INSERT INTO tasks (title, description, status, project_id, assigned_to) VALUES (:title, :description, :status, :project_id, :assigned_to)");
        $stmt->bindValue(':title', $this->title);
        $stmt->bindValue(':description', $this->description);
        $stmt->bindValue(':status', $this->status);
        $stmt->bindValue(':project_id', $this->project_id, PDO::PARAM_INT);
        $stmt->bindValue(':assigned_to', $this->assigned_to, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function update($id)
    {
        $stmt = $this->pdo->prepare("UPDATE tasks SET title = :title, description = :description, status = :status, project_id = :project_id, assigned_to = :assigned_to WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':title', $this->title);
        $stmt->bindValue(':description', $this->description);
        $stmt->bindValue(':status', $this->status);
        $stmt->bindValue(':project_id', $this->project_id, PDO::PARAM_INT);
        $stmt->bindValue(':assigned_to', $this->assigned_to, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM tasks WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
