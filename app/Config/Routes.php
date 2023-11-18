<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/', 'Home::index');
//---------------------------------------------------------------------------------------------------------
//                                          Rutas para administrador
//---------------------------------------------------------------------------------------------------------
$routes->get('/administrador', 'Administrador::opciones');


//---------------------------------------------------------------------------------------------------------
//                             Rutas para manejar pacientes como administrador
//---------------------------------------------------------------------------------------------------------
$routes->get('/administrador/pacientes/administrarPacientes', 'Administrador::administrarPacientes');

$routes->get('/administrador/pacientes/buscarPacientes', 'Administrador::buscarPacientes');

$routes->get('/administrador/pacientes/sabermasPaciente/(:num)', 'Administrador::pacienteSaberMas/$1');

$routes->get('/administrador/pacientes/editarPaciente/(:num)', 'Administrador::editarPaciente/$1');
$routes->post('/administrador/pacientes/editarPacienteDatosMedicos/(:num)', 'Administrador::editarPacienteDatosMedicos/$1');
$routes->get('/administrador/pacientes/editarPacienteDatosMedicos/(:num)', 'Administrador::editarPacienteDatosMedicos/$1');
$routes->get('/administrador/pacientes/editarPacienteDireccion/(:num)', 'Administrador::editarPacienteDireccion/$1');
$routes->post('/administrador/pacientes/editarPacienteDireccion/(:num)', 'Administrador::editarPacienteDireccion/$1');
$routes->post('/administrador/pacientes/editarPaciente/update','Administrador::pacienteUpdate');

$routes->get('/administrador/pacientes/eliminarPaciente/(:num)', 'Administrador::eliminarPaciente/$1');

$routes->get('/administrador/pacientes/agregarPacientes', 'Administrador::agregarPacientes');
$routes->get('/administrador/pacientes/agregarPacientesDatosMedicos', 'Administrador::agregarPacientesDatosMedicos');
$routes->post('/administrador/pacientes/agregarPacientesDatosMedicos', 'Administrador::agregarPacientesDatosMedicos');
$routes->get('/administrador/pacientes/agregarPacientesDireccion', 'Administrador::agregarPacientesDireccion');
$routes->post('/administrador/pacientes/agregarPacientesDireccion', 'Administrador::agregarPacientesDireccion');
$routes->post('/administrador/pacientes/agregarPacientes/insert', 'Administrador::insertPacientes');



//---------------------------------------------------------------------------------------------------------
//                             Rutas para manejar médicos como administrador
//---------------------------------------------------------------------------------------------------------
$routes->get('/administrador/medicos/administrarMedicos', 'Administrador::administrarMedicos');

$routes->get('/administrador/medicos/buscarMedicos', 'Administrador::buscarMedicos');

$routes->get('/administrador/medicos/sabermasMedico/(:num)', 'Administrador::medicoSaberMas/$1');

$routes->get('/administrador/medicos/editarMedico/(:num)', 'Administrador::editarMedico/$1');
$routes->get('/administrador/medicos/editarMedicoDireccion/(:num)', 'Administrador::editarMedicoDireccion/$1');
$routes->post('/administrador/medicos/editarMedicoDireccion/(:num)', 'Administrador::editarMedicoDireccion/$1');
$routes->post('/administrador/medicos/editarMedico/update', 'Administrador::medicoUpdate');

$routes->get('/administrador/medicos/eliminarMedico/(:num)', 'Administrador::eliminarMedico/$1');

$routes->get('/administrador/medicos/agregarMedicos', 'Administrador::agregarMedicos');
$routes->get('/administrador/medicos/agregarMedicosDireccion', 'Administrador::agregarMedicosDireccion');
$routes->post('/administrador/medicos/agregarMedicosDireccion', 'Administrador::agregarMedicosDireccion');
$routes->post('/administrador/medicos/agregarMedicos/insert', 'Administrador::insertMedicos');




//---------------------------------------------------------------------------------------------------------
//                             Rutas para manejar medicamentos como administrador
//---------------------------------------------------------------------------------------------------------
$routes->get('/administrador/medicamentos/administrarMedicamentos', 'Administrador::administrarMedicamentos');

$routes->get('/administrador/medicamentos/buscarMedicamentos', 'Administrador::buscarMedicamentos');

$routes->get('/administrador/medicamentos/sabermasMedicamento/(:num)', 'Administrador::medicamentoSaberMas/$1');

$routes->get('/administrador/medicamentos/editarMedicamento/(:num)', 'Administrador::editarMedicamento/$1');
$routes->post('/administrador/medicamentos/editarMedicamento/(:num)', 'Administrador::editarMedicamento/$1');
$routes->post('/administrador/medicamentos/editarMedicamento/update', 'Administrador::updateMedicamento');

