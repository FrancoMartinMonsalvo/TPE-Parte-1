<?php
require_once 'app/controllers/gameController.php';
require_once 'app/controllers/categoryController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home'; // accion por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// listar Juegos   -->   showGames();
// agregar Juegos-> addGame();
// eliminar Juegos/ :ID -> removeGame($id);

$params = explode('/', $action);
$controllerGames = new GameController();
$controllerCategories = new CategoryController();

switch ($params[0]) {
    case 'home':
        $controllerGames->showGames();
        break;
    case 'categories':
        $controllerCategories->showCategories();
        break;
    case 'category':
        $controllerCategories->showCategoryById($params[1]);
        break;
    default:
        echo "404 Page Not Found";
        break;
}
