<?php

namespace App\Controllers\Dashboard\Creator;

use App\Controllers\BaseController;

class Content extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Dashboard - Pioniir Creator'
        ];
        return view('dashboard/creator/content', $data);
    }
}
