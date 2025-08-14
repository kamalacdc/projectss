<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'auth::login');
$routes->get('/register', 'auth::daftar');

$routes->post('register/process', 'Auth::processRegister');
$routes->post('login/process', 'Auth::processLogin');
$routes->get('logout', 'Auth::logout');

$routes->get('/projects', 'ProjectController::index');
$routes->get('/dashboard', 'ProjectController::dashboard');
$routes->post('/projects/add', 'ProjectController::add');
