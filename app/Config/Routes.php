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
$routes->get('/administrador/buscarMedicos', 'Administrador::buscarMedicos');
$routes->get('/administrador/editarMedico', 'Administrador::editarMedico');
$routes->get('/administrador/editarMedico2', 'Administrador::editarMedico2');
$routes->get('/administrador/eliminarMedico', 'Administrador::eliminarMedico');
$routes->get('/administrador/agregarMedicos', 'Administrador::agregarMedicos');
$routes->get('/administrador/agregarMedicos2', 'Administrador::agregarMedicos2');
//-----------------------------------------------------------------------------------------
$routes->get('/administrador/administrarMedicamentos', 'Administrador::administrarMedicamentos');
$routes->get('/administrador/buscarMedicamentos', 'Administrador::buscarMedicamentos');
$routes->get('/administrador/editarMedicamento', 'Administrador::editarMedicamento');
$routes->get('/administrador/eliminarMedicamento', 'Administrador::eliminarMedicamento');
$routes->get('/administrador/agregarMedicamentos', 'Administrador::agregarMedicamentos');
//-----------------------------------------------------------------------------------------




//-----------------------------------------------------------------------------------------
//Pacientes-----------------------------------------------------------------------------
$routes->get('/medico/index', 'Medico::index');
$routes->get('/medico/opciones', 'Medico::opciones');
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
