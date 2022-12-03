<?php

namespace app\core;

use PDO;

class DatabaseConnection
{
    private static $instance;

    public static function getInstance(): ?PDO
    {
        $config = [
            'host' => 'db:3306',
            'name' => 'php_mvc',
            'user' => 'root',
            'password' => 'root',
        ];

        if (self::$instance === null) {
            self::$instance = new PDO('mysql:host='.$config['host'].';dbname='.$config['name'], $config['user'], $config['password']);
            self::$instance->exec("set names utf8");
        }
        return self::$instance;
    }

    private function __clone() {}
    private function __wakeup() {}
}
