<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Auth::index');
$routes->get('/register', 'Auth::register');

// Super Routes
$routes->group('admin', ['namespace' => 'App\Controllers\Dashboard\Admin'], function ($routes) {
    $routes->get('/', 'Admin::index');
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
    $routes->get('ban/(:segment)', 'Admin::postBan/$1');
});

// Creator Dashboard Routes
$routes->group('dashboard', ['namespace' => 'App\Controllers\Dashboard\Creator'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->get('profile/creator', 'Profile::index');
    // Content
    $routes->get('content', 'Content::index');
    $routes->get('content/add', 'Content::add');
    $routes->get('content/edit/(:any)', 'Content::edit/$1');
    // Post
    $routes->get('post', 'Post::index');
    $routes->get('post/add', 'Post::add');
    $routes->get('post/edit/(:any)', 'Post::edit/$1');
});