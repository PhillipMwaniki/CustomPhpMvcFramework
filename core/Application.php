<?php

namespace app\core;

class Application
{

    public static string $ROOT_DIR;
    public static Application $app;
    public Request $request;
    public Response $response;
    public Router $router;
    public Controller $controller;

    /**
     * @param  string  $rootPath
     */
    public function __construct(string $rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;

        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run()
    {
        echo $this->router->resolve();
    }

    /**
     * @return \app\core\Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }

    /**
     * @param  \app\core\Controller  $controller
     */
    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }
}
