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
}
