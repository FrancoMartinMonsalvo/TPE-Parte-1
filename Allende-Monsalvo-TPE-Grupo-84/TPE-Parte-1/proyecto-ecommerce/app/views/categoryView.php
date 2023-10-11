<?php

class CategoryView
{

    public function showCategories($categories)
    {
        require_once './templates/categories.phtml';
    }

    public function showCategoryById($games)
    {
        require_once './templates/category.phtml';
    }

    public function showAddCategoryForm($mode)
    {
        require_once './templates/formCategory.phtml';
    }

    public function showEditCategoryForm($id, $key, $mode, $category)
    {
        require_once './templates/formCategory.phtml';
    }

    public function showError($error)
    {
        require './templates/error.phtml';
    }
}
