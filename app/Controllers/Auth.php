<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index(): string
    {
        return view('front/login');
    }

    public function register()
    {
        return view('front/register');
    }
}
