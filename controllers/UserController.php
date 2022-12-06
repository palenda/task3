<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\Twig;
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
        return Twig::make('users', [
            'users' => $this->params['users'],
            'count' => $this->params['count'],
            'pages' => $this->params['pages'],
            'page' => $_GET['page']
        ]);
    }

    public function get(Request $request)
    {
        $userModel = new UserModel();
        $id = $request->getRouteParam('id');
        $user = $userModel->get($id);
        return Twig::make('edit', [
            'users' => $user,
        ]);
    }

    public function new()
    {
        return Twig::make('_form');
    }

    public function create(Request $request)
    {
        $userModel = new UserModel();
        $data = $request->getBody();
        $userModel->create($data['name'], $data['email'], $data['gender'], $data['status']);
        return Twig::make('new', [
            'user' => $data
        ]);
    }

    public function update(Request $request)
    {
        $userModel = new UserModel();
        $data = $request->getBody();
        $userModel->update($data['id'], $data['name'], $data['email'], $data['gender'], $data['status']);
        return Twig::make('update', [
            'user' => $data
        ]);
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
        return $this->show();
    }

    public function delete(Request $request)
    {
        $id = $request->getRouteParam('id');
        $userModel = new UserModel();
        $userModel->delete($id);
        return $this->show();
    }
}
