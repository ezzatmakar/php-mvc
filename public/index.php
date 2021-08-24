<?php

use PhpLite\Http\Request;
use PhpLite\Http\Response;
use PhpLite\Http\Route;

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../routes/web.php';

$route = new Route(new Request(), new Response());

$route->resolve();
