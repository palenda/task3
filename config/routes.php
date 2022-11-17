<?php

use app\controllers\AppController;
use app\controllers\UserController;
use app\core\Application;

$app = new Application(dirname(__DIR__));

$app->router->get('/', [AppController::class, 'index']);
$app->router->get('/users/new', [UserController::class, 'new']);
$app->router->post('/users/create', [UserController::class, 'create']);
$app->router->get('/users', [UserController::class, 'show']);
$app->router->get('/users/edit/{id:\d+}', [UserController::class, 'edit']);
$app->router->post('/users/{id:\d+}', [UserController::class, 'delete']);

