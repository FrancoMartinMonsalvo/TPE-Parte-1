<?php

class UserView
{
    public function showRegister($error = null)
    {
        require_once './templates/register.phtml';
    }

    public function showListUsers($users)
    {
        require_once './templates/listUsers.phtml';
    }

    public function showError($error)
    {
        require './templates/error.phtml';
    }
}
