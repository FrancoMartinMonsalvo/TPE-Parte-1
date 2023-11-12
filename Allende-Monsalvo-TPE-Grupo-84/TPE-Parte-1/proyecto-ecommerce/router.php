<?php
require_once './app/controllers/gameController.php';
require_once './app/controllers/categoryController.php';
require_once './app/controllers/authController.php';
require_once './app/controllers/userController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'games';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'games':
        $gameController = new GameController();
        $gameController->showGames();
        break;
    case 'game':
        $gameController = new GameController();
        $gameController->showGameById($params[1]);
        break;
    case 'deleteGame':
        $gameController = new GameController();
        $gameController->deleteGame($params[1]);
        break;
    case 'addGame':
        $gameController = new GameController();
        $gameController->addGame();
        break;
    case 'editGame':
        $gameController = new GameController();
        $gameController->updateGame($params[1], $params[2]);
        break;
    case 'formGame':
        $gameController = new GameController();
        $gameController->showFormGame();
        break;
    case 'categories':
        $categoryController = new CategoryController();
        $categoryController->listCategories();
        break;
    case 'category':
        $categoryController = new CategoryController();
        $categoryController->listGamesByCategory($params[1]);
        break;
    case 'deleteCategory':
        $categoryController = new CategoryController();
        $categoryController->deleteCategory($params[1]);
        break;
    case 'addCategory':
        $categoryController = new CategoryController();
        $categoryController->addCategory();
        break;
    case 'editCategory':
        $categoryController = new CategoryController();
        $categoryController->updateCategory($params[1], $params[2]);
        break;
    case 'formCategory':
        $categoryController = new CategoryController();
        $categoryController->showFormCategory();
        break;
    case 'login':
        $authController = new AuthController();
        $authController->showLogin();
        break;
    case 'register':
        $userController = new UserController();
        $userController->showRegister();
        break;
    case 'userRegister':
        $userController = new UserController();
        $userController->signUp();
        break;
    case 'users':
        $userController = new UserController();
        $userController->showListUsers();
        break;
    case 'makeToAdmin':
        $userController = new UserController();
        $userController->makeToAdmin($params[1]);
        break;
    case 'deleteUser':
        $userController = new UserController();
        $userController->deleteUser($params[1]);
        break;
    case 'auth':
        $authController = new AuthController();
        $authController->auth();
        break;
    case 'logout':
        $authController = new AuthController();
        $authController->logout();
        break;
    default:
        echo '404';
        break;
}
