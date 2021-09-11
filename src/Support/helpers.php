<?php

use PhpLite\View\View;

if (!function_exists('env'))
{
  function env($key, $default = null) {
    return $_ENV[$key] ?? value($default);
  }
}

if (!function_exists('value')) 
{
  function value($value) {
    return ($value instanceof Closure) ? $value() : $value;
  }
}

if(!function_exists('base_path'))
{
    function base_path(): string
    {
        return dirname(__DIR__). '/../';
    }
}

if(!function_exists('views_path'))
{
    function views_path(): string
    {
        return base_path(). 'views/';
    }
}

if (!function_exists('view')){
    function view($view, $params = []){
        View::make($view, $params);
    }

}