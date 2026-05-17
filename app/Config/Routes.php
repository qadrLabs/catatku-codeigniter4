<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/entries', 'EntryController::index');
$routes->get('/entries/(:num)', 'EntryController::show/$1');

