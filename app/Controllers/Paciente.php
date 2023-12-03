<?php

namespace App\Controllers;

use App\Controllers\BaseController;

$session = \Config\Services::session();

// Controlador diseñado para hacer las funcionalidades del rol del Paciente
// Se apoya de las rutas del apartado "Sección de rutas destinada para las funcionalidades del Paciente"

class Paciente extends BaseController
{
    public function index()
    {

    }

    /* 
        Función que redirige a la pantalla principal de las opciones que puede hacer el 
        paciente en el sistema
    */
    public function opciones()
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean médicos
        if ($session->get('idMedico') == TRUE || $session->get('idPaciente') == FALSE) {
            return redirect('/', 'refresh');
        }

        return view('common/head') .
            view('common/menu') .
            view('paciente/opciones') .
            view('common/footer');
    }

    /*
        Función que redirige a la página de selección del médico que realizará la consulta
    */
    public function administrarMedicos()
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean médicos
        if ($session->get('idMedico') == TRUE || $session->get('idPaciente') == FALSE) {
            return redirect('/', 'refresh');
        }

        $userInfoModel = model('UserInfoModel');
        $userModel = model('UsersModel');
        $medicoMOdel = model('MedicoModel');
        $medicoPacientModel = model('MedicoPacienteModel');
        $session = \Config\Services::session();

        $data['idPaciente'] = $session->get('idPaciente');
        $data['medicos'] = $medicoMOdel->findAll();
        $data['userInfoMedicos'] = $userInfoModel->findAll();
        $data['userMedicos'] = $userModel->findAll();
        $data['medicoPacientes'] = $medicoPacientModel->where('paciente', $data['idPaciente'])->findAll();

        if (strtolower($this->request->getMethod()) === 'get') {

            return view('common/head') .
                view('common/menu') .
                view('paciente/medico/administrarMedicos', $data) .
                view('common/footer');
        }
    }

    public function buscarMedico()
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean médicos
        if ($session->get('idMedico') == TRUE || $session->get('idPaciente') == FALSE) {
            return redirect('/', 'refresh');
        }

        $userInfoModel = model('UserInfoModel');
        $userModel = model('UsersModel');
        $medicoModel = model('MedicoModel');
        $medicoPacientModel = model('MedicoPacienteModel');
        $session = \Config\Services::session();

        //Sección para buscar médicos, disponibles para realizar consultas para cada paciente
        if (isset($_GET['valIngresado'])) {
            $valIngresado = $_GET['valIngresado'];

            $data['userInfoMedicos'] = $userInfoModel->like('primerNombre', $valIngresado)
                ->orlike('segundoNombre', $valIngresado)
                ->orlike('apellidoPaterno', $valIngresado)
                ->orlike('apellidoMaterno', $valIngresado)
                ->findAll();
            $data['userMedicos'] = $userModel->findAll();

        } else {
            $valIngresado = "";
            $data['userInfoMedicos'] = $userInfoModel->findAll();
            $data['userMedicos'] = $userModel->findAll();
        }

        $data['idPaciente'] = $session->get('idPaciente');
        $data['medicos'] = $medicoModel->findAll();
        $data['medicoPacientes'] = $medicoPacientModel->where('paciente', $data['idPaciente'])->findAll();


        return view('common/head') .
            view('common/menu') .
            view('paciente/medico/administrarMedicos', $data) .
            view('common/footer');
    }


    /* 
       Función para ver toda la información referente a cada usuario paciente.
       Esta función manda a traer un id en específico, mismo que es parte
       de los id que se utilizan para identificar a los usuarios en 
       la función "administrarPacientes"
   */
    public function medicoSaberMas($id)
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean médicos
        if ($session->get('idMedico') == TRUE || $session->get('idPaciente') == FALSE) {
            return redirect('/', 'refresh');
        }

        $userInfoModel = model('UserInfoModel');
        $userModel = model('UsersModel');
        $medicoModel = model('MedicoModel');
        $consultasModel = model('ConsultasModel');

        $data['user'] = $userModel->where('medico', $id)->findAll();
        $data['userinfo'] = $userInfoModel->where('id', ($data['user'][0]->id))->findAll();
        $data['medico'] = $medicoModel->find($id);
        $data['consultas'] = $consultasModel->where('medico_paciente', ($_GET['IDmedicoPaciente']))->findAll();
        $data['id'] = $id;
        $data['IDMedicoPaciente'] = $_GET['IDmedicoPaciente'];

        return view('common/head') .
            view('common/menu') .
            view('paciente/medico/sabermasMedico', $data) .
            view('common/footer');
    }


    //---------------------------------------------------------------------------------------------
    //                                     Sección para consultas
    //---------------------------------------------------------------------------------------------

    /* 
        Función que redirige los datos de las consultas, que se encuentran almacenados en el 
        respectivo modelo
    */
    public function administrarConsultas()
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean médicos
        if ($session->get('idMedico') == TRUE || $session->get('idPaciente') == FALSE) {
            return redirect('/', 'refresh');
        }


        $session = \Config\Services::session();

        $medicoPacienteModel = model('MedicoPacienteModel');
        $data['medicosPaciente'] = $medicoPacienteModel->where('paciente', ($session->get('idPaciente')))->findAll();

        $consultasModel = model('ConsultasModel');
        $data['consultasPendientes'] = $consultasModel->where('fecha >=', date('Y-m-d'))->findAll();

        $data['consultas'] = $consultasModel->where('fecha <', date('Y-m-d'))->findAll();

        $recetaModel = model('RecetaModel');
        $data['recetas'] = $recetaModel->findAll();

        return view('common/head') .
            view('common/menu') .
            view('paciente/consultas/administrarConsultas', $data) .
            view('common/footer');
    }

    /*
        Función que añade 7 días a la fecha de consulta que se tiene registrada
    */
    public function posponerConsulta($id)
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean médicos
        if ($session->get('idMedico') == TRUE || $session->get('idPaciente') == FALSE) {
            return redirect('/', 'refresh');
        }

        //Agregar 7 días a la fecha de consulta, para que se pueda posponer
        $consultasModel = model('ConsultasModel');
        $consulta = $consultasModel->find($id);
        $nuevaFecha = date("Y-m-d", strtotime($consulta->fecha . "+ 7 days"));

        $data = array(
            "fecha" => $nuevaFecha,
        );

        $consultasModel->update($id, $data);

        return redirect('paciente/consultas/administrarConsultas', 'refresh');
    }

    /*
            Función para mostrar información más específica de cada consulta,
            conectándola con la información de los usuarios "paciente" y 
            "médico" de los cuales surgió la consulta (y posteriormente, la receta)
        */
    public function consultaSaberMas($id)
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean médicos
        if ($session->get('idMedico') == TRUE || $session->get('idPaciente') == FALSE) {
            return redirect('/', 'refresh');
        }

        $consultasModel = model('ConsultasModel');
        $data['consulta'] = $consultasModel->find($id);

        $recetaModel = model('RecetaModel');
        $data['recetas'] = $recetaModel->findAll();

        $medicamentoModel = model('MedicamentosModel');
        $data['medicamentos'] = $medicamentoModel->findAll();

        $recetaMedicamentoModel = model('RecetaMedicamentoModel');
        $data['recetaMedicamentos'] = $recetaMedicamentoModel->findAll();



        /*
            Los siguientes modelos son para recuperar la información de los pacientes que son
            atendidos por cada médico en cada consulta
        */
        $userInfoModel = model('UserInfoModel');
        $userModel = model('UsersModel');
        $medicoPacienteModel = model('MedicoPacienteModel');
        $data['medicosPaciente'] = $medicoPacienteModel->findAll();

        $pacienteModel = model('PacienteModel');
        $data['pacientes'] = $pacienteModel->findAll();
        $data['userInfoPacientes'] = $userInfoModel->findAll();
        $data['userPacientes'] = $userModel->findAll();


        $medicoModel = model('MedicoModel');
        $data['medicos'] = $medicoModel->findAll();
        $data['userInfoMedicos'] = $userInfoModel->findAll();
        $data['userMedicos'] = $userModel->findAll();

        return view('common/head') .
            view('common/menu') .
            view('paciente/consultas/sabermasConsulta', $data) .
            view('common/footer');
    }



    /*
        Función que redirige al formulario que sirve para añadir la
        información referente a una nueva consulta, en la base de datos
    */
    public function agregarConsulta($idMedico)
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean médicos
        if ($session->get('idMedico') == TRUE || $session->get('idPaciente') == FALSE) {
            return redirect('/', 'refresh');
        }


        $session = \Config\Services::session();

        $medicoPacienteModel = model('MedicoPacienteModel');

        $data['medicoPaciente'] = $medicoPacienteModel->findAll();
        $ExistenciaDeRelacion = 0;
        $ultimoID = 0;
        //Comprobar si existe relación entre el médico y el paciente
        foreach ($data['medicoPaciente'] as $medicoPaciente) {
            if (($medicoPaciente->paciente == ($session->get('idPaciente'))) && ($medicoPaciente->medico == $idMedico)) {
                $ExistenciaDeRelacion = $medicoPaciente->id;
            }
            $ultimoID = $ultimoID + 1;
        }

        //Si no existe una relación médico-paciente, se crea una
        if ($ExistenciaDeRelacion != 0) {
            $data['medicoPaciente'] = $medicoPacienteModel->find($ExistenciaDeRelacion);
        } else {
            $data = [
                "paciente" => $session->get('idPaciente'),
                "medico" => $idMedico,
                "created_at" => date('Y-m-d')
            ];
            $medicoPacienteModel->insert($data);
            $data['medicoPaciente'] = $medicoPacienteModel->find($ultimoID);
        }

        if (strtolower($this->request->getMethod()) === 'get') {

            return view('common/head') .
                view('common/menu') .
                view('paciente/consultas/agregarInformacionConsulta', $data) .
                view('common/footer');
        }
    }



    /* 
        Función que recupera datos de los formularios de las funciones 
        "agregarInformacionConsulta", "agregarMedicoConsulta" y "agregarPacienteConsulta"
        para hacer las inserciones a las tablas de las consultas, recetas y medico_paciente
        Al terminar re actualiza y redirige a la vista de "administrarConsultas"
    */
    public function insertConsulta()
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean médicos
        if ($session->get('idMedico') == TRUE || $session->get('idPaciente') == FALSE) {
            return redirect('/', 'refresh');
        }

        //Reglas de validación para el respectivo formulario 
        $validation = \Config\Services::validation();
        $rules = [
            'lugar' => 'required|max_length[15]|min_length[3]|string',
            'hora' => 'max_length[15]',
            'fecha' => 'required|max_length[15]|string',
            'motivo' => 'required|max_length[250]|string',
        ];

        //Se redirecciona en caso de que sea validen las reglas del formulario
        if (!$this->validate($rules)) {
            $data['medicoPaciente'] = $_POST['idMedicoPaciente'];

            $medicoPacienteModel = model('MedicoPacienteModel');
            $userInfoModel = model('UserInfoModel');
            $userModel = model('UsersModel');
            $pacienteModel = model('PacienteModel');

            $data['medicoPaciente'] = $medicoPacienteModel->find($_POST['idMedicoPaciente']);
            $data['pacientes'] = $pacienteModel->findAll();
            $data['userInfoPacientes'] = $userInfoModel->findAll();
            $data['userPacientes'] = $userModel->findAll();
            $data['idMedico'] = $data['medicoPaciente']->medico;
            $data['validation'] = $validation;

            return view('common/head') .
                view('common/menu') .
                view('paciente/consultas/agregarInformacionConsulta', $data) .
                view('common/footer');

        } else {
            if ($_POST['fecha'] < date('Y-m-d')) {
                $data['medicoPaciente'] = $_POST['idMedicoPaciente'];

                $medicoPacienteModel = model('MedicoPacienteModel');
                $userInfoModel = model('UserInfoModel');
                $userModel = model('UsersModel');
                $pacienteModel = model('PacienteModel');

                $data['medicoPaciente'] = $medicoPacienteModel->find($_POST['idMedicoPaciente']);
                $data['pacientes'] = $pacienteModel->findAll();
                $data['userInfoPacientes'] = $userInfoModel->findAll();
                $data['userPacientes'] = $userModel->findAll();
                $data['idMedico'] = $data['medicoPaciente']->medico;
                $data['validation'] = $validation;

                return view('common/head') .
                    view('common/menu') .
                    view('paciente/consultas/agregarInformacionConsulta', $data) .
                    view('common/footer');
            } else {
                //Se insertan los datos en las tablas relacionadas con las consultas
                $consultasModel = model('ConsultasModel');
                $dataConsulta = [
                    "lugar" => $_POST['lugar'],
                    "hora" => '',
                    "fecha" => '',
                    "motivo" => $_POST['motivo'],
                    "medico_paciente" => $_POST['idMedicoPaciente'],
                    "created_at" => date('Y-m-d')
                ];
                $consultasModel->insert($dataConsulta);

                $recetaModel = model('RecetaModel');
                $dataReceta = [
                    "status" => 0,
                    "fechaVencimiento" => date('0000-00-00'),
                    "consulta" => $consultasModel->getInsertID(),
                    "created_at" => date('Y-m-d')
                ];
                $recetaModel->insert($dataReceta);

                return redirect('paciente/consultas/administrarConsultas', 'refresh');
            }

        }


    }





    //---------------------------------------------------------------------------------------------
    //                                     Sección para medicamentos
    //---------------------------------------------------------------------------------------------
    /* 
           Función para ver toda la información referente a cada medicamento.
           Esta función manda a traer un id en específico, mismo que es parte
           de los id que se utilizan para identificar a los medicamentos en 
           la función "administrarMedicamentos"
       */
    public function medicamentoSaberMas($id)
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean médicos
        if ($session->get('idMedico') == TRUE || $session->get('idPaciente') == FALSE) {
            return redirect('/', 'refresh');
        }


        $medicamentosModel = model('MedicamentosModel');
        $data['medicamento'] = $medicamentosModel->find($id);

        return view('common/head') .
            view('common/menu') .
            view('medico/medicamento/sabermasMedicamento', $data) .
            view('common/footer');
    }





    //---------------------------------------------------------------------------------------------
    //                                     Sección para recetas
    //---------------------------------------------------------------------------------------------

    /*
        Función para mostrar información más específica de cada receta,
        conectándola con la información de los usuarios "paciente" y 
        "médico" de los cuales surgió la consulta (y posteriormente, la receta)
    */
    public function recetaSaberMas($id)
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean médicos
        if ($session->get('idMedico') == TRUE || $session->get('idPaciente') == FALSE) {
            return redirect('/', 'refresh');
        }


        $recetaModel = model('RecetaModel');
        $data['receta'] = $recetaModel->find($id);

        $medicamentoModel = model('MedicamentosModel');
        $data['medicamentos'] = $medicamentoModel->findAll();

        $recetaMedicamentoModel = model('RecetaMedicamentoModel');
        $data['recetaMedicamentos'] = $recetaMedicamentoModel->findAll();

        $consultasModel = model('ConsultasModel');
        $data['consultas'] = $consultasModel->findAll();


        /*
            Los siguientes modelos son para recuperar la información de los pacientes que son
            atendidos por cada médico
        */
        $userInfoModel = model('UserInfoModel');
        $userModel = model('UsersModel');
        $medicoPacienteModel = model('MedicoPacienteModel');
        $data['medicosPaciente'] = $medicoPacienteModel->findAll();

        $pacienteModel = model('PacienteModel');
        $data['pacientes'] = $pacienteModel->findAll();
        $data['userInfoPacientes'] = $userInfoModel->findAll();
        $data['userPacientes'] = $userModel->findAll();


        $medicoModel = model('MedicoModel');
        $data['medicos'] = $medicoModel->findAll();
        $data['userInfoMedicos'] = $userInfoModel->findAll();
        $data['userMedicos'] = $userModel->findAll();

        return view('common/head') .
            view('common/menu') .
            view('paciente/recetas/sabermasReceta', $data) .
            view('common/footer');
    }


    /* 
        Función que redirige los datos de las recetas, que se encuentran almacenados en el 
        respectivo modelo
    */
    public function administrarRecetas()
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean médicos
        if ($session->get('idMedico') == TRUE || $session->get('idPaciente') == FALSE) {
            return redirect('/', 'refresh');
        }


        $session = \Config\Services::session();

        $medicoPacienteModel = model('MedicoPacienteModel');
        $data['medicosPaciente'] = $medicoPacienteModel->where('paciente', ($session->get('idPaciente')))->findAll();

        $recetaModel = model('RecetaModel');
        $data['recetas'] = $recetaModel->findAll();

        $medicamentoModel = model('MedicamentosModel');
        $data['medicamentos'] = $medicamentoModel->findAll();

        $recetaMedicamentoModel = model('RecetaMedicamentoModel');
        $data['recetaMedicamentos'] = $recetaMedicamentoModel->findAll();

        $consultasModel = model('ConsultasModel');
        $data['consultas'] = $consultasModel->findAll();


        return view('common/head') .
            view('common/menu') .
            view('paciente/recetas/administrarRecetas', $data) .
            view('common/footer');
    }



}

