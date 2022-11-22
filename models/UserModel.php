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

    public function create($name, $email, $gender, $status): array
    {
        $params = array();
        $query = Database::insert('users');
        $query->bindValue(":name", $name);
        $query->bindValue(":email", $email);
        $query->bindValue(":gender", $gender);
        $query->bindValue(":status", $status);
        $query->execute();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $params[$row['id']] = $row;
        }
        return $params;
    }

    public function edit($id): array
    {
        return Database::selectById('users', $id);
    }

    public function update($id, $name, $email, $gender, $status): bool
    {
        return Database::update('users', $id, $name, $email, $gender, $status);
    }

    public function delete($id)
    {
        Database::delete('users', $id);
    }
}
