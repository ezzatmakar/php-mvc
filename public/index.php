<?php

use PhpLite\Http\Request;
use PhpLite\Http\Response;
use PhpLite\Http\Route;

require_once __DIR__.'/../src/Support/helpers.php';
require_once base_path()."vendor/autoload.php";
require_once base_path().'routes/web.php';

$route = new Route(new Request(), new Response());

$route->resolve();
