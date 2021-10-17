<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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
//$routes->get('/', 'Home::index');



$routes->post('/localidades','AuthController::getLocalidades');

// Esta ruta tiene un middlelware
$routes->get('/profile','AuthController::profile', [ 'as' => 'profile' , 'filter' => 'authFilter']);
$routes->post('/profile/complete','AuthController::completeProfile',['as' => 'completeprofile', 'filter' => 'authFilter']);
$routes->match(['get', 'post'],'/profile/editProfile/(:segment)/(:segment)','AuthController::editProfileScreen/$1/$2');
$routes->get('/profile/editProfile','AuthController::editProfileScreen',['as' => 'editProfile','filter' => 'authFilter']);

$routes->get('/servicio', 'Servicio::index');
$routes->get('/servicio', 'ServicioAdmin::index');
$routes->get('/','Home::index');
$routes->get('/services','Servicio::index');

$routes->get('/dashboard', 'Dashboard::index');

$routes->get('/commerce/','Comercio::index');
$routes->get('/commerce/crear','Comercio::crear');
$routes->get('/comercio', 'Comercio::index');
$routes->get('/comercio-admin', 'Comercio::comercioAdmin', ['as'=>'comercio-admin']);
// $routes->get('/', 'Servicio::index');
//$routes->get('/(:segment)', 'Servicio::view/$1');



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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
