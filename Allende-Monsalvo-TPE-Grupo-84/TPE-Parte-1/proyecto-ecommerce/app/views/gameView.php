<?php

class GameView
{
    public function showGames($games)
    {
        require './templates/games.phtml';
    }

    public function showGameById($game, $id)
    {
        require './templates/game.phtml';
    }

    public function showAddGameForm($mode, $categories)
    {
        require_once './templates/formGame.phtml';
    }

    public function showEditGameForm($id, $key, $mode, $game, $categories)
    {
        require_once './templates/formGame.phtml';
    }

    public function showError($error)
    {
        require './templates/error.phtml';
    }
}
