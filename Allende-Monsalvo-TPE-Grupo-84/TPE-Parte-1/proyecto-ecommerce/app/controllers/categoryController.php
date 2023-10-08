<?php
require_once 'app/models/categoryModel.php';
require_once 'app/views/categoryView.php';

class CategoryController
{
    private $model;
    private $view;

    function __construct()
    {
        $this->model = new CategoryModel();
        $this->view = new CategoryView();
    }

    public function showCategories()
    {
        $items = $this->model->getCategories();

        $this->view->showCategories($items);
    }

    public function showCategoryById($id)
    {
        $item = $this->model->getCategories($id);

        $this->view->showCategoryById($item, $id);
    }
}
