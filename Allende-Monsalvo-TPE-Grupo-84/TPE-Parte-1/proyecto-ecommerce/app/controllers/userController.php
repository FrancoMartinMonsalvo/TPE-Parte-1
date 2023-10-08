<?php
require_once 'app/models/userModel.php';
require_once 'app/helpers/auth.helper.php';
require_once 'app/views/authView.php';

class UserController {

    private $view;
    private $userModel;

    function __construct() {
        $this->view = new AuthView();
        $this->userModel = new UserModel();
    }

    public function showLogin () {
        $this->view->showLogin();
    }

    public function logout() {
        AuthHelper::logout();
        header('Location: ' . BASE_URL);
    }
    public function showSignupForm() {
        require_once 'templates/signupView.phtml';
    }
    public function signup() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['Email'];
            $username = $_POST['Username'];
            $password = $_POST['Password'];

            $userCreated = $this->userModel->createUser( $email, $username, $password);
            if ($userCreated) {
                header('Location: ' . BASE_URL);
                exit();
            } else {
                echo "Error al registrar el usuario.";
            }
        }
    }
}