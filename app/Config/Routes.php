<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('login', 'Auth::login');
$routes->post('auth/authenticate', 'Auth::authenticate');
$routes->get('logout', 'Auth::logout');
$routes->get('/', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('dashboard', 'Dashboard::index',  ['filter' => 'auth']);

$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('rayon', 'Rayon::index');
    $routes->get('rayon/create', 'Rayon::create');
    $routes->post('rayon/store', 'Rayon::store');
    $routes->get('rayon/edit/(:num)', 'Rayon::edit/$1');
    $routes->post('rayon/update/(:num)', 'Rayon::update/$1');
    $routes->get('rayon/delete/(:num)', 'Rayon::delete/$1');
    $routes->get('rayon/pdf', 'Rayon::pdf');
});

$routes->group('', ['filter' => 'auth'], function($routes){
    $routes->get(   'user',              'User::index');
    $routes->get(   'user/create',       'User::create');
    $routes->post(  'user/store',        'User::store');
    $routes->get(   'user/edit/(:num)',  'User::edit/$1');
    $routes->post(  'user/update/(:num)', 'User::update/$1');
    $routes->get(   'user/delete/(:num)', 'User::delete/$1');
});


$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('lektor', 'Lektor::index');
    $routes->get('lektor/create', 'Lektor::create');
    $routes->post('lektor/store', 'Lektor::store');
    $routes->get('lektor/edit/(:num)', 'Lektor::edit/$1');
    $routes->post('lektor/update/(:num)', 'Lektor::update/$1');
    $routes->get('lektor/delete/(:num)', 'Lektor::delete/$1');
    $routes->get('lektor/pdf', 'Lektor::pdf');
});

$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('majelis', 'Majelis::index');
    $routes->get('majelis/create', 'Majelis::create');
    $routes->post('majelis/store', 'Majelis::store');
    $routes->get('majelis/edit/(:num)', 'Majelis::edit/$1');
    $routes->post('majelis/update/(:num)', 'Majelis::update/$1');
    $routes->get('majelis/delete/(:num)', 'Majelis::delete/$1');
    $routes->get('majelis/pdf', 'Majelis::pdf');
});

$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('kk', 'DataKK::index');
    $routes->get('kk/create', 'DataKK::create');
    $routes->post('kk/store', 'DataKK::store');
    $routes->get('kk/edit/(:num)', 'DataKK::edit/$1');
    $routes->post('kk/update/(:num)', 'DataKK::update/$1');
    $routes->get('kk/delete/(:num)', 'DataKK::delete/$1');
    $routes->get('kk/pdf', 'DataKK::pdf');
});

$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('jemaat', 'Jemaat::index');
    $routes->get('jemaat/detail/(:num)', 'Jemaat::detail/$1');
    $routes->get('jemaat/create/(:num)', 'Jemaat::create/$1');
    $routes->post('jemaat/store', 'Jemaat::store');
    $routes->get('jemaat/edit/(:num)', 'Jemaat::edit/$1');
    $routes->post('jemaat/update/(:num)', 'Jemaat::update/$1');
    $routes->get('jemaat/delete/(:num)', 'Jemaat::delete/$1');
});

$routes->group('', ['filter'=>'auth'], function($routes){
    $routes->get('baptis',             'Baptis::index');
    $routes->get('baptis/create',      'Baptis::create');
    $routes->post('baptis/store',      'Baptis::store');
    $routes->get('baptis/edit/(:num)', 'Baptis::edit/$1');
    $routes->post('baptis/update/(:num)','Baptis::update/$1');
    $routes->get('baptis/delete/(:num)','Baptis::delete/$1');
});

$routes->group('', ['filter'=>'auth'], function($routes){
    $routes->get('krisma',             'Krisma::index');
    $routes->get('krisma/create',      'Krisma::create');
    $routes->post('krisma/store',      'Krisma::store');
    $routes->get('krisma/edit/(:num)', 'Krisma::edit/$1');
    $routes->post('krisma/update/(:num)','Krisma::update/$1');
    $routes->get('krisma/delete/(:num)','Krisma::delete/$1');
});

$routes->group('', ['filter'=>'auth'], function($routes){
    $routes->get('ekaristi',             'Ekaristi::index');
    $routes->get('ekaristi/create',      'Ekaristi::create');
    $routes->post('ekaristi/store',      'Ekaristi::store');
    $routes->get('ekaristi/edit/(:num)', 'Ekaristi::edit/$1');
    $routes->post('ekaristi/update/(:num)','Ekaristi::update/$1');
    $routes->get('ekaristi/delete/(:num)','Ekaristi::delete/$1');
});

$routes->group('', ['filter'=>'auth'], function($routes){
    $routes->get('pengurapan',              'Pengurapan::index');
    $routes->get('pengurapan/create',       'Pengurapan::create');
    $routes->post('pengurapan/store',       'Pengurapan::store');
    $routes->get('pengurapan/edit/(:num)',  'Pengurapan::edit/$1');
    $routes->post('pengurapan/update/(:num)','Pengurapan::update/$1');
    $routes->get('pengurapan/delete/(:num)', 'Pengurapan::delete/$1');
});

$routes->group('', ['filter'=>'auth'], function($routes){
    $routes->get('imamat',             'Imamat::index');
    $routes->get('imamat/create',      'Imamat::create');
    $routes->post('imamat/store',      'Imamat::store');
    $routes->get('imamat/edit/(:num)', 'Imamat::edit/$1');
    $routes->post('imamat/update/(:num)','Imamat::update/$1');
    $routes->get('imamat/delete/(:num)','Imamat::delete/$1');
});

$routes->group('', ['filter'=>'auth'], function($routes){
    $routes->get('perkawinan',              'Perkawinan::index');
    $routes->get('perkawinan/create',       'Perkawinan::create');
    $routes->post('perkawinan/store',       'Perkawinan::store');
    $routes->get('perkawinan/edit/(:num)',  'Perkawinan::edit/$1');
    $routes->post('perkawinan/update/(:num)','Perkawinan::update/$1');
    $routes->get('perkawinan/delete/(:num)', 'Perkawinan::delete/$1');
});

$routes->group('', ['filter'=>'auth'], function($routes){
    $routes->get('tobat',             'Tobat::index');
    $routes->get('tobat/create',      'Tobat::create');
    $routes->post('tobat/store',      'Tobat::store');
    $routes->get('tobat/edit/(:num)', 'Tobat::edit/$1');
    $routes->post('tobat/update/(:num)','Tobat::update/$1');
    $routes->get('tobat/delete/(:num)','Tobat::delete/$1');
});

$routes->group('', ['filter'=>'auth'], function($routes){
    $routes->get('keuangan',             'Keuangan::index');
    $routes->get('keuangan/create',      'Keuangan::create');
    $routes->post('keuangan/store',      'Keuangan::store');
    $routes->get('keuangan/edit/(:num)', 'Keuangan::edit/$1');
    $routes->post('keuangan/update/(:num)','Keuangan::update/$1');
    $routes->get('keuangan/delete/(:num)','Keuangan::delete/$1');
});