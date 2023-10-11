<?php

class UserView
{
    public function showRegister($error = null)
    {
        require_once './templates/register.phtml';
    }
}
