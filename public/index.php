<?php

use Dotenv\Dotenv;
use PhpLite\Support\Arr;

require_once __DIR__ . '/../src/Support/helpers.php';
require_once base_path() . "vendor/autoload.php";
require_once base_path() . 'routes/web.php';

$env = Dotenv::createImmutable(base_path());
$env->load();

application()->run();

var_dump(Arr::has(['db' => ['connection' => ['default' => 'mysql']]], 'db.connection.default'));