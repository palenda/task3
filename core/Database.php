<?php

namespace app\core;
use app\config\DatabaseConnection;
use PDO;

abstract class Database
{
    public static function getConnection(): PDO
    {
        return DatabaseConnection::getInstance();
    }

    public static function select($table): int
    {
        $sql = "SELECT * FROM $table";
        $db = self::getConnection();
        $query = $db->prepare($sql);
        $params = array();
        $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $params[$row['id']] = $row;
        }
        return count($params);
    }

    public static function limitSelect($table): array
    {
        $page = $_GET['page'] ?? 1;
        $limit = 10;
        $start = ($page - 1) * $limit;
        $sql = "SELECT * FROM $table LIMIT $start, $limit";
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
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id =:id";
        $db = Database::getConnection();
        $query = $db->prepare($sql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
    }

    public static function insert($table, $data, $values)
    {
        $sql = "INSERT INTO $table ($data)
				VALUES ($values)
				";
        $db = self::getConnection();
        return $db->prepare($sql);
    }

    public static function update($table, $set)
    {
        $sql = "UPDATE $table
                SET $set
                WHERE id = :id    
                ";
        $db = self::getConnection();
        return $db->prepare($sql);
    }
}
