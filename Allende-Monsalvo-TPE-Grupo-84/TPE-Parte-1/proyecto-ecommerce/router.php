<?php
require_once 'app/controllers/authController.php';
require_once 'app/controllers/userController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


$action = 'login'; // accion por defecto
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
    //case 'listar' : 
        //showGames();
        //break;
    //case 'agregar' : 
       // addGame();
        //break;
    //case 'eliminar' : 
        //removeGame($params[1]);
       // break;
    case 'register':
        $controller = new UserController();
        $controller->signup(); 
        
        break;
    case 'signup':
            $controller = new UserController();
            $controller->showSignupForm();  
        
        break;         
    case 'login':
        $controller = new UserController();
        $controller->showLogin(); 
        
        break;
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