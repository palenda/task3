<?php

namespace app\controllers;
use app\core\Controller;

class AppController extends Controller
{
    public function index()
    {
        return $this->returnView('home');
    }
}