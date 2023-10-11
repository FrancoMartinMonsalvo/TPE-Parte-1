<?php
require_once './app/helpers/auth.helper.php';
require_once './app/models/gameModel.php';
require_once './app/views/gameView.php';

class GameController
{
    private $model;
    private $view;
    private $categoryModel;

    function __construct()
    {
        AuthHelper::verify();

        $this->model = new GameModel();
        $this->view = new GameView();
        $this->categoryModel = new CategoryModel();
    }

    public function showGames()
    {
        $games = $this->model->getGames();

        $this->view->showGames($games);
    }

    public function showGameById($id)
    {
        $game = $this->model->getGames();

        $this->view->showGameById($game, $id);
    }

    public function deleteGame($id)
    {
        $this->model->deleteGame($id);
        header('Location: ' . BASE_URL);
    }

    public function addGame()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoria = $_POST['categoria'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $imagen = $_POST['imagen'];

            if (empty($nombre) || empty($precio)) {
                $this->view->showError("Debe completar todos los campos...");
                return;
            }

            $success = $this->model->addGame($categoria, $nombre, $precio, $imagen);

            if ($success) {
                header('Location: ' . BASE_URL);
            } else {
                $this->view->showError("Error al insertar juego...");
            }
        } else {
            $mode = 'add';
            $categories = $this->categoryModel->getCategories();

            $this->view->showAddGameForm($mode, $categories);
        }
    }

    public function updateGame($id, $key)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoria = $_POST['categoria'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $imagen = $_POST['imagen'];

            if (empty($nombre) || empty($precio)) {
                $this->view->showError("Debe completar todos los campos...");
                return;
            }

            $success = $this->model->updateGame($id, $categoria, $nombre, $precio, $imagen);

            if ($success) {
                header('Location: ' . BASE_URL);
            } else {
                $this->view->showError("Error al editar juego...");
            }
        } else {
            $mode = 'edit';
            $game = $this->model->getGames();
            $categories = $this->categoryModel->getCategories();

            $this->view->showEditGameForm($id, $key, $mode, $game, $categories);
        }
    }

    public function showFormGame()
    {
        $mode = 'add';
        $categories = $this->categoryModel->getCategories();

        $this->view->showAddGameForm($mode, $categories);
    }
}
