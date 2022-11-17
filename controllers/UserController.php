<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\UserModel;

class UserController extends Controller
{
    /*
     //TODO: delete()
    */

    public function show()
    {
        $userModel = new UserModel();
        $users = $userModel->index();
        $this->params['users'] = $users;
        return $this->returnView('users', $this->params);
    }

    public function edit($id)
    {
        $userModel = new UserModel();
        $user = $userModel->edit($id);
        $this->params['users'] = $user;
        return $this->returnView('edit', $this->params);
    }

    public function new()
    {
            return $this->returnView('_form');
    }

    public function create(Request $request)
    {
        $userModel = new UserModel();
        if ($request->isPost()) {

            if (!empty($_POST) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['gender']) && !empty($_POST['status'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $gender = $_POST['gender'];
                $status = $_POST['status'];

                $userModel->create($name, $email, $gender, $status);
            }
        }

        return $this->returnView('new', [$userModel]);
    }

    public function delete($id)
    {
        $userModel = new UserModel();
        $userModel->delete($id);
        return $this->returnView('users');
    }
}
