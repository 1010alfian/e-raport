<?php

namespace Config;

use App\Filters\Filterlogin;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Dashboard::index');

$routes->addRedirect('/', 'Auth');
$routes->get('logout', 'Auth::logout');
$routes->get('403', 'Auth::block');

$routes->get('Dashboard', 'Dashboard::index',['filter' => 'filterlogin']);

//routes master data
$routes->resource('KelolaGuru',['filter' => 'filterlogin']);
$routes->resource('KelolaSiswa',['filter' => 'filterlogin']);
$routes->resource('KelolaMapel',['filter' => 'filterlogin']);

// routes Nilai(keterampilan)
$routes->get('keterampilan', 'Nilai::keterampilan',['filter' => 'filterlogin']);
$routes->get('keterampilan/matematika', 'Nilai::form_matematika',['filter' => 'filterlogin']);
$routes->add('keterampilan/save', 'Nilai::save_matematika',['filter' => 'filterlogin']);

/*
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
