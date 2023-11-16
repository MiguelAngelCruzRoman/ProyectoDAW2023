<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Administrador extends BaseController
{
    public function index()
    {

    }

    public function opciones()
    {
        return view('common/head') .
            view('common/menu') .
            view('administrador/opciones') .
            view('common/footer');
    }



    //Sección para pacientes
    public function administrarPacientes()
    {
        $userInfoModel = model('UserInfoModel');
        $data['usersInfo'] = $userInfoModel->findAll();

        $usersModel = model('UsersModel');
        $data['users'] = $usersModel->findAll();

        return view('common/head') .
            view('common/menu') .
            view('administrador/administrarPacientes', $data) .
            view('common/footer');
    }

    public function buscarPacientes()
    {

        $userInfoModel = model('UserInfoModel');
        $usersModel = model('UsersModel');

        if (isset($_GET['columnaBusquedaPaciente']) && isset($_GET['valIngresado'])) {
            $columnaBusquedaPaciente = $_GET['columnaBusquedaPaciente'];
            $valIngresado = $_GET['valIngresado'];

            if ($columnaBusquedaPaciente == 'nombre') {
                $data['usersInfo'] = $userInfoModel->like('primerNombre', $valIngresado)
                    ->orlike('segundoNombre', $valIngresado)
                    ->orlike('apellidoPaterno', $valIngresado)
                    ->orlike('apellidoMaterno', $valIngresado)
                    ->findAll();
                $data['users'] = $usersModel->findAll();
            }

            if ($columnaBusquedaPaciente == 'telefono') {
                $data['usersInfo'] = $userInfoModel->like('telefono', $valIngresado)
                    ->findAll();
                $data['users'] = $usersModel->findAll();
            }

            if ($columnaBusquedaPaciente == 'todo') {
                $data['usersInfo'] = $userInfoModel->findAll();
                $data['users'] = $usersModel->findAll();
            }

            if ($columnaBusquedaPaciente == 'username') {
                $data['usersInfo'] = $userInfoModel->findAll();
                $data['users'] = $usersModel->like('username', $valIngresado)
                    ->findAll();
            }

            if ($columnaBusquedaPaciente == 'correo') {
                $data['usersInfo'] = $userInfoModel->findAll();
                $data['users'] = $usersModel->like('correo', $valIngresado)
                    ->findAll();
            }
        } else {
            $columnaBusquedaPaciente = "";
            $valIngresado = "";
            $data['usersInfo'] = $userInfoModel->findAll();
            $data['users'] = $usersModel->findAll();
        }


        return view('common/head') .
            view('common/menu') .
            view('administrador/administrarPacientes', $data) .
            view('common/footer');
    }

    public function pacienteSaberMas($id)
    {
        $userInfoModel = model('UserInfoModel');
        $userModel = model('UsersModel');
        $direccionModel = model('DireccionModel');
        $pacienteModel = model('PacienteModel');

        $data['u'] = $userModel->where('paciente', $id)->findAll();

        $data['ui'] = $userInfoModel->where('id', ($data['u'][0]->id))->findAll();

        $data['d'] = $direccionModel->where('userinfo', $id)->findAll();

        $data['paciente'] = $pacienteModel->find($id);

        $data['id'] = $id;

        return view('common/head') .
            view('common/menu') .
            view('administrador/sabermasPaciente', $data) .
            view('common/footer');
    }

    public function agregarPacientes()
    {
        return view('common/head') .
            view('common/menu') .
            view('administrador/agregarPacientes') .
            view('common/footer');
    }

    public function agregarPacientes2()
    {

        $data = [
            "primerNombre" => $_POST['primerNombre'],
            "segundoNombre" => $_POST['segundoNombre'],
            "apellidoPaterno" => $_POST['apellidoPaterno'],
            "apellidoMaterno" => $_POST['apellidoMaterno'],
            "genero" => $_POST['genero'],
            "telefono" => $_POST['telefono'],
            "CURP" => $_POST['CURP'],
            "correo" => $_POST['correo'],
            "username" => $_POST['username'],
            "contraseña" => $_POST['contraseña'],
            "foto" => $_POST['foto'],
        ];

        return view('common/head') .
            view('common/menu') .
            view('administrador/agregarPacientes2', $data) .
            view('common/footer');
    }

    public function agregarPacientes3()
    {
        $data = [
            "primerNombre" => $_POST['primerNombre'],
            "segundoNombre" => $_POST['segundoNombre'],
            "apellidoPaterno" => $_POST['apellidoPaterno'],
            "apellidoMaterno" => $_POST['apellidoMaterno'],
            "genero" => $_POST['genero'],
            "telefono" => $_POST['telefono'],
            "CURP" => $_POST['CURP'],
            "correo" => $_POST['correo'],
            "username" => $_POST['username'],
            "contraseña" => $_POST['contraseña'],
            "foto" => $_POST['foto'],
            "statusSeguro" => $_POST['statusSeguro'],
            "sangre" => $_POST['sangre'],
            "alergia" => $_POST['alergia'],
            "fechaChequeo" => $_POST['fechaChequeo'],
            "motivoConsulta" => $_POST['motivoConsulta'],
            "habitosToxicos" => $_POST['habitosToxicos'],
            "condicionesPrevias" => $_POST['condicionesPrevias'],
        ];

        return view('common/head') .
            view('common/menu') .
            view('administrador/agregarPacientes3', $data) .
            view('common/footer');
    }

    public function insertPacientes()
    {
        $pacienteModel = model('PacienteModel');
        $dataP = [
            "CURP" => $_POST['CURP'],
            "statusSeguro" => $_POST['statusSeguro'],
            "tipoSangre" => $_POST['sangre'],
            "alergia" => $_POST['alergia'],
            "fechaRevision" => $_POST['fechaChequeo'],
            "motivoRevision" => $_POST['motivoConsulta'],
            "habitoToxico" => $_POST['habitosToxicos'],
            "condicionesPrevias" => $_POST['condicionesPrevias'],
            "created_at" => date('d-m-Y')
        ];
        $pacienteModel->insert($dataP);

        $usersModel = model('UsersModel');
        $dataU = [
            "correo" => $_POST['correo'],
            "username" => $_POST['username'],
            "password" => $_POST['contraseña'],
            "paciente" => $pacienteModel->getInsertID(),
            "created_at" => date('d-m-Y')
        ];
        $usersModel->insert($dataU);

        $userInfoModel = model('UserInfoModel');
        $dataUI = [
            "id" => $usersModel->getInsertID(),
            "primerNombre" => $_POST['primerNombre'],
            "segundoNombre" => $_POST['segundoNombre'],
            "apellidoPaterno" => $_POST['apellidoPaterno'],
            "apellidoMaterno" => $_POST['apellidoMaterno'],
            "genero" => $_POST['genero'],
            "telefono" => $_POST['telefono'],
            "foto" => $_POST['foto'],
            "created_at" => date('d-m-Y')
        ];
        $userInfoModel->insert($dataUI);

        $direccionModel = model('DireccionModel');
        $dataD = [
            "estado" => $_POST['estado'],
            "municipio" => $_POST['municipio'],
            "colonia" => $_POST['colonia'],
            "calle" => $_POST['calle'],
            "noInt" => $_POST['noInt'],
            "noExt" => $_POST['noExt'],
            "CP" => $_POST['CP'],
            "tipo" => $_POST['tipo'],
            "userinfo" => $usersModel->getInsertID(),
            "created_at" => date('d-m-Y')
        ];
        $direccionModel->insert($dataD);

        return redirect('administrador/administrarPacientes', 'refresh');
    }

    public function editarPaciente($id)
    {
        $userInfoModel = model('UserInfoModel');
        $data['usersInfo'] = $userInfoModel->find($id);

        $usersModel = model('UsersModel');
        $data['users'] = $usersModel->find($id);

        $idP = $usersModel->select('paciente')->find($id)->paciente;
        $pacienteModel = model('PacienteModel');
        $data['paciente'] = $pacienteModel->find($idP);

        return view('common/head') .
            view('common/menu') .
            view('administrador/editarPaciente', $data) .
            view('common/footer');
    }

    public function editarPaciente2($id)
    {
        $pacienteModel = model('PacienteModel');

        $data = [
            "id" => $_POST['id'],
            "primerNombre" => $_POST['primerNombre'],
            "segundoNombre" => $_POST['segundoNombre'],
            "apellidoPaterno" => $_POST['apellidoPaterno'],
            "apellidoMaterno" => $_POST['apellidoMaterno'],
            "genero" => $_POST['genero'],
            "telefono" => $_POST['telefono'],
            "CURP" => $_POST['CURP'],
            "correo" => $_POST['correo'],
            "username" => $_POST['username'],
            "contraseña" => $_POST['contraseña'],
            "foto" => $_POST['foto'],
            "paciente" => $pacienteModel->find($id)
        ];

        return view('common/head') .
            view('common/menu') .
            view('administrador/editarPaciente2', $data) .
            view('common/footer');
    }


    public function editarPaciente3($id)
    {
        $pacienteModel = model('PacienteModel');
        $direccionModel = model('DireccionModel');
        $data = [
            "id" => $id,
            "primerNombre" => $_POST['primerNombre'],
            "segundoNombre" => $_POST['segundoNombre'],
            "apellidoPaterno" => $_POST['apellidoPaterno'],
            "apellidoMaterno" => $_POST['apellidoMaterno'],
            "genero" => $_POST['genero'],
            "telefono" => $_POST['telefono'],
            "CURP" => $_POST['CURP'],
            "correo" => $_POST['correo'],
            "username" => $_POST['username'],
            "contraseña" => $_POST['contraseña'],
            "foto" => $_POST['foto'],
            "paciente" => $pacienteModel->find($id),
            "sangre" => $_POST['sangre'],
            "alergia" => $_POST['alergia'],
            "fechaRevision" => $_POST['fechaRevision'],
            "motivoRevision" => $_POST['motivoRevision'],
            "direccion" => $direccionModel->where('userinfo', $id)->findAll(),
            "seguro" => $_POST['seguro'],
            "habitosToxicos" => $_POST['habitosToxicos'],
            "condicionesPrevias" => $_POST['condicionesPrevias'],
        ];

        return view('common/head') .
            view('common/menu') .
            view('administrador/editarPaciente3', $data) .
            view('common/footer');
    }

    public function pacienteUpdate()
    {
        $userInfoModel = model('UserInfoModel');

        $usersModel = model('UsersModel');

        $pacienteModel = model('PacienteModel');

        $direccionModel = model('DireccionModel');

        //print($direccionModel->select('userInfo')->find($_POST['id'])->userInfo);
        $data = array(
            "CURP" => $_POST['CURP'],
            "statusSeguro" => $_POST['seguro'],
            "tipoSangre" => $_POST['sangre'],
            "alergia" => $_POST['alergia'],
            "fechaRevision" => $_POST['fechaRevision'],
            "motivoRevision" => $_POST['motivoRevision'],
        );
        $pacienteModel->update(($usersModel->select('paciente')->find($_POST['id'])->paciente), $data);

        $data = array(
            "correo" => $_POST['correo'],
            "password" => $_POST['contraseña'],
        );
        $usersModel->update($_POST['id'], $data);


        $data = array(
            "primerNombre" => $_POST['primerNombre'],
            "segundoNombre" => $_POST['segundoNombre'],
            "apellidoPaterno" => $_POST['apellidoPaterno'],
            "apellidoMaterno" => $_POST['apellidoMaterno'],
            "telefono" => $_POST['telefono'],
        );
        $userInfoModel->update($_POST['id'], $data);


        $data = array(
            "estado" => $_POST['estado'],
            "municipio" => $_POST['municipio'],
            "colonia" => $_POST['colonia'],
            "calle" => $_POST['calle'],
            "noExt" => $_POST['noExt'],
            "noInt" => $_POST['noInt'],
            "CP" => $_POST['CP'],
            "tipo" => $_POST['tipo'],
        );
        $direccionModel->update($direccionModel->select('userInfo')->find($_POST['id'])->userInfo, $data);

        return redirect('administrador/administrarPacientes', 'refresh');
    }


    public function eliminarPaciente($id)
    {
        $direccionModel = model('DireccionModel');
        $direccionModel->delete(['userinfo' => $id]);

        $userInfoModel = model('UserInfoModel');
        $userInfoModel->delete($id);

        $usersModel = model('UsersModel');
        $usersModel->delete($id);

        $pacienteModel = model('PacienteModel');
        $pacienteModel->delete(['paciente' => $id]);


        return redirect('administrador/administrarPacientes', 'refresh');
    }




    //Sección para médicos
    public function administrarMedicos()
    {
        $userInfoModel = model('UserInfoModel');
        $data['usersInfo'] = $userInfoModel->findAll();

        $usersModel = model('UsersModel');
        $data['users'] = $usersModel->findAll();

        $medicoModel = model('MedicoModel');
        $data['medicos'] = $medicoModel->findAll();

        return view('common/head') .
            view('common/menu') .
            view('administrador/administrarMedicos', $data) .
            view('common/footer');
    }

    public function buscarMedicos()
    {
        $userInfoModel = model('UserInfoModel');

        $usersModel = model('UsersModel');

        $medicoModel = model('MedicoModel');

        if (isset($_GET['columnaBusquedaMedicos']) && isset($_GET['valIngresado'])) {
            $columnaBusquedaMedicos = $_GET['columnaBusquedaMedicos'];
            $valIngresado = $_GET['valIngresado'];

            if ($columnaBusquedaMedicos == 'nombre') {
                $data['usersInfo'] = $userInfoModel->like('primerNombre', $valIngresado)
                    ->orlike('segundoNombre', $valIngresado)
                    ->orlike('apellidoPaterno', $valIngresado)
                    ->orlike('apellidoMaterno', $valIngresado)
                    ->findAll();
                $data['users'] = $usersModel->findAll();
                $data['medicos'] = $medicoModel->findAll();
            }

            if ($columnaBusquedaMedicos == 'especialidad') {
                $data['medicos'] = $medicoModel->like('especialidad', $valIngresado)
                    ->findAll();
                $data['users'] = $usersModel->findAll();
                $data['usersInfo'] = $userInfoModel->findAll();
            }

            if ($columnaBusquedaMedicos == 'turno') {
                $data['medicos'] = $medicoModel->like('turno', $valIngresado)
                    ->findAll();
                $data['users'] = $usersModel->findAll();
                $data['usersInfo'] = $userInfoModel->findAll();
            }

            if ($columnaBusquedaMedicos == 'diasLaborales') {
                $data['medicos'] = $medicoModel->like('diasLaborales', $valIngresado)
                    ->findAll();
                $data['users'] = $usersModel->findAll();
                $data['usersInfo'] = $userInfoModel->findAll();
            }

            if ($columnaBusquedaMedicos == 'todo') {
                $data['medicos'] = $medicoModel->findAll();
                $data['users'] = $usersModel->findAll();
                $data['usersInfo'] = $userInfoModel->findAll();
            }


        } else {
            $columnaBusquedaMedicos = "";
            $valIngresado = "";
            $data['usersInfo'] = $userInfoModel->findAll();
            $data['users'] = $usersModel->findAll();
            $data['medicos'] = $medicoModel->findAll();
        }

        return view('common/head') .
            view('common/menu') .
            view('administrador/administrarMedicos', $data) .
            view('common/footer');
    }


    public function medicoSaberMas($id)
    {
        $userInfoModel = model('UserInfoModel');
        $userModel = model('UsersModel');
        $direccionModel = model('DireccionModel');
        $medicoModel = model('MedicoModel');

        $data['u'] = $userModel->where('medico', $id)->findAll();

        $data['ui'] = $userInfoModel->where('id', ($data['u'][0]->id))->findAll();

        $data['d'] = $direccionModel->where('userinfo', $id)->findAll();

        $data['medico'] = $medicoModel->find($id);

        $data['id'] = $id;

        return view('common/head') .
            view('common/menu') .
            view('administrador/sabermasMedico', $data) .
            view('common/footer');
    }



    public function editarMedico($id)
    {
        $userInfoModel = model('UserInfoModel');
        $data['usersInfo'] = $userInfoModel->find($id);

        $usersModel = model('UsersModel');
        $data['users'] = $usersModel->find($id);

        $idM = $usersModel->select('medico')->find($id)->medico;
        $medicosModel = model('MedicoModel');
        $data['medico'] = $medicosModel->find($idM);

        return view('common/head') .
            view('common/menu') .
            view('administrador/editarMedico', $data) .
            view('common/footer');
    }

    public function editarMedico2($id)
    {
        $direccionModel = model('DireccionModel');
        $data = [
            "primerNombre" => $_POST['primerNombre'],
            "segundoNombre" => $_POST['segundoNombre'],
            "apellidoPaterno" => $_POST['apellidoPaterno'],
            "apellidoMaterno" => $_POST['apellidoMaterno'],
            "genero" => $_POST['genero'],
            "telefono" => $_POST['telefono'],
            "correo" => $_POST['correo'],
            "username" => $_POST['username'],
            "password" => $_POST['password'],
            "foto" => $_POST['foto'],
            "especialidad" => $_POST['especialidad'],
            "diasLaborales" => $_POST['diasLaborales'],
            "turno" => $_POST['turno'],
            "id" => $id,
            "direccion" => $direccionModel->where('userinfo', $id)->findAll(),
        ];

        return view('common/head') .
            view('common/menu') .
            view('administrador/editarMedico2', $data) .
            view('common/footer');
    }

    public function medicoUpdate()
    {
        $medicosModel = model('MedicoModel');
        $usersModel = model('UsersModel');
        $userInfoModel = model('UserInfoModel');
        $direccionModel = model('DireccionModel');

        $dataM = [
            "especialidad" => $_POST['especialidad'],
            "diasLaborales" => $_POST['diasLaborales'],
            "turno" => $_POST['turno'],
            "created_at" => date('d-m-Y')
        ];
        $medicosModel->update(($usersModel->select('medico')->find($_POST['id'])->medico), $dataM);

        $dataU = [
            "correo" => $_POST['correo'],
            "username" => $_POST['username'],
            "password" => $_POST['password'],
            "medico" => $medicosModel->getInsertID(),
            "created_at" => date('d-m-Y')
        ];
        $usersModel->update($_POST['id'], $dataU);

        $dataUI = [
            "id" => $usersModel->getInsertID(),
            "primerNombre" => $_POST['primerNombre'],
            "segundoNombre" => $_POST['segundoNombre'],
            "apellidoPaterno" => $_POST['apellidoPaterno'],
            "apellidoMaterno" => $_POST['apellidoMaterno'],
            "genero" => $_POST['genero'],
            "telefono" => $_POST['telefono'],
            "foto" => $_POST['foto'],
            "created_at" => date('d-m-Y')
        ];
        $userInfoModel->update($_POST['id'], $dataUI);

        $dataD = [
            "estado" => $_POST['estado'],
            "municipio" => $_POST['municipio'],
            "colonia" => $_POST['colonia'],
            "calle" => $_POST['calle'],
            "noInt" => $_POST['noInt'],
            "noExt" => $_POST['noExt'],
            "CP" => $_POST['CP'],
            "tipo" => $_POST['tipo'],
            "userinfo" => $usersModel->getInsertID(),
            "created_at" => date('d-m-Y')
        ];
        $direccionModel->update($direccionModel->select('userInfo')->find($_POST['id'])->userInfo, $dataD);

        return redirect('administrador/administrarMedicos', 'refresh');
    }

    public function eliminarMedico($id)
    {
        $direccionModel = model('DireccionModel');
        $direccionModel->delete(['userinfo' => $id]);

        $userInfoModel = model('UserInfoModel');
        $userInfoModel->delete($id);

        $usersModel = model('UsersModel');
        $usersModel->delete($id);

        $medicoModel = model('MedicoModel');
        $medicoModel->delete(['medico' => $id]);

        return redirect('administrador/administrarMedicos', 'refresh');
    }

    public function agregarMedicos()
    {

        return view('common/head') .
            view('common/menu') .
            view('administrador/agregarMedicos') .
            view('common/footer');
    }

    public function agregarMedicos2()
    {
        $data = [
            "primerNombre" => $_POST['primerNombre'],
            "segundoNombre" => $_POST['segundoNombre'],
            "apellidoPaterno" => $_POST['apellidoPaterno'],
            "apellidoMaterno" => $_POST['apellidoMaterno'],
            "genero" => $_POST['genero'],
            "telefono" => $_POST['telefono'],
            "correo" => $_POST['correo'],
            "username" => $_POST['username'],
            "password" => $_POST['password'],
            "foto" => $_POST['foto'],
            "especialidad" => $_POST['especialidad'],
            "diasLaborales" => $_POST['diasLaborales'],
            "turno" => $_POST['turno'],
        ];

        return view('common/head') .
            view('common/menu') .
            view('administrador/agregarMedicos2', $data) .
            view('common/footer');
    }

    public function insertMedicos()
    {
        $medicosModel = model('MedicoModel');
        $dataM = [
            "especialidad" => $_POST['especialidad'],
            "diasLaborales" => $_POST['diasLaborales'],
            "turno" => $_POST['turno'],
            "created_at" => date('d-m-Y')
        ];
        $medicosModel->insert($dataM);

        $usersModel = model('UsersModel');
        $dataU = [
            "correo" => $_POST['correo'],
            "username" => $_POST['username'],
            "password" => $_POST['password'],
            "medico" => $medicosModel->getInsertID(),
            "created_at" => date('d-m-Y')
        ];
        $usersModel->insert($dataU);

        $userInfoModel = model('UserInfoModel');
        $dataUI = [
            "id" => $usersModel->getInsertID(),
            "primerNombre" => $_POST['primerNombre'],
            "segundoNombre" => $_POST['segundoNombre'],
            "apellidoPaterno" => $_POST['apellidoPaterno'],
            "apellidoMaterno" => $_POST['apellidoMaterno'],
            "genero" => $_POST['genero'],
            "telefono" => $_POST['telefono'],
            "foto" => $_POST['foto'],
            "created_at" => date('d-m-Y')
        ];
        $userInfoModel->insert($dataUI);

        $direccionModel = model('DireccionModel');
        $dataD = [
            "estado" => $_POST['estado'],
            "municipio" => $_POST['municipio'],
            "colonia" => $_POST['colonia'],
            "calle" => $_POST['calle'],
            "noInt" => $_POST['noInt'],
            "noExt" => $_POST['noExt'],
            "CP" => $_POST['CP'],
            "tipo" => $_POST['tipo'],
            "userinfo" => $usersModel->getInsertID(),
            "created_at" => date('d-m-Y')
        ];
        $direccionModel->insert($dataD);

        return redirect('administrador/administrarMedicos', 'refresh');
    }


    //Sección para medicamentos
    public function administrarMedicamentos()
    {
        $medicamentosModel = model('MedicamentosModel');
        $data['medicamentos'] = $medicamentosModel->findAll();

        return view('common/head') .
            view('common/menu') .
            view('administrador/administrarMedicamentos', $data) .
            view('common/footer');
    }

    public function buscarMedicamentos()
    {

        $medicamentosModel = model('MedicamentosModel');


        if (isset($_GET['columnaBusquedaMedicamento']) && isset($_GET['valIngresado'])) {
            $columnaBusquedaMedicamento = $_GET['columnaBusquedaMedicamento'];
            $valIngresado = $_GET['valIngresado'];

            if ($columnaBusquedaMedicamento == 'nombreComercial') {
                $data['medicamentos'] = $medicamentosModel->like('nombreComercial', $valIngresado)
                    ->findAll();
            }

            if ($columnaBusquedaMedicamento == 'nombreCientifico') {
                $data['medicamentos'] = $medicamentosModel->like('nombreCinetifico', $valIngresado)
                    ->findAll();
            }

            if ($columnaBusquedaMedicamento == 'forma') {
                $data['medicamentos'] = $medicamentosModel->like('formaFarmaceutica', $valIngresado)
                    ->findAll();
            }


            if ($columnaBusquedaMedicamento == 'todo') {
                $data['medicamentos'] = $medicamentosModel->findAll();
            }


        } else {
            $columnaBusquedaMedicamento = "";
            $valIngresado = "";
            $data['medicamentos'] = $medicamentosModel->findAll();
        }

        return view('common/head') .
            view('common/menu') .
            view('administrador/administrarMedicamentos', $data) .
            view('common/footer');
    }

    public function medicamentoSaberMas($id)
    {
        $medicamentosModel = model('MedicamentosModel');
        $data['medicamento'] = $medicamentosModel->find($id);

        return view('common/head') .
            view('common/menu') .
            view('administrador/sabermasMedicamento', $data) .
            view('common/footer');
    }

    public function editarMedicamento($id)
    {
        $medicamentosModel = model('MedicamentosModel');
        $data['medicamento'] = $medicamentosModel->find($id);

        return view('common/head') .
            view('common/menu') .
            view('administrador/editarMedicamento', $data) .
            view('common/footer');
    }

    public function updateMedicamento()
    {
        $medicamentosModel = model('MedicamentosModel');

        $data = [
            "nombreComercial" => $_POST['nombreComercial'],
            "nombreCinetifico" => $_POST['nombreCinetifico'],
            "formaFarmaceutica" => $_POST['formaFarmaceutica'],
            "dosis" => $_POST['dosis'],
            "fechaCaducidad" => $_POST['fechaCaducidad'],
            "loteFabricacion" => $_POST['loteFabricacion'],
            "version" => $_POST['version'],
            "simbolo" => $_POST['simbolo'],
            "imagenEmpaque" => $_POST['imagenEmpaque'],
            "stock" => $_POST['stock'],
            "updated_at" => time()
        ];

        $medicamentosModel->update($_POST['id'], $data);


        return redirect('administrador/administrarMedicamentos', 'refresh');
    }

    public function eliminarMedicamento($id)
    {
        $medicamentosModel = model('MedicamentosModel');
        $medicamentosModel->delete($id);

        return redirect('administrador/administrarMedicamentos', 'refresh');
    }

    public function agregarMedicamentos()
    {

        return view('common/head') .
            view('common/menu') .
            view('administrador/agregarMedicamentos') .
            view('common/footer');
    }

    public function insertMedicamentos()
    {
        $medicamentosModel = model('MedicamentosModel');

        $data = [
            "nombreComercial" => $_POST['nombreComercial'],
            "nombreCinetifico" => $_POST['nombreCinetifico'],
            "formaFarmaceutica" => $_POST['formaFarmaceutica'],
            "dosis" => $_POST['dosis'],
            "fechaCaducidad" => $_POST['fechaCaducidad'],
            "loteFabricacion" => $_POST['loteFabricacion'],
            "version" => $_POST['version'],
            "simbolo" => $_POST['simbolo'],
            "imagenEmpaque" => $_POST['imagenEmpaque'],
            "stock" => $_POST['stock'],
            "created_at" => time()
        ];


        $medicamentosModel->insert($data, false);

        return redirect('administrador/administrarPacientes', 'refresh');
    }
}