$routes->get('/administrador/medicamentos/eliminarMedicamento/(:num)', 'Administrador::eliminarMedicamento/$1');

$routes->get('/administrador/medicamentos/agregarMedicamentos', 'Administrador::agregarMedicamentos');
$routes->post('/administrador/medicamentos/agregarMedicamentos', 'Administrador::agregarMedicamentos');
$routes->post('/administrador/medicamentos/agregarMedicamentos/insert', 'Administrador::insertMedicamentos');


//---------------------------------------------------------------------------------------------------------
//                             Rutas para manejar recetas como administrador
//---------------------------------------------------------------------------------------------------------
$routes->get('/administrador/recetas/administrarRecetas', 'Administrador::administrarRecetas');

$routes->get('/administrador/recetas/cancelarReceta/(:num)', 'Administrador::cancelarReceta/$1');
$routes->get('/administrador/recetas/renovarReceta/(:num)', 'Administrador::renovarReceta/$1');

$routes->get('/administrador/recetas/sabermasReceta/(:num)', 'Administrador::recetaSaberMas/$1');





//---------------------------------------------------------------------------------------------------------
//                             Rutas para manejar consultas como administrador
//---------------------------------------------------------------------------------------------------------
$routes->get('/administrador/consultas/administrarConsultas', 'Administrador::administrarConsultas');
$routes->get('/administrador/consultas/buscarConsultas', 'Administrador::buscarConsultas');

$routes->get('/administrador/consultas/realizarConsulta/(:num)', 'Administrador::realizarConsulta/$1');

$routes->get('/administrador/consultas/posponerConsulta/(:num)', 'Administrador::posponerConsulta/$1');

$routes->get('/administrador/consultas/sabermasConsulta/(:num)', 'Administrador::consultaSaberMas/$1');

//---------------------------------------------------------------------------------------------------------








//---------------------------------------------------------------------------------------------------------
//                                          Rutas para Médicos
//---------------------------------------------------------------------------------------------------------
$routes->get('/medico', 'Medico::opciones');


//---------------------------------------------------------------------------------------------------------
//                             Rutas para manejar pacientes como médico
//---------------------------------------------------------------------------------------------------------
$routes->get('/medico/administrarPacientes', 'Medico::administrarPacientes');

$routes->get('/medico/buscarPacientes', 'Medico::buscarPacientes');
$routes->get('/medico/buscarPacientesAgregar', 'Medico::buscarPacientesAgregar');
$routes->get('/medico/buscarPacientesEliminar', 'Medico::buscarPacientesEliminar');

$routes->get('/medico/agregarPacientes', 'Medico::agregarPacientes');


$routes->get('/medico/eliminarPaciente', 'Medico::eliminarPaciente');



//---------------------------------------------------------------------------------------------------------
//                             Rutas para manejar consultas como médico
//---------------------------------------------------------------------------------------------------------
$routes->get('/medico/administrarConsultas', 'Medico::administrarConsultas');

$routes->get('/medico/agregarConsulta', 'Medico::agregarConsulta');

$routes->get('/medico/buscarConsulta', 'Medico::buscarConsulta');

$routes->get('/medico/editarConsulta', 'Medico::editarConsulta');

$routes->get('/medico/agregarMedicamentoConsulta', 'Medico::agregarMedicamentoConsulta');

$routes->get('/medico/eliminarMedicamentoConsulta', 'Medico::eliminarMedicamentoConsulta');

$routes->get('/medico/agregarEstudiosConsulta', 'Medico::agregarEstudiosConsulta');

$routes->get('/medico/eliminarEstudioConsulta', 'Medico::eliminarEstudioConsulta');



//---------------------------------------------------------------------------------------------------------
//                             Rutas para manejar recetas como médico
//---------------------------------------------------------------------------------------------------------
$routes->get('/medico/administrarRecetas', 'Medico::administrarRecetas');

//---------------------------------------------------------------------------------------------------------
//                        Rutas para manejar estudios médicos como médico
//---------------------------------------------------------------------------------------------------------
$routes->get('/medico/administrarEstudiosMedicos', 'Medico::administrarEstudiosMedicos');
//-----------------------------------------------------------------------------------------




//---------------------------------------------------------------------------------------------------------
//                                       Rutas para Pacientes
//---------------------------------------------------------------------------------------------------------
$routes->get('/paciente', 'Paciente::opciones');
//---------------------------------------------------------------------------------------------------------
//                             Rutas para manejar consultas como paciente
//---------------------------------------------------------------------------------------------------------
$routes->get('/paciente/administrarConsultas', 'Paciente::administrarConsultas');