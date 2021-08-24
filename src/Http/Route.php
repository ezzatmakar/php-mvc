<?php

namespace PhpLite\Http;


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

        if(!$action){
            return;
        }

        // 404 handling

        /**
         * handling the request method
         * if the request action is a callback function
         *
         * @example get($route, $action function () { echo 'Hello'; })
         */

        if(is_callable($action)){
            call_user_func_array($action, []);
        }

        /**
         * handling the request if method
         * the request action is an array
         * 
         * @example get($route, [RequestedController::class, 'index'])
         * 
         * using new before the requested controller to not call statically
         */
        if(is_array($action)){
            call_user_func_array( [new $action[0], $action[1]], []);
        }

        dump($action);
    }
}
