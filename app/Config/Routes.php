<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Auth::index');
$routes->post('/login/auth', 'Auth::loginAuth');
$routes->get('/login/auth-google', 'Auth::authGoogle');
$routes->get('/register', 'Auth::register');
$routes->get('/register/creator', 'Home::registerCreator');
$routes->get('/logout', 'Auth::logout');
$routes->get('/explore', 'Home::explore');

// Super Routes Login
$routes->get('admin/login', '\App\Controllers\Dashboard\Admin\Admin::login');
$routes->post('admin/login', '\App\Controllers\Dashboard\Admin\Admin::login');

// Super Routes
$routes->group('admin' ,['namespace' => 'App\Controllers\Dashboard\Admin', 'filter' => 'authadmin'],function ($routes) {
    $routes->get('/', 'Admin::index');
    $routes->get('logout', 'Admin::logout');
    $routes->get('user', 'Admin::user');
    $routes->get('creator', 'Admin::creator');
    $routes->get('content', 'Admin::content');
    $routes->get('post', 'Admin::post');
    $routes->get('comment', 'Admin::comment');
    $routes->get('love', 'Admin::love');
    $routes->get('donate', 'Admin::donate');
    $routes->get('subscribe', 'Admin::subscribe');
    $routes->get('buy', 'Admin::buy');
    $routes->get('milestone', 'Admin::milestone');
    $routes->get('withdraw', 'Admin::withdraw');
    $routes->get('ban/(:segment)', 'Admin::ban/$1');
    $routes->get('unban/(:segment)', 'Admin::unban/$1');
});

// Creator Dashboard Routes
$routes->group('dashboard', ['namespace' => 'App\Controllers\Dashboard\Creator'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->get('profile/creator', 'Profile::index');
    $routes->post('profile/social/add', 'Profile::socialAdd');
    $routes->get('profile/social/delete/(:segment)', 'Profile::socialDelete/$1');
    $routes->get('donate', 'Donate::index');

    // Balance
    $routes->get('balance', 'Transaction::index');
    $routes->post('balance/withdraw', 'Transaction::withdraw');

    // Milestone
    $routes->get('milestone', 'Milestone::index');
    $routes->get('milestone/add', 'Milestone::add');
    $routes->post('milestone/add', 'Milestone::add');
    $routes->get('milestone/edit/(:segment)', 'Milestone::edit/$1');
    $routes->post('milestone/edit/(:segment)', 'Milestone::edit/$1');
    $routes->get('milestone/ended/(:segment)', 'Milestone::ended/$1');
    // Content
    $routes->get('content', 'Content::index');
    $routes->get('content/add', 'Content::add');
    $routes->get('content/edit/(:segment)', 'Content::edit/$1');
    // Post
    $routes->get('post', 'Post::index');
    $routes->get('post/add', 'Post::add');
    $routes->post('post/add', 'Post::add');
    $routes->get('post/edit/(:segment)', 'Post::edit/$1');
    $routes->post('post/edit/(:segment)', 'Post::edit/$1');
    $routes->get('post/delete/(:segment)', 'Post::destroy/$1');
});