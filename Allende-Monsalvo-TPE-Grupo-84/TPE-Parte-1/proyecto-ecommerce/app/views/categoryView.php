<?php
class CategoryView
{
    public function showCategories($items)
    {
        require 'templates/index.phtml';
    }

    public function showCategoryById($item, $id)
    {
        require 'templates/category.phtml';
    }
}
