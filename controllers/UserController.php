<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\UserModel;

class UserController extends Controller
{
    public function list()
    {
        $this->setLayout('db');
        return $this->render('list');
    }

    public function usersForm(Request $request)
    {
        $errors = [];
        $userModel = new UserModel();
        if ($request->isPost()) {
            $userModel->loadData($request->getBody());
//            echo "<pre>";
//            var_dump($userModel);
//            echo "</pre>";
//            exit;
            if ($userModel->validate() && $userModel->pass()) {
                return 'Success';
            }

            echo "<pre>";
            var_dump($userModel->errors);
            echo "</pre>";
            exit;

            return $this->render('usersForm', [
                'model' => $userModel
            ]);
        }
        $this->setLayout('db');
        return $this->render('usersForm', [
            'model' => $userModel
        ]);
    }
}
