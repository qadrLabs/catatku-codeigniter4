<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

$routes->group('', ['filter' => 'guest'], static function ($routes) {
    $routes->get('/register', 'AuthController::showRegister');
    $routes->post('/register', 'AuthController::register');
});


$routes->get('/entries', 'EntryController::index');

$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/entries/create', 'EntryController::create');
    $routes->post('/entries', 'EntryController::store');
    $routes->get('/entries/(:num)', 'EntryController::show/$1');
    $routes->get('/entries/(:num)/edit', 'EntryController::edit/$1');
    $routes->post('/entries/(:num)/update', 'EntryController::update/$1');
    $routes->post('/entries/(:num)/delete', 'EntryController::destroy/$1');
});


