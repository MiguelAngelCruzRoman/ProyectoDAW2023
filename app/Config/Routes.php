<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/', 'Home::index');
$routes->get('/cerrarSesion', 'Home::cerrarSesion');
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

$routes->get('/administrador/consultas/agregarMedicoConsulta', 'Administrador::agregarMedicoConsulta');
$routes->get('/administrador/consultas/agregarMedicoConsulta/buscar', 'Administrador::agregarMedicoConsultaBuscar');
$routes->get('/administrador/consultas/agregarPacienteConsulta/(:num)', 'Administrador::agregarPacienteConsulta/$1');
$routes->post('/administrador/consultas/agregarPacienteConsulta/(:num)', 'Administrador::agregarPacienteConsulta/$1');
$routes->get('/administrador/consultas/agregarPacienteConsulta/buscar/(:num)', 'Administrador::agregarPacienteConsultaBuscar/$1');
$routes->post('/administrador/consultas/agregarConsulta/(:num)', 'Administrador::agregarConsulta/$1');
$routes->get('/administrador/consultas/agregarInformacionConsulta', 'Administrador::agregarInformaciónConsulta');
$routes->post('/administrador/consultas/agregarConsulta/insert', 'Administrador::insertConsulta');


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
$routes->get('/medico/pacientes/administrarPacientes', 'Medico::administrarPacientes');
$routes->get('/medico/pacientes/administrarPacientes/buscar', 'Medico::buscarPacientes');

$routes->get('/medico/pacientes/sabermasPaciente/(:num)', 'Medico::pacienteSaberMas/$1');


//---------------------------------------------------------------------------------------------------------
//                             Rutas para manejar consultas como médico
//---------------------------------------------------------------------------------------------------------
$routes->get('/medico/consultas/administrarConsultas', 'Medico::administrarConsultas');

$routes->get('/medico/consultas/posponerConsulta/(:num)', 'Medico::posponerConsulta/$1');

$routes->get('/medico/consultas/realizarConsulta/formulario/(:num)', 'Medico::realizarConsultaFormulario/$1');
$routes->get('/medico/consultas/completarConsulta/(:num)', 'Medico::completarConsulta/$1');
$routes->post('/medico/consultas/realizarConsulta/(:num)', 'Medico::realizarConsulta/$1');

$routes->get('/medico/consultas/sabermasConsulta/(:num)', 'Medico::consultaSaberMas/$1');

//---------------------------------------------------------------------------------------------------------
//                             Rutas para manejar medicamentos como médico
//---------------------------------------------------------------------------------------------------------
$routes->get('/medico/medicamento/sabermasMedicamento/(:num)', 'Medico::medicamentoSaberMas/$1');
//---------------------------------------------------------------------------------------------------------
//                             Rutas para manejar recetas como médico
//---------------------------------------------------------------------------------------------------------
$routes->get('/medico/recetas/administrarRecetas', 'Medico::administrarRecetas');

$routes->get('/medico/recetas/cancelarReceta/(:num)', 'Medico::cancelarReceta/$1');
$routes->get('/medico/recetas/renovarReceta/(:num)', 'Medico::renovarReceta/$1');

$routes->get('/medico/recetas/sabermasReceta/(:num)', 'Medico::recetaSaberMas/$1');
//---------------------------------------------------------------------------------------------------------












//---------------------------------------------------------------------------------------------------------
//                                          Rutas para Pacientes
//---------------------------------------------------------------------------------------------------------
$routes->get('/paciente', 'Paciente::opciones');
//---------------------------------------------------------------------------------------------------------
//                             Rutas para manejar médicos como paciente
//---------------------------------------------------------------------------------------------------------
$routes->get('/paciente/medicos/administrarMedicos', 'Paciente::administrarMedicos');
$routes->get('/paciente/medicos/administrarMedicos/buscar', 'Paciente::buscarMedico');

$routes->get('/paciente/medicos/sabermasMedico/(:num)', 'Paciente::medicoSaberMas/$1');


//---------------------------------------------------------------------------------------------------------
//                             Rutas para manejar consultas como paciente
//---------------------------------------------------------------------------------------------------------
$routes->get('/paciente/consultas/administrarConsultas', 'Paciente::administrarConsultas');

$routes->get('/paciente/consultas/posponerConsulta/(:num)', 'Paciente::posponerConsulta/$1');

$routes->post('/paciente/consultas/agregarConsulta/(:num)', 'Paciente::agregarConsulta/$1');
$routes->get('/paciente/consultas/agregarConsulta/(:num)', 'Paciente::agregarConsulta/$1');
$routes->get('/paciente/consultas/agregarInformacionConsulta', 'Paciente::agregarInformaciónConsulta');
$routes->post('/paciente/consultas/agregarConsulta/insert', 'Paciente::insertConsulta');

$routes->get('/paciente/consultas/sabermasConsulta/(:num)', 'Paciente::consultaSaberMas/$1');

//---------------------------------------------------------------------------------------------------------
//                             Rutas para manejar medicamentos como paciente
//---------------------------------------------------------------------------------------------------------
$routes->get('/paciente/medicamento/sabermasMedicamento/(:num)', 'Paciente::medicamentoSaberMas/$1');
//---------------------------------------------------------------------------------------------------------
//                             Rutas para manejar recetas como paciente
//---------------------------------------------------------------------------------------------------------
$routes->get('/paciente/recetas/administrarRecetas', 'Paciente::administrarRecetas');

$routes->get('/paciente/recetas/sabermasReceta/(:num)', 'Paciente::recetaSaberMas/$1');