<?php
class AuthHelper
{

    public static function init()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function login($user)
    {
        AuthHelper::init();
        $_SESSION['USER_ID'] = $user->Id_usuario;
        $_SESSION['USER_USERNAME'] = $user->Username;
        $_SESSION['USER_IS_ADMIN'] = $user->EsAdmin;
    }

    public static function logout()
    {
        AuthHelper::init();
        session_destroy();
    }

    public static function verify()
    {
        AuthHelper::init();
        if (!isset($_SESSION['USER_ID'])) {
            header('Location: ' . BASE_URL . 'login');
            die();
        }
    }
}
