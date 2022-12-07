<?php

namespace app\controllers;
use app\core\Controller;
use app\core\Twig;

class AppController extends Controller
{
    public function index()
    {
        return Twig::make('home');
    }
}