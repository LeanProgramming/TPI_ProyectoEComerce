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
//$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('quienes-somos', 'Home::quienes_somos');
$routes->get('terminos-y-usos', 'Home::terminos_y_usos');
$routes->get('contacto', 'Home::contacto');
$routes->post('contacto', 'Home::contacto');
$routes->get('consulta', 'Home::consulta');
$routes->post('consulta', 'Home::consulta');
$routes->get('comercializacion', 'Home::comercializacion');
$routes->get('en_construccion', 'Home::en_construccion');

//Manejo Usuario
$routes->get('ingresar', 'UserController::login');
$routes->post('ingresar', 'UserController::login');
$routes->get('registrar', 'UserController::registrar');
$routes->post('registrar', 'UserController::registrar');
$routes->get('salir', 'UserController::logout');
$routes->get('perfil', 'UserController::perfil');
$routes->get('ver_detalle_compra/(:num)', 'UserController::ver_detalle_compra/$1');
$routes->get('modificar_usuario/(:num)', 'UserController::modificar_usuario/$1');
$routes->post('modificar_usuario/(:num)', 'UserController::modificar_usuario/$1');

//Tienda
$routes->get('tienda', 'TiendaController::index');
$routes->get('tienda/(:num)', 'TiendaController::producto/$1');
$routes->post('tienda/buscar/(:segment)', 'TiendaController::buscar/$1');
$routes->get('tienda/(:segment)', 'TiendaController::clasificar/$1');
$routes->get('tienda/(:segment)/(:segment)', 'TiendaController::subclasificar/$1/$2');
$routes->post('buscar', 'TiendaController::buscar');

//Manejo de carrito
$routes->get('agregar_carrito/(:segment)/(:num)', 'CarritoController::agregar_carrito/$1/$2');
$routes->get('quitar_carrito/(:segment)/(:num)', 'CarritoController::quitar_carrito/$1/$2');
$routes->get('vaciar_carrito/(:segment)', 'CarritoController::vaciar_carrito/$1');
$routes->get('comprar', 'CarritoController::comprar');

//---------------------Espacio Admin------------------------------
$routes->get('usuarios', 'UserController::listar_usuarios');
$routes->get('baja_usuario/(:num)', 'UserController::baja_usuario/$1');
$routes->get('alta_usuario/(:num)', 'UserController::alta_usuario/$1');
$routes->get('consultas', 'AdminController::consultas');
$routes->get('leer_consulta/(:num)', 'AdminController::leer_consulta/$1');
$routes->get('contactos', 'AdminController::contactos');
$routes->get('leer_mensaje/(:num)', 'AdminController::leer_mensaje/$1');
$routes->get('ventas', 'AdminController::ventas');
$routes->get('ver_detalle/(:num)', 'AdminController::ver_detalle/$1');

//Manejo de productos
$routes->get('agregar_producto', 'ProductoController::agregar');
$routes->post('agregar_producto', 'ProductoController::agregar');
$routes->get('modificar_producto/(:num)', 'ProductoController::modificar/$1');
$routes->post('modificar_producto/(:num)', 'ProductoController::modificar/$1');
$routes->get('dar_baja/(:num)', 'ProductoController::dar_baja/$1');
$routes->get('dar_alta/(:num)', 'ProductoController::dar_alta/$1');

//Manejo de clasificaciones
$routes->get('clasificaciones', 'AdminController::clasificaciones');
$routes->post('clasificaciones', 'AdminController::clasificaciones');
$routes->get('modificar_clasif/(:num)', 'AdminController::modificar_clasif/$1');
$routes->post('modificar_clasif/(:num)', 'AdminController::modificar_clasif/$1');
$routes->get('alta_clasif/(:num)', 'AdminController::alta_clasif/$1');
$routes->get('baja_clasif/(:num)', 'AdminController::baja_clasif/$1');

$routes->get('subclasificaciones', 'AdminController::subclasificaciones');
$routes->post('subclasificaciones', 'AdminController::subclasificaciones');
$routes->get('modificar_subclasif/(:num)', 'AdminController::modificar_subclasif/$1');
$routes->post('modificar_subclasif/(:num)', 'AdminController::modificar_subclasif/$1');
$routes->get('alta_subclasif/(:num)', 'AdminController::alta_subclasif/$1');
$routes->get('baja_subclasif/(:num)', 'AdminController::baja_subclasif/$1');
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
