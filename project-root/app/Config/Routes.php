<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/mahasiswa', 'Task\\MahasiswaController::showMahasiswa', ['filter' => 'auth']);
$routes->get('/mahasiswa/add', 'Task\\MahasiswaController::showFormCreateMahasiswa');
$routes->post('/mahasiswa/save', 'Task\\MahasiswaController::createMahasiswa');
$routes->get('/mahasiswa/update/(:num)', 'Task\\MahasiswaController::updateMahasiswa/$1');
$routes->delete('/mahasiswa/delete/(:num)', 'Task\\MahasiswaController::deleteMahasiswa/$1');
$routes->get('/mahasiswa/detail/(:segment)', 'Task\\MahasiswaController::showDetailMahasiswa/$1');
$routes->get('/login', 'Task\\LoginController::index');
$routes->post('/login/auth', 'Task\\LoginController::auth');
$routes->get('/logout', 'Task\\LoginController::logout');
$routes->get('/dashboard', 'Task\\MahasiswaController::showDashboard', ['filter' => 'auth']);
$routes->get('/', 'Home::index');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
