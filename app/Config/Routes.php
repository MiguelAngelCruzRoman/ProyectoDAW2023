<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//Pacientes-----------------------------------------------------------------------------
$routes->get('/administrador/index', 'Administrador::index');
$routes->get('/administrador/opciones', 'Administrador::opciones');
//-----------------------------------------------------------------------------------------
$routes->get('/administrador/administrarPacientes', 'Administrador::administrarPacientes');
$routes->get('/administrador/buscarPacientes', 'Administrador::buscarPacientes');
$routes->get('/administrador/editarPaciente', 'Administrador::editarPaciente');
$routes->get('/administrador/editarPaciente2', 'Administrador::editarPaciente2');
$routes->get('/administrador/editarPaciente3', 'Administrador::editarPaciente3');
$routes->get('/administrador/eliminarPaciente', 'Administrador::eliminarPaciente');
$routes->get('/administrador/agregarPacientes', 'Administrador::agregarPacientes');
//-----------------------------------------------------------------------------------------
$routes->get('/administrador/administrarMedicos', 'Administrador::administrarMedicos');

//-----------------------------------------------------------------------------------------
$routes->get('/administrador/administrarMedicamentos', 'Administrador::administrarMedicamentos');
$routes->get('/administrador/buscarMedicamentos', 'Administrador::buscarMedicamentos');
$routes->get('/administrador/editarMedicamento', 'Administrador::editarMedicamento');
$routes->get('/administrador/eliminarMedicamento', 'Administrador::eliminarMedicamento');
$routes->get('/administrador/agregarMedicamentos', 'Administrador::agregarMedicamentos');
