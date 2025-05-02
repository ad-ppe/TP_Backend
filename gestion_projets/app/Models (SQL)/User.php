<?php

require_once __DIR__ . '/../Core/Model.php';
require_once __DIR__ . '/../Core/Interfaces/CrudInterface.php';

class User extends Model implements CrudInterface
{
    public $id;
    public $username;
    public $email;
    public $password;
    public $role;

    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT id, username, email, role FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT id, username, email, role FROM users WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function save()
    {
        $stmt = $this->pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)");
        $stmt->bindValue(':username', $this->username);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':password', password_hash($this->password, PASSWORD_DEFAULT));
        $stmt->bindValue(':role', $this->role);
        return $stmt->execute();
    }

    public function update($id)
    {
        $stmt = $this->pdo->prepare("UPDATE users SET username = :username, email = :email, role = :role WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':username', $this->username);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':role', $this->role);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function findByEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
