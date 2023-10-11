<?php
require_once './app/models/userModel.php';
require_once './app/views/userView.php';

class UserController
{
    private $userModel;
    private $userView;

    function __construct()
    {
        $this->userModel = new UserModel();
        $this->userView = new UserView();
    }

    public function showRegister()
    {
        $this->userView->showRegister();
    }

    public function signup()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['Email'];
            $username = $_POST['Username'];
            $password = $_POST['Password'];

            $userCreated = $this->userModel->createUser($email, $username, $password);
            if ($userCreated) {
                header('Location: ' . BASE_URL);
                exit();
            } else {
                echo "Error al registrar el usuario.";
            }
        }
    }
}
