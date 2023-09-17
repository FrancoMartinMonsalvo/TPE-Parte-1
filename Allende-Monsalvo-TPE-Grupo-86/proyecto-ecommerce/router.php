<?php
require_once 'products/functionalities.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listar'; // accion por defecto
if (!empty ($_GET['action'])){
    $action = $_GET['action'];
}

// listar Juegos   -->   showGames();
// agregar Juegos-> addGame();
// eliminar Juegos/ :ID -> removeGame($id);



// parsea la accion para separar accion real de parametros
//los metodos que llama son los de functionalities php
$params = explode('/', $action);

switch ($params[0]){
    case 'listar' : 
        showGames();
        break;
    case 'agregar' : 
        addGame();
        break;
    case 'eliminar' : 
        removeGame($params[1]);
        break;        
    default:
        echo "404 Page Not Found";
        break;

}