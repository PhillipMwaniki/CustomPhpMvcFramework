<?php

namespace app\core;

class Controller
{
    public function render(string $view, $data = []): bool|array|string
    {
        return Application::$app->router->renderView($view, $data);
    }
}
