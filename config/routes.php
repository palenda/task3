<?php

use app\controllers\AppController;
use app\controllers\UserController;
use app\core\Application;

$app = new Application(dirname(__DIR__));

$app->router->get('/', [AppController::class, 'index']);
$app->router->get('/users/new', [UserController::class, 'new']);
$app->router->post('/users/create', [UserController::class, 'create']);
$app->router->get('/users', [UserController::class, 'show']);
$app->router->get('/users/edit/{id}', [UserController::class, 'edit']);
$app->router->get('/users/{id}', [UserController::class, 'delete']);
$app->router->post('/users/update', [UserController::class, 'update']);

