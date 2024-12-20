<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'Guest::viewDashboard');

$routes->get('/guest-teacher', 'Guest::viewTeacher');
$routes->get('/guest-faq', 'Guest::viewFAQ');
$routes->get('/guest/profile/(:num)', 'Guest::viewProfile/$1');
$routes->get('/guest-register', 'Guest::viewRegister');
$routes->get('/guest-login', 'Guest::viewLogin');

$routes->post('/register/submit', 'Guest::register');

$routes->post('/login/submit', 'Guest::login');


$routes->get('/logout', 'Guest::logout');

$routes->get('/teacher/dashboard', 'Teacher::viewDashboard');
$routes->get('/teacher/profile/(:num)', 'Teacher::viewProfile/$1');
$routes->get('/teacher/profile/edit/(:num)', 'Teacher::editProfile/$1');
$routes->post('/teacher/profile/update/(:num)', 'Teacher::updateProfile/$1');
$routes->get('/teacher/delete', 'Teacher::deleteAccount');
$routes->get('/teacher/faq', 'Teacher::viewFAQ');
$routes->get('/teacher/students', 'Teacher::viewStudents');
$routes->get('/teacher/student/profile/(:num)', 'Teacher::studentProfile/$1');
$routes->get('/teacher/course', 'Teacher::viewCourses');
$routes->get('/teacher/course/create', 'Teacher::create');
$routes->post('/teacher/course/store', 'Teacher::store');
$routes->get('/teacher/quiz', 'Teacher::viewQuizzes');
$routes->get('/teacher/grade', 'Teacher::viewGrades');
$routes->get('/teacher/grade/edit/(:segment)', 'Teacher::editGrade/$1');
$routes->get('/teacher/grade/delete/(:segment)', 'Teacher::deleteGrade/$1');
$routes->get('/teacher/grades/edit/(:num)', 'Teacher::editGrade/$1');
$routes->post('/teacher/grades/update/(:num)', 'Teacher::updateGrade/$1');
$routes->get('/teacher/grades/delete/(:num)', 'Teacher::deleteGrade/$1');
$routes->get('quiz/edit/(:num)', 'Teacher::editQuiz/$1');
$routes->post('quiz/update/(:num)', 'Teacher::updateQuiz/$1');
$routes->get('quiz/delete/(:num)', 'Teacher::deleteQuiz/$1');
$routes->get('teacher/quiz/create', 'Teacher::createQuiz');
$routes->post('teacher/quiz/store', 'Teacher::storeQuiz');
$routes->get('teacher/quiz/edit/(:num)', 'Teacher::createQuiz/$1');
$routes->post('teacher/quiz/update/(:num)', 'Teacher::updateQuiz/$1');

$routes->get('/admin/progress', 'Admin::viewDashboard');
$routes->get('/admin/profile/(:num)', 'Admin::viewProfile/$1');
$routes->get('/admin/profile/edit', 'Admin::editProfile');
$routes->post('/edit/submit', 'Admin::updateProfile');
$routes->get('/admin/students/delete/(:num)', 'Admin::deleteStudent/$1');
$routes->get('/admin/teachers/delete/(:num)', 'Admin::deleteTeacher/$1');
$routes->get('/admin/faq', 'Admin::viewFAQ');
$routes->get('/admin/students', 'Admin::viewStudents');
$routes->get('/admin/students/profile/(:num)', 'Admin::studentProfile/$1');
$routes->get('/admin/teachers', 'Admin::viewTeachers');
$routes->get('/admin/teachers/profile/(:num)', 'Admin::teacherProfile/$1');

$routes->get('/students/dashboard', 'Students::viewDashboard');