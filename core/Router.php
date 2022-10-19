<?php

namespace app\core;

class Router
{

    public Request $request;
    public Response $response;

    protected array $routes = [];

    /**
     * @param  \app\core\Request  $request
     * @param  \app\core\Response  $response
     */
    public function __construct(Request  $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get(string $path, $callback): void
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post(string $path, $callback): void
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();

        $method = $this->request->method();

        $callback = $this->routes[$method][$path] ?? false;

        if (!$callback) {
            $this->response->setStatusCode(404);
            return 'Not found';
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if (is_array($callback)) {
//            [$controller, $action] = $callback;
//            $controller = new $controller;
//
//            if (! method_exists($controller, $action))
//            {
//                throw new \RuntimeException("$controller does not respond to the $action action");
//            }
//            return $controller->$action();
            $callback[0] = new $callback[0];
        }

        return call_user_func($callback, $this->request);
    }

    public function renderView(string $view, $params = []): array|bool|string
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);

        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    private function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/main.php";
        return ob_get_clean();
    }

    private function renderOnlyView(string $view, $data = [])
    {
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }

}
