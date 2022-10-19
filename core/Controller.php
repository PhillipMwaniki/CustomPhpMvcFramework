<?php

namespace app\core;

class Controller
{
    public string $layout = 'main';

    public function render(string $view, $data = []): bool|array|string
    {
        return Application::$app->router->renderView($view, $data);
    }

    public function setLayout(string $layout)
    {
        $this->layout = $layout;
    }
}
