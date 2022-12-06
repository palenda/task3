<?php

namespace app\models;

use app\core\Model;
use app\core\Database;
use PDO;

class UserModel extends Model
{
    public function getAll(): array
    {
        return Database::limitSelect('users');
    }

    public function count(): int
    {
        return Database::select('users');
    }

    public function show($id): array
    {
        return Database::selectById('users', $id);
    }

    public function create($name, $email, $gender, $status): array
    {
        $params = array();
        $values = [
            'name' => ':name',
            'email' => ':email',
            'gender' => ':gender',
            'status' => ':status',
        ];
        $query = Database::insert('users', "`name`, `email`, `gender`, `status`",
            $values['name'].", ".$values['email'].", ".$values['gender'].", ".$values['status']);
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

    public function get($id): array
    {
        return Database::selectById('users', $id);
    }

    public function update($id, $name, $email, $gender, $status): bool
    {
        $query = Database::update('users',
            "name = '".$name."', email = '".$email."', gender = '".$gender."', status = '".$status."'");
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        return $query->execute();
    }

    public function delete($id)
    {
        Database::delete('users', $id);
    }
}
