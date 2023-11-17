<?php

namespace App\Controllers;

use App\Controllers\BaseController;


// Controlador diseñado para hacer las funcionalidades del rol del Administrador
// Se apoya de las rutas del apartado "Sección de rutas destinada para las funcionalidades del Administrador"
class Administrador extends BaseController
{
    public function index()
    {

    }

    /* 
        Función que redirige a la pantalla principal de las opciones que puede hacer el 
        administrador en el sistem
    */
    public function opciones()
    {
        return view('common/head') .
            view('common/menu') .
            view('administrador/opciones') .
            view('common/footer');
    }


    //---------------------------------------------------------------------------------------------
    //                                     Sección para pacientes
    //---------------------------------------------------------------------------------------------

    /* 
        Función que redirige los datos de usuario, que se encuentran almacenados en los respectivos 
        modelos, que contienen la información de todos los pacientes
    */
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


    /* 
        Función para buscar entre todos los pacientes datos en específico.
        Al terminar de hacer la búsqueda en los respectivos modelos, se redirige
        a la vista de la función "administrarPaciente" 
    */
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

    /* 
        Función para ver toda la información referente a cada usuario paciente.
        Esta función manda a traer un id en específico, mismo que es parte
        de los id que se utilizan para identificar a los usuarios en 
        la función "administrarPaciente"
    */
    public function pacienteSaberMas($id)
    {
        $userInfoModel = model('UserInfoModel');
        $userModel = model('UsersModel');
        $direccionModel = model('DireccionModel');
        $pacienteModel = model('PacienteModel');

        $data['user'] = $userModel->where('paciente', $id)->findAll();

        $data['userinfo'] = $userInfoModel->where('id', ($data['user'][0]->id))->findAll();

        $data['direccion'] = $direccionModel->where('userinfo', $id)->findAll();

        $data['paciente'] = $pacienteModel->find($id);

        $data['id'] = $id;

        return view('common/head') .
            view('common/menu') .
            view('administrador/sabermasPaciente', $data) .
            view('common/footer');
    }

    /* 
        Función que redirige al primer formulario para agregar un paciente 
        a la respectiva tabla de la base de datos. 
        El formulario requiere datos del usuario
    */
    public function agregarPacientes()
    {
        return view('common/head') .
            view('common/menu') .
            view('administrador/agregarPacientes') .
            view('common/footer');
    }

    /*
        Función que redirige al segundo formulario para agregar un paciente a la
        respectiva tabla de la base de datos. El formulario requiere datos médicos
        del paciente.
        Se recuperan los valores del formulario "agregarPacientes" para incluirlos 
        en un arreglo que servirá en la función "insertPacientes"
    */
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

    /*
        Función para redirigir al último formulario para agregar a un paciente,
        mismo que hace referencia a la dirección del paciente.
        Se añaden elementos al arreglo "data" de la función "agregarPacientes2" 
    */
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

