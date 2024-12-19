<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Guest::viewDashboard');
$routes->get('/guest-teacher', 'Guest::viewTeacher');

$routes->get('/guest-faq', 'Guest::viewFAQ');
$routes->get('/guest-register', 'Guest::viewRegister');

$routes->get('/guest-login', 'Guest::viewLogin');
$routes->post('/login/submit', 'Guest::login');
$routes->get('/admin/dashboard', 'Admin::viewDashboard');
$routes->get('/students/dashboard', 'Students::viewDashboard');
$routes->get('/teacher/dashboard', 'Teacher::viewDashboard');