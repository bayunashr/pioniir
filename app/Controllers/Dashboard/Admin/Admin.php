<?php

namespace App\Controllers\Dashboard\Admin;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Dashboard - Pioniir Admin'
        ];
        return view('dashboard/admin/dashboard', $data);
    }

    public function user(): string
    {
        $data = [
            'title' => 'User - Pioniir Admin'
        ];
        return view('dashboard/admin/user', $data);
    }

    public function creator(): string
    {
        $data = [
            'title' => 'Creator - Pioniir Admin'
        ];
        return view('dashboard/admin/creator', $data);
    }

    public function content(): string
    {
        $data = [
            'title' => 'Content - Pioniir Admin'
        ];
        return view('dashboard/admin/content', $data);
    }

    public function post(): string
    {
        $data = [
            'title' => 'Post - Pioniir Admin'
        ];
        return view('dashboard/admin/post', $data);
    }

    public function comment(): string
    {
        $data = [
            'title' => 'Comment - Pioniir Admin'
        ];
        return view('dashboard/admin/comment', $data);
    }

    public function love(): string
    {
        $data = [
            'title' => 'Love - Pioniir Admin'
        ];
        return view('dashboard/admin/love', $data);
    }

    public function donate(): string
    {
        $data = [
            'title' => 'Donate - Pioniir Admin'
        ];
        return view('dashboard/admin/donate', $data);
    }

    public function subscribe(): string
    {
        $data = [
            'title' => 'Subscribe - Pioniir Admin'
        ];
        return view('dashboard/admin/subscribe', $data);
    }

    public function buy(): string
    {
        $data = [
            'title' => 'Buy - Pioniir Admin'
        ];
        return view('dashboard/admin/buy', $data);
    }

    public function milestone(): string
    {
        $data = [
            'title' => 'Milestone - Pioniir Admin'
        ];
        return view('dashboard/admin/milestone', $data);
    }
}
