<?php
namespace app\controllers;
use app\core\Application;
use app\core\Controller;
use app\core\Request;

class SiteController extends Controller
{
    public function list()
    {
        $params = [
            'name' => "Polina"
        ];
        return Application::$app->router->renderView('list', $params);
    }

    public function usersForm(Request $request)
    {
        if ($request->isPost())
        {
            return "Handling submitted data";
        }
        return $this->render('usersForm');
    }

//    public function handleUser(Request $request)
//    {
//        $body = $request->getBody();
//        echo "<pre>";
//        var_dump($body);
//        echo "</pre>";
//        exit;
//        return "Handling submitted data";
//    }
}
