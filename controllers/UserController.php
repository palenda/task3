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
        $users = $userModel->getAll();
        $count = $userModel->count();
        $this->params['users'] = $users;
        $this->params['count'] = $count;
        $this->params['pages'] = ceil($this->params['count'] / 10);
        return $this->returnView('users', $this->params);
    }

    public function get(Request $request)
    {
        $userModel = new UserModel();
        $id = $request->getRouteParam('id');
        $user = $userModel->get($id);
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
        $data = $request->getBody();
        $userModel->create($data['name'], $data['email'], $data['gender'], $data['status']);
        $this->params['user'] = $userModel;
        return $this->returnView('new', $this->params);
    }

    public function update(Request $request)
    {
        $userModel = new UserModel();
        $data = $request->getBody();
        $userModel->update($data['id'], $data['name'], $data['email'], $data['gender'], $data['status']);
        $this->params['user'] = $userModel;
        return $this->returnView('update', $this->params);
    }

    public function deleteChecked(Request $request)
    {
        $userModel = new UserModel();
        if ($request->isPost()) {
            if (!empty($_POST) && !empty($_POST['multiply'])) {
                foreach ($_POST['multiply'] as $id) {
                    $userModel->delete($id);
                }
            }
        }
        $users = $userModel->getAll();
        $count = $userModel->count();
        $this->params['users'] = $users;
        $this->params['count'] = $count;
        return $this->returnView('users', $this->params);
    }

    public function delete(Request $request)
    {
        $id = $request->getRouteParam('id');
        $userModel = new UserModel();
        $users = $userModel->getAll();
        $count = $userModel->count();
        $this->params['users'] = $users;
        $this->params['count'] = $count;
        $userModel->delete($id);
        return $this->returnView('users', $this->params);
    }
}
