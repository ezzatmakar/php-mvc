<?php

use PhpLite\Application;
use PhpLite\View\View;

if (!function_exists('env')) {
    function env($key, $default = null)
    {
        return $_ENV[$key] ?? value($default);
    }
}

if (!function_exists('value')) {
    function value($value)
    {
        return ($value instanceof Closure) ? $value() : $value;
    }
}

if (!function_exists('base_path')) {
    /**
     * @return string
     */
    function base_path(): string
    {
        return dirname(__DIR__) . '/../';
    }
}

if (!function_exists('views_path')) {
    /**
     * @return string
     */
    function views_path(): string
    {
        return base_path() . 'views/';
    }
}

if (!function_exists('view')) {
    /**
     * @param $view
     * @param array $params
     */
    function view($view, array $params = [])
    {
        View::make($view, $params);
    }

}

if (!function_exists('application')) {
    /**
     * @return Application|null
     */
    function application(): ?Application
    {
        static $instance = null;
        if (!$instance) {
            $instance = new Application();
        }

        return $instance;
    }
}