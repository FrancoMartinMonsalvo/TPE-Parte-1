<?php
require_once 'app/models/userModel.php';
require_once 'app/views/authView.php';
require_once 'app/helpers/auth.helper.php';

class AuthController {

    private $view;
    private $userModel;
    private $helper;

    function __construct() {
        $this->view = new AuthView();
        $this->userModel = new UserModel();
        $this->helper = new AuthHelper();
    }

    public function auth() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $_POST['Username'];
            $password = $_POST['Password'];

            if (empty($user) || empty($password)) {
                $this->view->showLogin('Faltan completar datos');
                return;
            }

            $user = $this->userModel->getByUsername($user);

            if ($user && password_verify($password, $user->Password)) {
                AuthHelper::login($user);
                header('Location: ' . BASE_URL);
                return;
            
            }   else {
                    $this->view->showLogin('La contraseña no coincide con la almacenada');
                return;
            }
        }
    }
}






