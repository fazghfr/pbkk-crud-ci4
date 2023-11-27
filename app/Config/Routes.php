<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/create', 'TodoController::createPage');
$routes->post('/todo/save', 'TodoController::save');
$routes->get('todo/delete/(:num)', 'TodoController::delete/$1');
$routes->get('todo/edit/(:num)', 'TodoController::editPage/$1');
$routes->post('todo/edit/(:num)', 'TodoController::edit/$1');
