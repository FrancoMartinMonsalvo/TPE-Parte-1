<?php
require_once 'app/controllers/authController.php';
require_once 'app/controllers/userController.php';
require_once 'app/controllers/gameController.php';
require_once 'app/controllers/categoryController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home'; // accion por defecto
if (!empty($_GET['action'])) {
        $action = $_GET['action'];
}

$params = explode('/', $action);
$controllerGames = new GameController();
$controllerCategories = new CategoryController();

switch ($params[0]) {
        case 'home':
                $controllerGames->showGames();

                break;
        case 'game':
                $controllerGames->showGameById($params[1]);
                break;
        case 'categories':
                $controllerCategories->showCategories();

                break;
        case 'category':
                $controllerCategories->showCategoryById($params[1]);

                break;
        case 'register':
                $controller = new UserController();
                $controller->signup();

                break;
        case 'signup':
                $controller = new UserController();
                $controller->showSignupForm();

                break;
        case 'login':
                $controller = new AuthController();
                $controller->showLogin();

                break;
        case 'adminlogin':
                $controller = new AuthController();
                $controller->showAdminLogin();        
        case 'auth':
                $controller = new AuthController();
                $controller->auth();

                break;
        case 'logout':
                $controller = new UserController();
                $controller->logout();
        break;        
        default:
                echo "404 Page Not Found";
                break;
}
