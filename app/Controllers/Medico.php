<?php

namespace App\Controllers;

use App\Controllers\BaseController;

$session = \Config\Services::session();

// Controlador diseñado para hacer las funcionalidades del rol del Médico
// Se apoya de las rutas del apartado "Sección de rutas destinada para las funcionalidades del Médico"

class Medico extends BaseController
{
    public function index()
    {

    }

    /* 
        Función que redirige a la pantalla principal de las opciones que puede hacer el 
        médico en el sistema
    */
    public function opciones()
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean médicos
        if ($session->get('idMedico') == FALSE || $session->get('idPaciente') == TRUE) {
            return redirect('/', 'refresh');
        }

        return view('common/head') .
            view('common/menu') .
            view('medico/opciones') .
            view('common/footer');
    }



    /*
        Función que redirige a la página de selección del paciente que realizará la consulta
    */
    public function administrarPacientes()
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean médicos
        if ($session->get('idMedico') == FALSE || $session->get('idPaciente') == TRUE) {
            return redirect('/', 'refresh');
        }

        $userInfoModel = model('UserInfoModel');
        $userModel = model('UsersModel');
        $pacienteModel = model('PacienteModel');
        $medicoPacientModel = model('MedicoPacienteModel');
        $session = \Config\Services::session();

        $data['idMedico'] = $session->get('idMedico');
        $data['pacientes'] = $pacienteModel->findAll();
        $data['userInfoPacientes'] = $userInfoModel->findAll();
        $data['userPacientes'] = $userModel->findAll();
        $data['medicoPacientes'] = $medicoPacientModel->where('medico', $data['idMedico'])->findAll();

        if (strtolower($this->request->getMethod()) === 'get') {

            return view('common/head') .
                view('common/menu') .
                view('medico/paciente/administrarPacientes', $data) .
                view('common/footer');
        }
    }

    public function buscarPacientes()
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean médicos
        if ($session->get('idMedico') == FALSE || $session->get('idPaciente') == TRUE) {
            return redirect('/', 'refresh');
        }

        $userInfoModel = model('UserInfoModel');
        $userModel = model('UsersModel');
        $pacienteModel = model('PacienteModel');
        $medicoPacientModel = model('MedicoPacienteModel');
        $session = \Config\Services::session();

        //sección para buscar un registro específico entre los pacientes
        if (isset($_GET['valIngresado'])) {
            $valIngresado = $_GET['valIngresado'];

            $data['userInfoPacientes'] = $userInfoModel->like('primerNombre', $valIngresado)
                ->orlike('segundoNombre', $valIngresado)
                ->orlike('apellidoPaterno', $valIngresado)
                ->orlike('apellidoMaterno', $valIngresado)
                ->findAll();
            $data['userPacientes'] = $userModel->findAll();

        } else {
            $valIngresado = "";
            $data['userInfoPacientes'] = $userInfoModel->findAll();
            $data['userPacientes'] = $userModel->findAll();
        }

        $data['idMedico'] = $session->get('idMedico');
        $data['pacientes'] = $pacienteModel->findAll();
        $data['medicoPacientes'] = $medicoPacientModel->where('medico', $data['idMedico'])->findAll();


        return view('common/head') .
            view('common/menu') .
            view('medico/paciente/administrarPacientes', $data) .
            view('common/footer');
    }


    /* 
       Función para ver toda la información referente a cada usuario paciente.
       Esta función manda a traer un id en específico, mismo que es parte
       de los id que se utilizan para identificar a los usuarios en 
       la función "administrarPacientes"
   */
    public function pacienteSaberMas($id)
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean médicos
        if ($session->get('idMedico') == FALSE || $session->get('idPaciente') == TRUE) {
            return redirect('/', 'refresh');
        }

        $userInfoModel = model('UserInfoModel');
        $userModel = model('UsersModel');
        $pacienteModel = model('PacienteModel');
        $consultasModel = model('ConsultasModel');

        $data['user'] = $userModel->where('paciente', $id)->findAll();
        $data['userinfo'] = $userInfoModel->where('id', ($data['user'][0]->id))->findAll();
        $data['paciente'] = $pacienteModel->find($id);
        $data['consultas'] = $consultasModel->where('medico_paciente', ($_GET['IDmedicoPaciente']))->findAll();
        $data['id'] = $id;
        $data['IDMedicoPaciente'] = $_GET['IDmedicoPaciente'];

        return view('common/head') .
            view('common/menu') .
            view('medico/paciente/sabermasPaciente', $data) .
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
        if ($session->get('idMedico') == FALSE || $session->get('idPaciente') == TRUE) {
            return redirect('/', 'refresh');
        }

        $session = \Config\Services::session();

        $medicoPacienteModel = model('MedicoPacienteModel');
        $data['medicosPaciente'] = $medicoPacienteModel->where('medico', ($session->get('idMedico')))->findAll();

        $consultasModel = model('ConsultasModel');
        $data['consultasPendientes'] = $consultasModel->where('fecha', NULL)->findAll();

        $data['consultas'] = $consultasModel->findAll();

        $recetaModel = model('RecetaModel');
        $data['recetas'] = $recetaModel->findAll();

        return view('common/head') .
            view('common/menu') .
            view('medico/consultas/administrarConsultas', $data) .
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
        if ($session->get('idMedico') == FALSE || $session->get('idPaciente') == TRUE) {
            return redirect('/', 'refresh');
        }

        //Se agregan 7 días más a la fecha de consulta
        $consultasModel = model('ConsultasModel');
        $consulta = $consultasModel->find($id);
        $nuevaFecha = date("Y-m-d", strtotime($consulta->fecha . "+ 7 days"));

        $data = array(
            "fecha" => $nuevaFecha,
        );

        $consultasModel->update($id, $data);

        return redirect('medico/consultas/administrarConsultas', 'refresh');
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
        if ($session->get('idMedico') == FALSE || $session->get('idPaciente') == TRUE) {
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
            view('medico/consultas/sabermasConsulta', $data) .
            view('common/footer');
    }



    /*
        Función para completar el formulario de la consulta nueva
        que va a realizar el médico
    */
    public function realizarConsultaFormulario($id)
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean médicos
        if ($session->get('idMedico') == FALSE || $session->get('idPaciente') == TRUE) {
            return redirect('/', 'refresh');
        }

        $medicamentosModel = model('MedicamentosModel');
        $data['medicamentos'] = $medicamentosModel->findAll();

        $consultaModel = model('ConsultasModel');
        $dataConsulta = [
            "lugar" => '',
            "hora" => '',
            "fecha" => '',
            "motivo" => '',
            "medico_paciente" => $id,
            "created_at" => date('Y-m-d')
        ];

        //Se inserta una nueva consulta
        $consultaModel->insert($dataConsulta);
        $data['medico_paciente'] = $id;
        $data['consulta'] = $consultaModel->where('fecha', null)->orderBy('id', 'desc')->findAll();


        return view('common/head') .
            view('common/menu') .
            view('medico/consultas/realizarConsultaFormulario', $data) .
            view('common/footer');
    }

    /*
         Función para completar el formulario de la consulta pendiente
         que tiene el médico
     */
    public function completarConsulta($id)
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean médicos
        if ($session->get('idMedico') == FALSE || $session->get('idPaciente') == TRUE) {
            return redirect('/', 'refresh');
        }

        $medicamentosModel = model('MedicamentosModel');
        $data['medicamentos'] = $medicamentosModel->findAll();

        $consultaModel = model('ConsultasModel');


        $data['consulta'] = $consultaModel->find($id);


        $data['medico_paciente'] = $data['consulta']->medico_paciente;

        return view('common/head') .
            view('common/menu') .
            view('medico/consultas/completarConsulta', $data) .
            view('common/footer');
    }


    /*
        Función para marcar como completar el proceso de la consulta 
        específica que se requiera, actualizando la fecha de modiciación
        de dicho registro en la base de datos
    */
    public function realizarConsulta($id)
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean médicos
        if ($session->get('idMedico') == FALSE || $session->get('idPaciente') == TRUE) {
            return redirect('/', 'refresh');
        }

        //Reglas de validación
        $rules = [
            'lugar' => 'required|max_length[15]|min_length[3]|string',
            'motivo' => 'required|max_length[250]|string',
        ];

        //Se redirige si se pasan las reglas de validación
        if (!$this->validate($rules)) {
            $medicamentosModel = model('MedicamentosModel');
            $data['medicamentos'] = $medicamentosModel->findAll();

            $consultaModel = model('ConsultasModel');
            $data['medico_paciente'] = $_POST['medico_paciente'];

            $data['consulta'] = $consultaModel->find($_POST['IDconsulta']);

            return view('common/head') .
                view('common/menu') .
                view('medico/consultas/realizarConsultaFormulario', $data) .
                view('common/footer');

        } else {
            //Se hacen las inserciones en las tablas relacionadas con las consultas
            $consultasModel = model('ConsultasModel');
            $dataConsulta = [
                "lugar" => $_POST['lugar'],
                "hora" => date('h:i:s'),
                "fecha" => date("Y-m-d", strtotime(date('Y-m-d') . "- 1 days")),
                "motivo" => $_POST['motivo'],
                "medico_paciente" => $_POST['medico_paciente'],
                "created_at" => date('Y-m-d'),
                "updated_at" => date("Y-m-d", strtotime(date('Y-m-d') . "- 1 days"))
            ];
            $consultasModel->delete($_POST['IDconsulta']);
            $consultasModel->insert($dataConsulta);

            //Se agregan 15 días a la fecha anterior de la consulta, para asignarla como límite para realizarla
            $nuevaFecha = date("Y-m-d", strtotime(date('Y-m-d') . "+ 15 days"));

            $recetaModel = model('RecetaModel');
            $dataReceta = [
                "status" => 1,
                "fechaVencimiento" => $nuevaFecha,
                "consulta" => $consultasModel->getInsertID(),
                "created_at" => date('Y-m-d')
            ];
            $recetaModel->insert($dataReceta);

            $recetaMedicamentoModel = model('RecetaMedicamentoModel');

            // Se insertan todos los medicamentos para cada receta, en caso de que se utilizaran
            if (isset($_POST['medicamentos'])) {
                foreach ($_POST['medicamentos'] as $medicamento) {
                    $dataRecetaMedicamento = [
                        "receta" => $recetaModel->getInsertID(),
                        "medicamento" => $medicamento
                    ];
                    $recetaMedicamentoModel->insert($dataRecetaMedicamento);
                }
            }
            return redirect('medico/consultas/administrarConsultas', 'refresh');
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
        if ($session->get('idMedico') == FALSE || $session->get('idPaciente') == TRUE) {
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
        if ($session->get('idMedico') == FALSE || $session->get('idPaciente') == TRUE) {
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
            view('medico/recetas/sabermasReceta', $data) .
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
        if ($session->get('idMedico') == FALSE || $session->get('idPaciente') == TRUE) {
            return redirect('/', 'refresh');
        }

        $session = \Config\Services::session();

        $medicoPacienteModel = model('MedicoPacienteModel');
        $data['medicosPaciente'] = $medicoPacienteModel->where('medico', ($session->get('idMedico')))->findAll();

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
            view('medico/recetas/administrarRecetas', $data) .
            view('common/footer');
    }

    /*
        Función para dar de baja una receta, cambiando su status, para
        que no sea válida en caso de que quiera usarse en otros procesos
    */
    public function cancelarReceta($id)
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean médicos
        if ($session->get('idMedico') == FALSE || $session->get('idPaciente') == TRUE) {
            return redirect('/', 'refresh');
        }

        //Se actuliza la información de la receta, para que no esté válida en las vistas
        $recetaModel = model('RecetaModel');
        $data = array(
            "status" => 0,
            "updated_at" => date('Y-m-d'),
        );

        $recetaModel->update($id, $data);

        return redirect('medico/recetas/administrarRecetas', 'refresh');
    }

    /*
     Función para reactivar el status de la receta, agregando más tiempo a
     la fecha de vencimiento (hasta el año 2048)
    */
    public function renovarReceta($id)
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean médicos
        if ($session->get('idMedico') == FALSE || $session->get('idPaciente') == TRUE) {
            return redirect('/', 'refresh');
        }

        //Se actualiza la información de la receta, para que esté disponible en las vistas
        $recetaModel = model('RecetaModel');
        $data = array(
            "status" => 1,
            "updated_at" => date('Y-m-d'),
            "fechaVencimiento" => date('2048-m-d'),
        );

        $recetaModel->update($id, $data);

        return redirect('medico/recetas/administrarRecetas', 'refresh');
    }
}

