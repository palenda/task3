<?php
session_start();
use app\core\Application;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/routes.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
Application::$app->run();









