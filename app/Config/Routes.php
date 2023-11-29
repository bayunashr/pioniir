<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

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
});

// Creator Dashboard Routes
$routes->group('dashboard', ['namespace' => 'App\Controllers\Dashboard\Creator'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->get('content', 'Content::index');
});