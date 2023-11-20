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
        $userInfoModel = model('UserInfoModel');
        $userModel = model('UsersModel');
        $pacienteModel = model('PacienteModel');
        $medicoPacientModel = model('MedicoPacienteModel');
        $session = \Config\Services::session();

        $data['idMedico'] = $session->get('idMedico');
        $data['pacientes'] = $pacienteModel->findAll();
        $data['userInfoPacientes'] = $userInfoModel->findAll();
        $data['userPacientes'] = $userModel->findAll();
        $data['medicoPacientes'] = $medicoPacientModel->where('medico',$data['idMedico'])->findAll();

        if (strtolower($this->request->getMethod()) === 'get') {

            return view('common/head') .
                view('common/menu') .
                view('medico/paciente/administrarPacientes', $data) .
                view('common/footer');
        }
    }

    public function buscarPacientes()
    {
        $userInfoModel = model('UserInfoModel');
        $userModel = model('UsersModel');
        $pacienteModel = model('PacienteModel');
        $medicoPacientModel = model('MedicoPacienteModel');
        $session = \Config\Services::session();

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
        $data['medicoPacientes'] = $medicoPacientModel->where('medico',$data['idMedico'])->findAll();


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
        $userInfoModel = model('UserInfoModel');
        $userModel = model('UsersModel');
        $pacienteModel = model('PacienteModel');
        $consultasModel = model ('ConsultasModel');
         
        $data['user'] = $userModel->where('paciente', $id)->findAll();
        $data['userinfo'] = $userInfoModel->where('id', ($data['user'][0]->id))->findAll();
        $data['paciente'] = $pacienteModel->find($id);
        $data['consultas'] = $consultasModel->where('medico_paciente',($_GET['IDmedicoPaciente']))->findAll();
        $data['id'] = $id;
        $data['IDMedicoPaciente']= $_GET['IDmedicoPaciente'];

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
        $session = \Config\Services::session();

        $medicoPacienteModel = model('MedicoPacienteModel');
        $data['medicosPaciente'] = $medicoPacienteModel->where('medico',($session->get('idMedico')))->findAll();

        $consultasModel = model('ConsultasModel');
        $data['consultasPendientes'] = $consultasModel->where('fecha',NULL)->findAll();

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
   public function posponerConsulta($id){
    $consultasModel = model('ConsultasModel');
    $consulta = $consultasModel->find($id);
    $nuevaFecha=date("Y-m-d",strtotime($consulta->fecha."+ 7 days"));

    $data = array(
        "fecha" =>$nuevaFecha,
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
            $medicoPacienteModel = model ('MedicoPacienteModel');
            $data['medicosPaciente'] = $medicoPacienteModel->findAll();

            $pacienteModel = model ('PacienteModel');
            $data['pacientes'] = $pacienteModel->findAll();
            $data['userInfoPacientes'] = $userInfoModel->findAll();
            $data['userPacientes'] = $userModel->findAll();

            
            $medicoModel = model ('MedicoModel');
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
    public function realizarConsultaFormulario($id){
        $medicamentosModel = model('MedicamentosModel');
        $data['medicamentos'] = $medicamentosModel->findAll();

        $consultaModel = model ('ConsultasModel');
        $dataConsulta = [
            "lugar" => '',
            "hora" => '',
            "fecha" => '',
            "motivo" => '',
            "medico_paciente"=>$id,
            "created_at" => date('Y-m-d')
        ];

        
        $consultaModel->insert($dataConsulta);
        $data['medico_paciente']=$id;
        $data['consulta'] = $consultaModel->where('fecha',null)->orderBy('id','desc')->findAll();


        return view('common/head') .
            view('common/menu') .
            view('medico/consultas/realizarConsultaFormulario', $data) .
            view('common/footer');
   }

   /*
        Función para completar el formulario de la consulta pendiente
        que tiene el médico
    */
    public function completarConsulta($id){
        $medicamentosModel = model('MedicamentosModel');
        $data['medicamentos'] = $medicamentosModel->findAll();

        $consultaModel = model ('ConsultasModel');

     
        $data['consulta'] = $consultaModel->find($id);


        $data['medico_paciente']=$data['consulta']->medico_paciente;

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
    public function realizarConsulta($id){
        $validation = \Config\Services::validation();

        $rules =[
            'lugar'=>'required|max_length[15]|min_length[3]|string',
            'motivo'=>'required|max_length[250]|string',
        ];

        if(!$this->validate($rules)){    
            $medicamentosModel = model('MedicamentosModel');
        $data['medicamentos'] = $medicamentosModel->findAll();

            $consultaModel = model ('ConsultasModel');
            $data['medico_paciente']=$_POST['medico_paciente'];

            $data['consulta'] = $consultaModel->find($_POST['IDconsulta']);
            
            return view('common/head') .
        view('common/menu') .
        view('medico/consultas/realizarConsultaFormulario',$data) .
        view('common/footer');

        }else{
            $consultasModel = model('ConsultasModel');
        $dataConsulta = [
            "lugar" => $_POST['lugar'],
            "hora" => date('h:i:s'),
            "fecha" => date("Y-m-d",strtotime(date('Y-m-d')."- 1 days")),
            "motivo" => $_POST['motivo'],
            "medico_paciente"=>$_POST['medico_paciente'],
            "created_at" => date('Y-m-d'),
            "updated_at" => date("Y-m-d",strtotime(date('Y-m-d')."- 1 days"))
        ];
        $consultasModel->delete($_POST['IDconsulta']);
        $consultasModel->insert($dataConsulta);

        $nuevaFecha=date("Y-m-d",strtotime(date('Y-m-d')."+ 15 days"));

        $recetaModel = model('RecetaModel');
        $dataReceta = [
            "status" => 1,
            "fechaVencimiento" => $nuevaFecha,
            "consulta" => $consultasModel->getInsertID(),
            "created_at" => date('Y-m-d')
        ];
        $recetaModel->insert($dataReceta);

        $recetaMedicamentoModel = model('RecetaMedicamentoModel');
        foreach($_POST['medicamentos'] as $medicamento){
            $dataRecetaMedicamento = [
                "receta"=>$recetaModel->getInsertID(),
                "medicamento"=>$medicamento
            ];
            $recetaMedicamentoModel->insert($dataRecetaMedicamento);
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
        $medicoPacienteModel = model ('MedicoPacienteModel');
        $data['medicosPaciente'] = $medicoPacienteModel->findAll();

        $pacienteModel = model ('PacienteModel');
        $data['pacientes'] = $pacienteModel->findAll();
        $data['userInfoPacientes'] = $userInfoModel->findAll();
        $data['userPacientes'] = $userModel->findAll();

        
        $medicoModel = model ('MedicoModel');
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
        $session = \Config\Services::session();

        $medicoPacienteModel = model('MedicoPacienteModel');
        $data['medicosPaciente'] = $medicoPacienteModel->where('medico',($session->get('idMedico')))->findAll();

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
   public function cancelarReceta($id){
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
   public function renovarReceta($id){
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

