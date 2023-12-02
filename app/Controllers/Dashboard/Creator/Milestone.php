<?php

namespace App\Controllers\Dashboard\Creator;

use App\Controllers\BaseController;

class Milestone extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Dashboard - Pioniir Creator'
        ];
        return view('dashboard/creator/milestone', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Dashboard - Pioniir Creator'
        ];
        return view('dashboard/creator/milestoneAdd', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Dashboard - Pioniir Creator'
        ];
        return view('dashboard/creator/milestoneEdit', $data);
    }
}