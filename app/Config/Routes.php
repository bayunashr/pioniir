<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('/', function($routes) {
    $routes->get('', 'Home::index');
    $routes->get('explore', 'Home::explore');
    $routes->get('explore/(:any)', 'Home::explore/$1');

    // Login User
    $routes->group('login', ['filter' => 'loginfront'], function($routes) {
        $routes->get('', 'Auth::index');
        $routes->post('auth', 'Auth::loginAuth');
        $routes->get('auth-google', 'Auth::authGoogle');
    });

    // Register User
    $routes->group('register', ['filter' => 'loginfront'], function($routes) {
        $routes->get('', 'Auth::register');
        $routes->post('auth', 'Auth::registerAuth');
    });

    // Register Creator
    $routes->group('register/creator', ['filter' => 'userFilter'], function($routes) {
        $routes->get('', 'Home::registerCreator');
        $routes->post('', 'Home::registerCreator');
    });

    $routes->get('logout', 'Auth::logout');
});

// Super Routes Login
$routes->get('admin/login', '\App\Controllers\Dashboard\Admin\Admin::login', ['filter' => 'loginadmin']);
$routes->post('admin/login', '\App\Controllers\Dashboard\Admin\Admin::login', ['filter' => 'loginadmin']);
$routes->post('withdraw/xendit/webhook', '\App\Controllers\WebhookController::webhookXendit');

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

// Creator Routes
$routes->group('dashboard', ['namespace' => 'App\Controllers\Dashboard\Creator', 'filter' => 'creatorfilter'], function ($routes) {
    // Creator Dashboard
    $routes->get('/', 'Dashboard::index');

    // Creator Profile
    $routes->group('profile/creator', function ($routes) {
        $routes->get('/', 'Profile::index');
        $routes->post('/', 'Profile::index');
        $routes->post('profile-picture', 'Profile::profilePicture');
        $routes->post('change-banner', 'Profile::banner');
        $routes->post('social/add', 'Profile::socialAdd');
        $routes->post('social/edit', 'Profile::socialEdit');
        $routes->get('social/delete/(:segment)', 'Profile::socialDelete/$1');
    });

    // Creator Balance
    $routes->group('balance', function ($routes) {
        $routes->get('/', 'Transaction::index');
        $routes->post('withdraw', 'Transaction::withdraw');
    });

    // Creator Milestone
    $routes->group('milestone', function ($routes) {
        $routes->get('/', 'Milestone::index');
        $routes->get('add', 'Milestone::add');
        $routes->post('add', 'Milestone::add');
        $routes->get('edit/(:segment)', 'Milestone::edit/$1');
        $routes->post('edit/(:segment)', 'Milestone::edit/$1');
        $routes->get('ended/(:segment)', 'Milestone::ended/$1');
    });

    // Creator Content
    $routes->group('content', function ($routes) {
        $routes->get('/', 'Content::index');
        $routes->get('add', 'Content::add');
        $routes->post('add', 'Content::add');
        $routes->get('edit/(:segment)', 'Content::edit/$1');
        $routes->post('edit/(:segment)', 'Content::edit/$1');
        $routes->get('delete/(:segment)', 'Content::destroy/$1');
    });

    // Creator Post
    $routes->group('post', function ($routes) {
        $routes->get('/', 'Post::index');
        $routes->get('add', 'Post::add');
        $routes->post('add', 'Post::add');
        $routes->get('edit/(:segment)', 'Post::edit/$1');
        $routes->post('edit/(:segment)', 'Post::edit/$1');
        $routes->get('delete/(:segment)', 'Post::destroy/$1');
    });

    // Creator Donate
    $routes->get('donate', 'Donate::index');

});