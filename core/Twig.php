<?php
namespace app\core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Twig
{
    public static $instance;

    private function __construct() {}
    final public function __clone() {}
    final public function __wakeup() {}

    public static function twigEnvironment()
    {
        if (is_null(static::$instance)) {
            static::$instance = static::buildTwigEnvironment();
        }

        return static::$instance;
    }

    public static function buildTwigEnvironment(): Environment
    {
        $loader = new FilesystemLoader(Application::$ROOT_DIR."/views");

        return new Environment($loader);
    }

    public static function make($view, array $args = [])
    {
        return static::twigEnvironment()->render("/$view.twig", $args);
    }
}

