<?php

namespace App\Controllers;

use PhpLite\View\View;

class HomeController
{
    public function index()
    {
        return View::make('home');
    }
}