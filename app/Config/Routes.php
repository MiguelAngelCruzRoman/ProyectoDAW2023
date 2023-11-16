<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/', 'Home::index');

//Administrador-----------------------------------------------------------------------------
$routes->get('/administrador', 'Administrador::opciones');
//-----------------------------------------------------------------------------------------
$routes->get('/administrador/administrarPacientes', 'Administrador::administrarPacientes');

$routes->get('/administrador/buscarPacientes', 'Administrador::buscarPacientes');

$routes->get('/administrador/editarPaciente/(:num)', 'Administrador::editarPaciente/$1');
$routes->post('/administrador/editarPaciente2/(:num)', 'Administrador::editarPaciente2/$1');
$routes->get('/administrador/editarPaciente2/(:num)', 'Administrador::editarPaciente2/$1');
$routes->post('/administrador/editarPaciente2/(:num)', 'Administrador::editarPaciente2/$1');
$routes->get('/administrador/editarPaciente3/(:num)', 'Administrador::editarPaciente3/$1');
$routes->post('/administrador/editarPaciente3/(:num)', 'Administrador::editarPaciente3/$1');
$routes->post('/administrador/editarPaciente/update','Administrador::pacienteUpdate');

$routes->get('/administrador/eliminarPaciente/(:num)', 'Administrador::eliminarPaciente/$1');

$routes->get('/administrador/agregarPacientes', 'Administrador::agregarPacientes');
$routes->get('/administrador/agregarPacientes2', 'Administrador::agregarPacientes2');
$routes->post('/administrador/agregarPacientes2', 'Administrador::agregarPacientes2');
$routes->get('/administrador/agregarPacientes3', 'Administrador::agregarPacientes3');
$routes->post('/administrador/agregarPacientes3', 'Administrador::agregarPacientes3');
$routes->post('/administrador/agregarPacientes/insert', 'Administrador::insertPacientes');
//-----------------------------------------------------------------------------------------
$routes->get('/administrador/administrarMedicos', 'Administrador::administrarMedicos');
$routes->get('/administrador/buscarMedicos', 'Administrador::buscarMedicos');

$routes->get('/administrador/editarMedico/(:num)', 'Administrador::editarMedico/$1');
$routes->get('/administrador/editarMedico2/(:num)', 'Administrador::editarMedico2/$1');
$routes->post('/administrador/editarMedico2/(:num)', 'Administrador::editarMedico2/$1');
$routes->post('/administrador/editarMedico/update', 'Administrador::medicoUpdate');

$routes->get('/administrador/eliminarMedico/(:num)', 'Administrador::eliminarMedico/$1');

$routes->get('/administrador/agregarMedicos', 'Administrador::agregarMedicos');
$routes->get('/administrador/agregarMedicos2', 'Administrador::agregarMedicos2');
$routes->post('/administrador/agregarMedicos2', 'Administrador::agregarMedicos2');
$routes->post('/administrador/agregarMedicos/insert', 'Administrador::insertMedicos');

//-----------------------------------------------------------------------------------------
$routes->get('/administrador/administrarMedicamentos', 'Administrador::administrarMedicamentos');
$routes->get('/administrador/buscarMedicamentos', 'Administrador::buscarMedicamentos');
$routes->get('/administrador/editarMedicamento/(:num)', 'Administrador::editarMedicamento/$1');
$routes->post('/administrador/editarMedicamento/(:num)', 'Administrador::editarMedicamento/$1');
$routes->post('/administrador/editarMedicamento/update', 'Administrador::updateMedicamento');
$routes->get('/administrador/eliminarMedicamento/(:num)', 'Administrador::eliminarMedicamento/$1');
$routes->get('/administrador/agregarMedicamentos', 'Administrador::agregarMedicamentos');
$routes->post('/administrador/agregarMedicamentos', 'Administrador::agregarMedicamentos');
$routes->post('/administrador/agregarMedicamentos/insert', 'Administrador::insertMedicamentos');
//-----------------------------------------------------------------------------------------




//-----------------------------------------------------------------------------------------
//Médicos-----------------------------------------------------------------------------
$routes->get('/medico', 'Medico::opciones');
//-----------------------------------------------------------------------------------------
$routes->get('/medico/administrarPacientes', 'Medico::administrarPacientes');
$routes->get('/medico/buscarPacientes', 'Medico::buscarPacientes');
$routes->get('/medico/agregarPacientes', 'Medico::agregarPacientes');
$routes->get('/medico/buscarPacientesAgregar', 'Medico::buscarPacientesAgregar');
$routes->get('/medico/eliminarPaciente', 'Medico::eliminarPaciente');
$routes->get('/medico/buscarPacientesEliminar', 'Medico::buscarPacientesEliminar');
//-----------------------------------------------------------------------------------------
$routes->get('/medico/administrarConsultas', 'Medico::administrarConsultas');
$routes->get('/medico/buscarConsulta', 'Medico::buscarConsulta');
$routes->get('/medico/editarConsulta', 'Medico::editarConsulta');
$routes->get('/medico/agregarMedicamentoConsulta', 'Medico::agregarMedicamentoConsulta');
$routes->get('/medico/eliminarMedicamentoConsulta', 'Medico::eliminarMedicamentoConsulta');
$routes->get('/medico/agregarEstudiosConsulta', 'Medico::agregarEstudiosConsulta');
$routes->get('/medico/eliminarEstudioConsulta', 'Medico::eliminarEstudioConsulta');
$routes->get('/medico/agregarConsulta', 'Medico::agregarConsulta');
//-----------------------------------------------------------------------------------------
$routes->get('/medico/administrarRecetas', 'Medico::administrarRecetas');
//-----------------------------------------------------------------------------------------
$routes->get('/medico/administrarEstudiosMedicos', 'Medico::administrarEstudiosMedicos');
//-----------------------------------------------------------------------------------------




//-----------------------------------------------------------------------------------------
//Pacientes-----------------------------------------------------------------------------
$routes->get('/paciente', 'Paciente::opciones');
//-----------------------------------------------------------------------------------------
$routes->get('/paciente/administrarConsultas', 'Paciente::administrarConsultas');