    /* 
        Función que recupera datos de los formularios de las funciones 
        "agregarPacientes", "agregarPacientes2" y "agregarPacientes3"
        para hacer las inserciones a las tablas del paciente, users,
        userinfo y direccion en la base de datos.
        Al terminar re actualiza y redirige a la vista de "administrarPacientes"
    */
    public function insertPacientes()
    {
        $pacienteModel = model('PacienteModel');
        $dataPaciente = [
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
        $pacienteModel->insert($dataPaciente);

        $usersModel = model('UsersModel');
        $dataUser = [
            "correo" => $_POST['correo'],
            "username" => $_POST['username'],
            "password" => $_POST['contraseña'],
            "paciente" => $pacienteModel->getInsertID(),
            "created_at" => date('d-m-Y')
        ];
        $usersModel->insert($dataUser);

        $userInfoModel = model('UserInfoModel');
        $dataUserInfo = [
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
        $userInfoModel->insert($dataUserInfo);

        $direccionModel = model('DireccionModel');
        $dataDireccion = [
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
        $direccionModel->insert($dataDireccion);

        return redirect('administrador/administrarPacientes', 'refresh');
    }

    /*
        Función para recuperar el id del paciente que se desea editar. 
        Los datos de dicho paciente se mandan a un formulario para que se
        puedan actualizar los campos que se requieran.
        Este primer formulario hace referencia a la información de usuario
        del paciente
    */
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

    /*
        Función para recuperar los datos del formulario de la función 
        "editarPaciente", mismos que se envían en un arreglo ("data").
        Se redirige la información a un segundo formulario "editarPaciente2"
        que hace referencia a los datos médicos del paciente
    */
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


    /*
        Función para recuperar los datos del formulario de la función 
        "editarPaciente2", mismos que se envían en un arreglo ("data").
        Se redirige la información a un último formulario "editarPaciente3"
        que hace referencia a la dirección del paciente
    */
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

    /*
        Función para recuperar los datos de los formularios que se usaron en las
        funciones "editarPaciente", "editarPaciente2" y "editarPaciente3".
        Los datos usan para actualizar un registro en específico, relacionado al
        id del paciente que se trata desde el primer formulario de editar pacientes.
        Al finalizar se redirige y actualiza la vista de "administrarPacientes"
    */
    public function pacienteUpdate()
    {
        $userInfoModel = model('UserInfoModel');

        $usersModel = model('UsersModel');

        $pacienteModel = model('PacienteModel');

        $direccionModel = model('DireccionModel');

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


    /*
        Función para eliminar un registro del paciente que se desea, a partir
        del id que se seleccione. También se eliminan los registros relacionados a 
        dicho paciente, incluyendo la información de usuario, su dirección y su usuario
    */
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




    //---------------------------------------------------------------------------------------------
    //                                     Sección para médicos
    //---------------------------------------------------------------------------------------------

    /* 
        Función que redirige los datos de usuario, que se encuentran almacenados en los respectivos 
        modelos, que contienen la información de todos los médicos
    */
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


    /* 
        Función para buscar entre todos los médicos datos en específico.
        Al terminar de hacer la búsqueda en los respectivos modelos, se redirige
        a la vista de la función "administrarMedicos" 
    */
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


    /* 
        Función para ver toda la información referente a cada usuario médico.
        Esta función manda a traer un id en específico, mismo que es parte
        de los id que se utilizan para identificar a los usuarios en 
        la función "administrarMedicos"
    */
    public function medicoSaberMas($id)
    {
        $userInfoModel = model('UserInfoModel');
        $userModel = model('UsersModel');
        $direccionModel = model('DireccionModel');
        $medicoModel = model('MedicoModel');

        $data['user'] = $userModel->where('medico', $id)->findAll();

        $data['userinfo'] = $userInfoModel->where('id', ($data['user'][0]->id))->findAll();

        $data['direccion'] = $direccionModel->where('userinfo', $id)->findAll();

        $data['medico'] = $medicoModel->find($id);

        $data['id'] = $id;

        return view('common/head') .
            view('common/menu') .
            view('administrador/sabermasMedico', $data) .
            view('common/footer');
    }


    /*
        Función para recuperar el id del médico que se desea editar. 
        Los datos de dicho médico se mandan a un formulario para que se
        puedan actualizar los campos que se requieran.
        Este primer formulario hace referencia a la información de usuario
        del médico
    */
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

    /*
        Función para recuperar los datos del formulario de la función 
        "editarMedico", mismos que se envían en un arreglo ("data").
        Se redirige la información a un segundo formulario "editarMedico2"
        que hace referencia a los datos dek perfil laboral del médico
    */
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

    /*
        Función para recuperar los datos de los formularios que se usaron en las
        funciones "editarMedico", "editarMedico2" 
        Los datos usan para actualizar un registro en específico, relacionado al
        id del médico que se trata desde el primer formulario de editar médico.
        Al finalizar se redirige y actualiza la vista de "administrarMedicos"
    */
    public function medicoUpdate()
    {
        $medicosModel = model('MedicoModel');
        $usersModel = model('UsersModel');
        $userInfoModel = model('UserInfoModel');
        $direccionModel = model('DireccionModel');

        $dataMedico = [
            "especialidad" => $_POST['especialidad'],
            "diasLaborales" => $_POST['diasLaborales'],
            "turno" => $_POST['turno'],
            "created_at" => date('d-m-Y')
        ];
        $medicosModel->update(($usersModel->select('medico')->find($_POST['id'])->medico), $dataMedico);

        $dataUser = [
            "correo" => $_POST['correo'],
            "username" => $_POST['username'],
            "password" => $_POST['password'],
            "medico" => $medicosModel->getInsertID(),
            "created_at" => date('d-m-Y')
        ];
        $usersModel->update($_POST['id'], $dataUser);

        $dataUserInfo = [
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
        $userInfoModel->update($_POST['id'], $dataUserInfo);

        $dataDireccion = [
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
        $direccionModel->update($direccionModel->select('userInfo')->find($_POST['id'])->userInfo, $dataDireccion);

        return redirect('administrador/administrarMedicos', 'refresh');
    }


    /*
        Función para eliminar un registro del médico que se desea, a partir
        del id que se seleccione. También se eliminan los registros relacionados a 
        dicho médico, incluyendo la información de usuario, su dirección y su usuario
    */
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

    /* 
        Función que redirige al primer formulario para agregar un médico 
        a la respectiva tabla de la base de datos. 
        El formulario requiere datos del usuario
    */
    public function agregarMedicos()
    {
        return view('common/head') .
            view('common/menu') .
            view('administrador/agregarMedicos') .
            view('common/footer');
    }


    /*
        Función que redirige al segundo formulario para agregar un médico a la
        respectiva tabla de la base de datos. El formulario requiere datos del 
        perfil laboral del médico.
        Se recuperan los valores del formulario "agregarMedicos" para incluirlos 
        en un arreglo que servirá en la función "insertMedicos"
    */
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

    /* 
        Función que recupera datos de los formularios de las funciones 
        "agregarMedicos" y "agregarMedicos2" para hacer las inserciones a 
        las tablas del médico, users, userinfo y direccion, en la base de datos.
        Al terminar re actualiza y redirige a la vista de "administrarMedicos"
    */
    public function insertMedicos()
    {
        $medicosModel = model('MedicoModel');
        $dataMedicos = [
            "especialidad" => $_POST['especialidad'],
            "diasLaborales" => $_POST['diasLaborales'],
            "turno" => $_POST['turno'],
            "created_at" => date('d-m-Y')
        ];
        $medicosModel->insert($dataMedicos);

        $usersModel = model('UsersModel');
        $dataUser = [
            "correo" => $_POST['correo'],
            "username" => $_POST['username'],
            "password" => $_POST['password'],
            "medico" => $medicosModel->getInsertID(),
            "created_at" => date('d-m-Y')
        ];
        $usersModel->insert($dataUser);

        $userInfoModel = model('UserInfoModel');
        $dataUserInfo = [
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
        $userInfoModel->insert($dataUserInfo);

        $direccionModel = model('DireccionModel');
        $dataDireccion = [
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
        $direccionModel->insert($dataDireccion);

        return redirect('administrador/administrarMedicos', 'refresh');
    }



    //---------------------------------------------------------------------------------------------
    //                                     Sección para medicamentos
    //---------------------------------------------------------------------------------------------

    /* 
        Función que redirige los datos de los medicamentos, que se encuentran almacenados en el 
        respectivo modelo
    */
    public function administrarMedicamentos()
    {
        $medicamentosModel = model('MedicamentosModel');
        $data['medicamentos'] = $medicamentosModel->findAll();

        return view('common/head') .
            view('common/menu') .
            view('administrador/administrarMedicamentos', $data) .
            view('common/footer');
    }

     /* 
        Función para buscar entre todos los medicamentos datos en específico.
        Al terminar de hacer la búsqueda en los respectivos modelos, se redirige
        a la vista de la función "administrarMedicamentos" 
    */
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

    /* 
        Función para ver toda la información referente a cada medicamento.
        Esta función manda a traer un id en específico, mismo que es parte
        de los id que se utilizan para identificar a los medicamentos en 
        la función "administrarMedicamentos"
    */
    public function medicamentoSaberMas($id)
    {
        $medicamentosModel = model('MedicamentosModel');
        $data['medicamento'] = $medicamentosModel->find($id);

        return view('common/head') .
            view('common/menu') .
            view('administrador/sabermasMedicamento', $data) .
            view('common/footer');
    }

    /*
        Función para recuperar el id del medicamento que se desea editar. 
        Los datos de dicho medicamento se mandan a un formulario para que se
        puedan actualizar los campos que se requieran.
    */
    public function editarMedicamento($id)
    {
        $medicamentosModel = model('MedicamentosModel');
        $data['medicamento'] = $medicamentosModel->find($id);

        return view('common/head') .
            view('common/menu') .
            view('administrador/editarMedicamento', $data) .
            view('common/footer');
    }

    /*
        Función para recuperar los datos de los formularios que se usaron en la
        función "editarMedicamento". 
        Los datos usan para actualizar un registro en específico, relacionado al
        id del medicamento. 
        Al finalizar se redirige y actualiza la vista de "administrarMedicamento"
    */
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

    /*
        Función para eliminar un registro del medicamento que se desea, a partir
        del id que se seleccione.
    */
    public function eliminarMedicamento($id)
    {
        $medicamentosModel = model('MedicamentosModel');
        $medicamentosModel->delete($id);

        return redirect('administrador/administrarMedicamentos', 'refresh');
    }

     /* 
        Función que redirige al formulario para agregar un medicamento 
        a la respectiva tabla de la base de datos. 
    */
    public function agregarMedicamentos()
    {
        return view('common/head') .
            view('common/menu') .
            view('administrador/agregarMedicamentos') .
            view('common/footer');
    }

    /* 
        Función que recupera datos de los formularios de la función "agregarMedicamentos" 
        para hacer las inserciones a la tabla del medicamento, en la base de datos.
        Al terminar re actualiza y redirige a la vista de "administrarMedicamentoss"
    */
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

