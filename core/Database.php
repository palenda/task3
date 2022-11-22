<?php

namespace app\core;

use PDO;

abstract class Database
{
    public static function getConnection(): PDO
    {
        $config = [
            'host' => '10.147.17.129:6033',
//            'host' => '192.168.0.102:6033',
            'name' => 'php_mvc',
            'user' => 'php_mvc',
            'password' => 'php_mvc',
        ];

        $db = new PDO('mysql:host='.$config['host'].';dbname='.$config['name'], $config['user'], $config['password']);
        $db->exec("set names utf8");
        return $db;
    }

    public static function select($table): array
    {
        $sql = "SELECT * FROM $table";
        $db = self::getConnection();
        $query = $db->prepare($sql);
        $params = array();
        $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $params[$row['id']] = $row;
        }
        return $params;
    }

    public static function selectById($table, $id): array
    {
        $sql = "SELECT * FROM $table WHERE id =:id";
        $db = self::getConnection();
        $query = $db->prepare($sql);
        $params = array();
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $params[$row['id']] = $row;
        }
        return $params;
    }

    public static function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id =:id";
        $db = Database::getConnection();
        $query = $db->prepare($sql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
    }

    public static function insert($table)
    {
        $sql = "INSERT INTO $table (`name`, `email`, `gender`, `status`)
				VALUES (:name, :email, :gender, :status)
				";
        $db = self::getConnection();
        return $db->prepare($sql);
    }

    public static function update($table, $id, $name, $email, $gender, $status): bool
    {
        $sql = "UPDATE $table
                SET name = :name, email = :email, gender = :gender, status = :status
                WHERE id = :id    
                ";
        $db = self::getConnection();
        $query = $db->prepare($sql);
        $query->bindValue(":name", $name);
        $query->bindValue(":email", $email);
        $query->bindValue(":gender", $gender);
        $query->bindValue(":status", $status);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        return true;
    }
}
