<?php

require_once __DIR__ . '/../Core/Model.php';         // Connexion PDO
require_once __DIR__ . '/../Core/Interfaces/CrudInterface.php'; // Interface CRUD

class Project extends Model implements CrudInterface
{
    // Attributs du projet
    public $id;
    public $name;
    public $description;
    public $start_date;
    public $deadline;

    // getAll() : récupère tous les projets
    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM projects");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // getById() : récupère un projet par son ID
    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM projects WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // save() : insère un nouveau projet
    public function save()
    {
        $stmt = $this->pdo->prepare("INSERT INTO projects (name, description, start_date, deadline) VALUES (:name, :description, :start, :deadline)");
        $stmt->bindValue(':name', $this->name);
        $stmt->bindValue(':description', $this->description);
        $stmt->bindValue(':start', $this->start_date);
        $stmt->bindValue(':deadline', $this->deadline);
        return $stmt->execute();
    }

    // update() : modifie un projet existant
    public function update($id)
    {
        $stmt = $this->pdo->prepare("UPDATE projects SET name = :name, description = :description, start_date = :start, deadline = :deadline WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':name', $this->name);
        $stmt->bindValue(':description', $this->description);
        $stmt->bindValue(':start', $this->start_date);
        $stmt->bindValue(':deadline', $this->deadline);
        return $stmt->execute();
    }

    // delete() : supprime un projet
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM projects WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
