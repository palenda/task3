<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\UserModel;

class UserController extends Controller
{
    public function show()
    {
        $userModel = new UserModel();
        $users = $userModel->index();
        $this->params['users'] = $users;
        return $this->returnView('users', $this->params);
    }

    public function edit(Request $request)
    {
        $userModel = new UserModel();
        $id = $request->getRouteParam('id');
        $user = $userModel->edit($id);
        $this->params['user'] = $user;
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
                $this->params['user'] = $userModel;
            }
        }

        return $this->returnView('new', $this->params);
    }

    public function update(Request $request)
    {
        $userModel = new UserModel();
        if ($request->isPost()) {
            if (!empty($_POST) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['gender']) && !empty($_POST['status'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $gender = $_POST['gender'];
                $status = $_POST['status'];
                $userModel->update($id, $name, $email, $gender, $status);
                $this->params['user'] = $userModel;
            }
        }

        return $this->returnView('update', $this->params);
    }

    public function delete(Request $request)
    {
        $id = $request->getRouteParam('id');
        $userModel = new UserModel();
        $userModel->delete($id);
        $users = $userModel->index();
        $this->params['users'] = $users;
        return $this->returnView('users', $this->params);
    }
}
