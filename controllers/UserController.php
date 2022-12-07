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
        if ($_POST['dataSource'] === 'local' ) {
            $_SESSION['dataSource'] = 'local';
        }
        if ($_POST['dataSource'] === 'api' ) {
            $_SESSION['dataSource'] = 'api';
        }

        $userModel = new UserModel();
        $users = $userModel->getAll();
        $count = $userModel->count();
        $this->params['users'] = $users;
        $this->params['count'] = $count;
        $this->params['pages'] = ceil($this->params['count'] / 10);

        if ($_SESSION['dataSource'] === 'local') {
            return Twig::make('users', [
                'users' => $this->params['users'],
                'count' => $this->params['count'],
                'pages' => $this->params['pages'],
                'page' => $_GET['page']
            ]);
        } else {
            $users = $userModel->getAPI();
            $this->params['users_api'] = $users;
            return Twig::make('users', [
                'users' => $this->params['users_api'],
                'count' => $this->params['count'],
                'pages' => $this->params['pages'],
                'page' => $_GET['page']
            ]);
        }
    }

    public function get(Request $request)
    {
        $userModel = new UserModel();
        $id = $request->getRouteParam('id');
        if ($_SESSION['dataSource'] === 'local') {
            $user = $userModel->get($id);
            return Twig::make('edit', [
                'user' => $user,
            ]);
        }
        else {
            $userAPI = $userModel->getByIdAPI($id);
            return Twig::make('edit', [
                'user' => $userAPI,
            ]);
        }
    }

    public function new()
    {
        return Twig::make('_form');
    }

    public function create(Request $request)
    {
        $userModel = new UserModel();
        $data = $request->getBody();
        if ($_SESSION['dataSource'] === 'local') {
            $userModel->create($data['name'], $data['email'], $data['gender'], $data['status']);
            return Twig::make('new', [
                'user' => $data
            ]);
        }
        else {
            $userModel->addNewApiUser($data['name'], $data['email'], $data['gender'], $data['status']);
            return Twig::make('new', [
                'user' => $data,
            ]);
        }
    }

    public function update(Request $request)
    {
        $userModel = new UserModel();
        $data = $request->getBody();
        if ($_SESSION['dataSource'] === 'local') {
        $userModel->update($data['id'], $data['name'], $data['email'], $data['gender'], $data['status']);
        } else {
            $userModel->updateApiUserById($data['id'], $data['name'],
                $data['email'], $data['gender'], $data['status']);
        }
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
        if ($_SESSION['dataSource'] === 'local') {
            $userModel->delete($id);
        } else {
            $userModel->deleteApiUserById($id);
        }
        return $this->show();
    }
}
