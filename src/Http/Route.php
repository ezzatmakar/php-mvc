<?php

namespace PhpLite\Http;


use PhpLite\View\View;

class Route
{
    public Request $request;
    public Response $response;

    public function __construct(Request $request, Response $response){

        $this->request = $request;
        $this->response = $response;

    }

    protected static array $routes = [];

    public static function get($route, $action): void
    {
        self::$routes['get'][$route] = $action;
    }

    public static function post($route, $action): void
    {
        self::$routes['post'][$route] = $action;
    }

    public function resolve()
    {
        $path = $this->request->path();
        $method = $this->request->method();
        $action = self::$routes[$method][$path] ?? false;


        if (!array_key_exists($path, self::$routes[$method])){
            View::makeError('error-404');
        }
        // 404 handling

        if (is_callable($action)) {
            call_user_func_array($action, []);
        }elseif(is_array($action)) {
            $controller = new $action[0];
            $method = $action[1];

            call_user_func_array([$controller, $method], []);
        }

    }
}
