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

    public function showListUsers()
    {
        AuthHelper::verify();
        $users = $this->userModel->getAllUsers();

        $this->userView->showListUsers($users);
    }

    public function signup()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['Email'];
            $username = $_POST['Username'];
            $password = $_POST['Password'];

            $userCreated = $this->userModel->createUser($email, $username, $password);
            if ($userCreated) {
                header('Location: ' . BASE_URL . 'login');
                exit();
            } else {
                $this->userView->showError("Error al registrarse.");
            }
        }
    }

    public function makeToAdmin($id)
    {
        $makeAdmin = $this->userModel->upgradeToAdmin($id);

        if ($makeAdmin) {
            header('Location: ' . BASE_URL . "users");
            exit();
        } else {
            $this->userView->showError("Error al convertir al usuario en Administrador.");
        }
    }

    public function deleteUser($id)
    {
        $userToDelete = $this->userModel->deleteUser($id);

        if ($userToDelete) {
            header('Location: ' . BASE_URL . "users");
            exit();
        } else {
            $this->userView->showError("Error al eliminar el usuario.");
        }
    }
}
