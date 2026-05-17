<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/entries', 'EntryController::index');

$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/entries/create', 'EntryController::create');
    $routes->post('/entries', 'EntryController::store');
    $routes->get('/entries/(:num)', 'EntryController::show/$1');
});

// ONLY FOR DEVELOPMENT - delete after lesson 10
$routes->get('/dev-login', static function () {
    session()->set(['user_id' => 1, 'user_name' => 'Budi']);
    return redirect()->to('/entries');
});


