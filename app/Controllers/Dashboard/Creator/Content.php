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

    public function add()
    {
        $data = [
            'title' => 'Dashboard - Pioniir Creator'
        ];
        return view('dashboard/creator/contentAdd', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Dashboard - Pioniir Creator'
        ];
        return view('dashboard/creator/contentEdit', $data);
    }
}
