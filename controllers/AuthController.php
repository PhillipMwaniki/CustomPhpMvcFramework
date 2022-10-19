<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class AuthController extends Controller
{
    public function login(Request $request): bool|array|string
    {
        if ($request->isPost()) {
            return 'handle login post';
        }
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register(Request $request): bool|array|string
    {
        if ($request->isPost()) {
            return 'handle register post';
        }
        $this->setLayout('auth');
        return $this->render('register');
    }
}
