<?php

namespace app\core;

class Controller
{
    public View $view;
    public Model $model;
    public array $params = array();

    public function __construct()
    {
        $this->model = new Model();
        $this->view = new View();
    }

    public function returnView($view, $params = [])
    {
        return Application::$app->view->render($view, $params);
    }
}
