<?php

use app\controllers\UserController;
use app\core\Application;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Application(dirname(__DIR__));

$app->router->get('/', [UserController::class, 'list']);
$app->router->get('/usersForm', [UserController::class, 'usersForm']);
$app->router->post('/usersForm', [UserController::class, 'usersForm']);

$app->run();
