<?php

namespace PhpLite\Http;

class Request
{
    public function method(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function path()
    {
        $path = $_SERVER['REDIRECT_URL'] ?? '/';

        return str_contains($path, '?') ? explode('?', $path)[0] : $path;
    }
}