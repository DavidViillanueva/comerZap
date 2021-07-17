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


// Auth - las comento por el momento para que ande el registro y quede un usuario cargado
//$routes->get('/login','AuthController::login');
//$routes->get('/register','AuthController::register');
//$routes->get('/recuperarContraseña','AuthController::forgotPassword');

// Aux
$routes->post('/localidades','AuthController::getLocalidades');

$routes->get('/servicio', 'Servicio::index');
$routes->get('/servicio', 'ServicioAdmin::index');
$routes->get('/','Home::index');
$routes->get('/services','Servicio::index');

$routes->get('/commerce/','Comercio::index');
$routes->get('/commerce/create','Comercio::create');
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
