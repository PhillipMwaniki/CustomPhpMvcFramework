<?php

namespace app\controllers;

use app\core\Controller;

class AuthController extends Controller
{
    public function login()
    {
        $this->render('login');
    }

    public function register()
    {
        $this->render('register');
    }
}
