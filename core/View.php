<?php

namespace app\core;

class View
{
    public function render($view, $params = [])
    {
        return $this->renderView($view, $params);
    }

    protected function renderView($view, $params)
    {
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }
}
