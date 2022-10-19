<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class SiteController extends Controller
{

    public function home(): bool|array|string
    {
        return $this->render('home', ['siteName' => 'Philsoft']);
    }

    public function contact(): bool|array|string
    {
        return $this->render('contact');
    }

    public function handleContact(Request $request)
    {
        $body = $request->getBody();
        die(var_dump($body));
        return 'handling submitted data';
    }
}
