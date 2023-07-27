<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index', ['filter'=>'auth']);

$routes->group('auth', function($routes){
    $routes->get('/', 'Auth::index');
    $routes->post('login', 'Auth::login');
    $routes->get('registration', 'Auth::reg');
    $routes->post('daftar', 'Auth::daftar');
    $routes->get('logout', 'Auth::logout');
});

$routes->group('kategori', ['filter'=>'auth'], function($routes){
    $routes->get('/', 'Admin\Kategori::index');
    $routes->get('read', 'Admin\Kategori::read');
    $routes->post('post', 'Admin\Kategori::create');
    $routes->put('put', 'Admin\Kategori::update');
    $routes->delete('delete/(:any)', 'Admin\Kategori::delete/$1');
});

$routes->group('layanan', ['filter'=>'auth'], function($routes){
    $routes->get('/', 'Admin\Layanan::index');
    $routes->get('read', 'Admin\Layanan::read');
    $routes->post('post', 'Admin\Layanan::create');
    $routes->put('put', 'Admin\Layanan::update');
    $routes->delete('delete/(:any)', 'Admin\Layanan::delete/$1');
});

$routes->group('harga', ['filter'=>'auth'], function($routes){
    $routes->get('/', 'Admin\Harga::index');
    $routes->get('read', 'Admin\Harga::read');
    $routes->post('post', 'Admin\Harga::create');
    $routes->put('put', 'Admin\Harga::update');
    $routes->delete('delete/(:any)', 'Admin\Harga::delete/$1');
});

$routes->group('transaksi', ['filter'=>'auth'], function($routes){
    $routes->get('/', 'Admin\Transaksi::index');
    $routes->get('read', 'Admin\Transaksi::read');
    $routes->post('post', 'Admin\Transaksi::create');
    $routes->put('put', 'Admin\Transaksi::update');
    $routes->delete('delete/(:any)', 'Admin\Transaksi::delete/$1');
});



// Customer
$routes->group('pesanan', ['filter'=>'auth'], function($routes){
    $routes->get('/', 'Customer\Pesanan::index');
    $routes->get('read', 'Customer\Pesanan::read');
    $routes->get('add', 'Customer\Pesanan::add');
    $routes->post('post', 'Customer\Pesanan::create');
    $routes->put('put', 'Customer\Pesanan::update');
    $routes->delete('delete/(:any)', 'Customer\Pesanan::delete/$1');
});

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
