<?php

namespace app\models;

use app\core\Model;
use app\core\Database;
use PDO;

class UserModel extends Model
{
    public function index(): array
    {
        return Database::select('users');
    }

    public function show($id)
    {
        return Database::selectById('users', $id);
    }

    public function new()
    {
        return $_GET['newUser'];
    }

    public function create($name, $email, $gender, $status): bool
    {
        $sql = "INSERT INTO users (`name`, `email`, `gender`, `status`)
				VALUES (:name, :email, :gender, :status)
				";
        $query = $this->db->prepare($sql);
        $query->bindValue(":name", $name, PDO::PARAM_STR);
        $query->bindValue(":email", $email, PDO::PARAM_STR);
        $query->bindValue(":gender", $gender, PDO::PARAM_STR);
        $query->bindValue(":status", $status, PDO::PARAM_STR);
        $query->execute();
        return true;
    }

    public function edit($id)
    {
        return Database::selectById('users', $id);
    }

    public function update(): bool
    {
        $sql = "UPDATE users
                SET gender = :gender, name = :name, email = :email, status = :status
                WHERE id = :id    
                ";
        $query = $this->db->prepare($sql);
        $query->bindValue(":name", $_POST['name']);
        $query->bindValue(":email", $_POST['email']);
        $query->bindValue(":gender", $_POST['gender']);
        $query->bindValue(":status", $_POST['status']);
        $query->bindValue(":id", $_POST['id'], PDO::PARAM_INT);
        $query->execute();
        return true;
    }

    public function delete($id): bool
    {
        $sql = "DELETE FROM users WHERE id =:id";
        $query = $this->db->prepare($sql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        return true;
    }
}
