<?php
class AuthHelper {

    public static function init() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function login($user) {
        AuthHelper::init();
        $_SESSION['Id_Usuario'] = $user->id;
        $_SESSION['Password'] = $user->Password; 
    }

    public static function logout() {
        AuthHelper::init();
        session_destroy();
    }

    public static function verify() {
        AuthHelper::init();
        if (!isset($_SESSION['Id_usuario'])) {
            header('Location: ' . BASE_URL . 'login');
            die();
        }
    }
}
