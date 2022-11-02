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
        if ($request->isPost())
        {
            $userModel->loadData($request->getBody());

            var_dump($userModel);
            if ($userModel->validate() && $userModel->pass())
            {
                return 'Success';
            }
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
