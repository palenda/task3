<?php

namespace app\core;

class Controller
{
    public string $layout = 'main';
    public View $view;

    public function returnView($view, $params = [])
    {
        return Application::$app->view->render($view, $params);
    }

    public function setLayout($layout)
    {
    }
}
