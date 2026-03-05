<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('transaksi', function($routes) {
    $routes->get('jadwal', 'Jadwal::index');
    $routes->get('jadwal/create', 'Jadwal::create');
    $routes->post('jadwal/store', 'Jadwal::store');
    $routes->get('jadwal/delete/(:num)', 'Jadwal::delete/$1');
    });

    //DATA PETUGAS
    $routes->get('/petugas', 'Petugas::index');
    $routes->get('/petugas/create', 'Petugas::create');
    $routes->post('/petugas/store', 'Petugas::store');
    $routes->get('/petugas/edit/(:num)', 'Petugas::edit/$1');
    $routes->post('/petugas/update/(:num)', 'Petugas::update/$1');
    $routes->get('/petugas/delete/(:num)', 'Petugas::delete/$1');

    //AKUN INSTAGRAM
    $routes->get('/instagram', 'Instagram::index');
    $routes->get('/instagram/create', 'Instagram::create');
    $routes->post('/instagram/store', 'Instagram::store');
    $routes->get('/instagram/edit/(:num)', 'Instagram::edit/$1');
    $routes->post('/instagram/update/(:num)', 'Instagram::update/$1');
    $routes->get('/instagram/delete/(:num)', 'Instagram::delete/$1');

    //AKUN FACEBOOK
    $routes->get('/facebook', 'Facebook::index');
    $routes->get('/facebook/create', 'Facebook::create');
    $routes->post('/facebook/store', 'Facebook::store');
    $routes->get('/facebook/edit/(:num)', 'Facebook::edit/$1');
    $routes->post('/facebook/update/(:num)', 'Facebook::update/$1');
    $routes->get('/facebook/delete/(:num)', 'Facebook::delete/$1');

    //AKUN TIKTOK
    $routes->get('/tiktok', 'Tiktok::index');
    $routes->get('/tiktok/create', 'Tiktok::create');
    $routes->post('/tiktok/store', 'Tiktok::store');
    $routes->get('/tiktok/edit/(:num)', 'Tiktok::edit/$1');
    $routes->post('/tiktok/update/(:num)', 'Tiktok::update/$1');
    $routes->get('/tiktok/delete/(:num)', 'Tiktok::delete/$1');

    //AKUN EMAIL
    $routes->get('/email', 'Email::index');
    $routes->get('/email/create', 'Email::create');
    $routes->post('/email/store', 'Email::store');
    $routes->get('/email/edit/(:num)', 'Email::edit/$1');
    $routes->post('/email/update/(:num)', 'Email::update/$1');
    $routes->get('/email/delete/(:num)', 'Email::delete/$1');

    //WEBSITE
    $routes->get('/website', 'Website::index');
    $routes->get('/website/create', 'Website::create');
    $routes->post('/website/store', 'Website::store');
    $routes->get('/website/edit/(:num)', 'Website::edit/$1');
    $routes->post('/website/update/(:num)', 'Website::update/$1');
    $routes->get('/website/delete/(:num)', 'Website::delete/$1');

    //AKUN WA
    $routes->get('/wa', 'Wa::index');
    $routes->get('/wa/create', 'Wa::create');
    $routes->post('/wa/store', 'Wa::store');
    $routes->get('/wa/edit/(:num)', 'Wa::edit/$1');
    $routes->post('/wa/update/(:num)', 'Wa::update/$1');
    $routes->get('/wa/delete/(:num)', 'Wa::delete/$1');