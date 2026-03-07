<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// TRANSAKSI - JADWAL TUGAS
$routes->get('jadwal',                    'Jadwal::index');
$routes->get('jadwal/create',             'Jadwal::create');
$routes->post('jadwal/store',             'Jadwal::store');
$routes->post('jadwal/filter',            'Jadwal::filter');
$routes->get('jadwal/edit/(:segment)',    'Jadwal::edit/$1');
$routes->post('jadwal/update/(:segment)', 'Jadwal::update/$1');
$routes->post('jadwal/delete/(:segment)', 'Jadwal::delete/$1');

// TRANSAKSI - PROGRESS HARIAN
$routes->get('progress',                    'Progress::index');
$routes->get('progress/create',             'Progress::create');
$routes->post('progress/store',             'Progress::store');
$routes->post('progress/filter',            'Progress::filter');
$routes->get('progress/edit/(:segment)',    'Progress::edit/$1');
$routes->post('progress/update/(:segment)', 'Progress::update/$1');
$routes->post('progress/delete/(:segment)', 'Progress::delete/$1');

// MASTER - PETUGAS
$routes->get('petugas',                    'Petugas::index');
$routes->get('petugas/create',             'Petugas::create');
$routes->post('petugas/store',             'Petugas::store');
$routes->get('petugas/edit/(:segment)',    'Petugas::edit/$1');
$routes->post('petugas/update/(:segment)', 'Petugas::update/$1');
$routes->post('petugas/delete/(:segment)', 'Petugas::delete/$1');  // UBAH JADI POST
// $routes->get('petugas/delete/(:segment)',  'Petugas::delete/$1'); // HAPUS ATAU KOMENTARI YANG GET

// MASTER - INSTAGRAM
$routes->get('/instagram', 'Instagram::index');
$routes->get('/instagram/create', 'Instagram::create');
$routes->post('/instagram/store', 'Instagram::store');
$routes->get('/instagram/edit/(:any)', 'Instagram::edit/$1');
$routes->post('/instagram/update/(:any)', 'Instagram::update/$1');
$routes->get('/instagram/delete/(:any)', 'Instagram::delete/$1');
$routes->post('/instagram/delete/(:any)', 'Instagram::delete/$1'); // Untuk POST juga

// MASTER - FACEBOOK
$routes->get('facebook',                    'Facebook::index');
$routes->get('facebook/create',             'Facebook::create');
$routes->post('facebook/store',             'Facebook::store');
$routes->get('facebook/edit/(:segment)',    'Facebook::edit/$1');
$routes->post('facebook/update/(:segment)', 'Facebook::update/$1');
$routes->post('facebook/delete/(:segment)', 'Facebook::delete/$1');

// MASTER - TIKTOK
$routes->get('tiktok',                    'Tiktok::index');
$routes->get('tiktok/create',             'Tiktok::create');
$routes->post('tiktok/store',             'Tiktok::store');
$routes->get('tiktok/edit/(:segment)',    'Tiktok::edit/$1');
$routes->post('tiktok/update/(:segment)', 'Tiktok::update/$1');
$routes->get('tiktok/delete/(:segment)',  'Tiktok::delete/$1');

// MASTER - EMAIL
$routes->get('email',                    'Email::index');
$routes->get('email/create',             'Email::create');
$routes->post('email/store',             'Email::store');
$routes->get('email/edit/(:segment)',    'Email::edit/$1');
$routes->post('email/update/(:segment)', 'Email::update/$1');
$routes->post('email/delete/(:segment)', 'Email::delete/$1');

// MASTER - WEBSITE
$routes->get('website',           'Website::index');
$routes->get('website/create',    'Website::create');
$routes->post('website/store',    'Website::store');
$routes->get('website/edit/(:segment)', 'Website::edit/$1');
$routes->post('website/update/(:segment)', 'Website::update/$1');
$routes->get('website/delete/(:segment)', 'Website::delete/$1');

// MASTER - WHATSAPP
$routes->get('whatsapp',                    'Whatsapp::index');
$routes->get('whatsapp/create',             'Whatsapp::create');
$routes->post('whatsapp/store',             'Whatsapp::store');
$routes->get('whatsapp/edit/(:segment)',    'Whatsapp::edit/$1');
$routes->post('whatsapp/update/(:segment)', 'Whatsapp::update/$1');
$routes->post('whatsapp/delete/(:segment)', 'Whatsapp::delete/$1');