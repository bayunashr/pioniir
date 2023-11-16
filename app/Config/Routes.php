<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Super Routes
$routes->group('admin', ['namespace' => 'App\Controllers\Dashboard\Admin'], function ($routes) {
    $routes->get('dashboard', 'Admin::index');
    $routes->get('user', 'Admin::user');
    $routes->get('creator', 'Admin::creator');
});