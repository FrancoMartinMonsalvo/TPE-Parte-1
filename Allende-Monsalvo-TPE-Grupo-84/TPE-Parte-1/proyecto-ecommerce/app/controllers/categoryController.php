<?php
require_once './app/models/categoryModel.php';
require_once './app/views/categoryView.php';
require_once './app/views/gameView.php';


class CategoryController
{
    private $model;
    private $view;
    private $viewGame;

    function __construct()
    {
        AuthHelper::init();

        $this->model = new CategoryModel();
        $this->view = new CategoryView();
        $this->viewGame = new GameView();
    }

    public function listCategories()
    {
        $categories = $this->model->getCategories();

        $this->view->showCategories($categories);
    }


    public function listGamesByCategory($categoryId)
    {
        $games = $this->model->getGamesByCategory($categoryId);

        $this->view->showCategoryById($games);
    }

    public function deleteCategory($id)
    {
        try {
            $this->model->deleteCategory($id);
            header('Location: ' . BASE_URL . "/categories");
        } catch (PDOException $e) {
            $this->view->showError("Error al borrar la categoria, no debe tener ninguna juego asosciado...");
        }
    }

    public function addCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];

            if (empty($nombre) || empty($descripcion)) {
                $this->view->showError("Debe completar todos los campos...");
                return;
            }

            $success = $this->model->addCategory($nombre, $descripcion);

            if ($success) {
                header('Location: ' . BASE_URL . "categories");
            } else {
                $this->view->showError("Error al insertar categoria...");
            }
        } else {
            $mode = 'add';
            $this->view->showAddCategoryForm($mode);
        }
    }

    public function updateCategory($id, $key)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];

            if (empty($nombre) || empty($descripcion)) {
                $this->view->showError("Debe completar todos los campos...");
                return;
            }

            $success = $this->model->updateCategory($id, $nombre, $descripcion);

            if ($success) {
                header('Location: ' . BASE_URL . "categories");
            } else {
                $this->view->showError("Error al editar la categoria...");
            }
        } else {
            $modo = 'edit';
            $category = $this->model->getCategories($id);
            $this->view->showEditCategoryForm($id, $key, $modo, $category);
        }
    }

    public function showFormCategory()
    {
        $modo = 'add';
        $this->view->showAddCategoryForm($modo);
    }
}
