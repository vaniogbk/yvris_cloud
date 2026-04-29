<?php
declare(strict_types=1);

define('ROOT', dirname(__DIR__));

// Autoload
spl_autoload_register(function (string $class): void {
    $paths = [
        ROOT . '/core/'            . $class . '.php',
        ROOT . '/app/Controllers/' . $class . '.php',
        ROOT . '/app/Models/'      . $class . '.php',
    ];
    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});

require_once ROOT . '/config/app.php';
require_once ROOT . '/config/database.php';

Session::start();

$router = new Router();

// Public
$router->get('/',          'HomeController', 'index');
$router->get('/login',     'AuthController', 'showLogin');
$router->post('/login',    'AuthController', 'login');
$router->get('/register',  'AuthController', 'showRegister');
$router->post('/register', 'AuthController', 'register');
$router->get('/logout',    'AuthController', 'logout');

// Client
$router->get('/dashboard',      'UserController', 'dashboard');
$router->get('/profile',        'UserController', 'profile');
$router->post('/profile/update','UserController', 'updateProfile');
$router->get('/invoices',       'UserController', 'invoices');
$router->post('/subscribe',          'UserController', 'subscribe');
$router->post('/subscribe/kkiapay', 'UserController', 'subscribeKkiapay');

// Admin
$router->get('/admin/dashboard',                    'AdminController', 'dashboard');
$router->get('/admin/users',                        'AdminController', 'users');
$router->post('/admin/users/create',                'AdminController', 'createUser');
$router->get('/admin/users/toggle/{id}',            'AdminController', 'toggleUser');
$router->post('/admin/users/delete/{id}',           'AdminController', 'deleteUser');
$router->get('/admin/subscriptions',                'AdminController', 'subscriptions');
$router->post('/admin/subscriptions/status/{id}',   'AdminController', 'updateSubscriptionStatus');
$router->get('/admin/modules',                      'AdminController', 'modules');
$router->get('/admin/modules/toggle/{id}',          'AdminController', 'toggleModule');
$router->get('/admin/invoices',                     'AdminController', 'invoices');
$router->post('/admin/invoices/status/{id}',        'AdminController', 'updateInvoiceStatus');

// Reseller
$router->get('/reseller/dashboard',             'ResellerController', 'dashboard');
$router->get('/reseller/clients',               'ResellerController', 'clients');
$router->post('/reseller/clients/add',          'ResellerController', 'addClient');
$router->get('/reseller/clients/remove/{id}',   'ResellerController', 'removeClient');
$router->get('/reseller/sales',                 'ResellerController', 'sales');

$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
