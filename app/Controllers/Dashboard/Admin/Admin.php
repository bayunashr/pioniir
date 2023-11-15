<?php

namespace App\Controllers\Dashboard\Admin;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index(): string
    {
        return view('dashboard/admin/dashboard');
    }

    public function user(): string
    {
        return view('dashboard/admin/user');
    }
}
