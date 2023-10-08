<?php

class GamesView
{
    public function showGames($items)
    {
        require_once './templates/index.phtml';
    }

    public function showGameById($item, $id)
    {
        require_once './templates/game.phtml';
    }
}
