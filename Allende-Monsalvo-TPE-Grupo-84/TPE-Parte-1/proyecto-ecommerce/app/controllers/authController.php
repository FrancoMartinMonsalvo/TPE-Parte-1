<?php
require_once './app/helpers/auth.helper.php';
require_once './app/models/userModel.php';
require_once './app/views/authView.php';

class AuthController
{
    private $model;
    private $view;

    function __construct()
    {
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin()
    {
        $this->view->showLogin();
    }

    public function auth()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            $this->view->showLogin('Faltan completar datos');
            return;
        }

        $user = $this->model->getByUsername($username);

        if ($user && password_verify($password, $user->Password)) {
            if ($user->EsAdmin) {
                $esAdmin = true;
            } else {
                $esAdmin = false;
            }

            AuthHelper::login($user);
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showLogin('Usuario inválido');
        }
    }

    public function logout()
    {
        AuthHelper::logout();
        header('Location: ' . BASE_URL);
    }
}
