<?php
require_once 'app/models/gameModel.php';
require_once 'app/views/gameView.php';

class GameController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new GamesModel();
        $this->view = new GamesView();
    }

    public function showGames()
    {
        $items = $this->model->getGames();

        $this->view->showGames($items);
    }

    public function showGameById($id)
    {
        $item = $this->model->getGames($id);

        $this->view->showGameById($item, $id);
    }
}
