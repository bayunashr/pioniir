<?php

namespace App\Controllers\Dashboard\Creator;

use App\Controllers\BaseController;

class Post extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Dashboard - Pioniir Creator'
        ];
        return view('dashboard/creator/post', $data);
    }

    public function add(){
        $data = [
            'title' => 'Dashboard - Pioniir Creator'
        ];
        return view('dashboard/creator/postAdd', $data);
    }

    public function edit($id) {
        $data = [
            'title' => 'Dashboard - Pioniir Creator'
        ];
        return view('dashboard/creator/postEdit', $data);
    }
}
