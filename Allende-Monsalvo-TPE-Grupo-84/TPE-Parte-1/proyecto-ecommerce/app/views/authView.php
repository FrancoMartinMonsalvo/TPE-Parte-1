<?php

class AuthView {
    public function showLogin($error = null) {
        require './templates/login.phtml';
    }
    public function showAdminLogin($error = null){
        require './templates/adminlogin.phtml';
    }
}
