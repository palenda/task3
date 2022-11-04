<?php

namespace app\core;

class Controller
{
    public string $layout = 'main';

    public function render($view, $params = [])
    {
        return Application::$app->view->renderView($view, $params);
    }

    public function setLayout($layout)
    {
    }
}
