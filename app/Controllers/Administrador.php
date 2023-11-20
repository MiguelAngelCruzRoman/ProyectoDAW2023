<?php

namespace App\Controllers;

use App\Controllers\BaseController;
$session = \Config\Services::session();


// Controlador diseñado para hacer las funcionalidades del rol del Administrador
// Se apoya de las rutas del apartado "Sección de rutas destinada para las funcionalidades del Administrador"
class Administrador extends BaseController
{
    public function index()
    {

    }

    /* 
        Función que redirige a la pantalla principal de las opciones que puede hacer el 
        administrador en el sistema
    */
    public function opciones()
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }
        
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
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $userInfoModel = model('UserInfoModel');
        $data['usersInfo'] = $userInfoModel->findAll();

        $usersModel = model('UsersModel');
        $data['users'] = $usersModel->findAll();


         /*
            Los siguientes modelos son para recuperar la información de los médicos que atienden
            a cada paciente
        */
        $medicoPacienteModel = model ('MedicoPacienteModel');
        $data['medicosPaciente'] = $medicoPacienteModel->findAll();
        $medicoModel = model ('MedicoModel');
        $data['medicos'] = $medicoModel->findAll();
        $data['userInfoMedicos'] = $userInfoModel->findAll();
        $data['userMedicos'] = $usersModel->findAll();
        
        return view('common/head') .
            view('common/menu') .
            view('administrador/pacientes/administrarPacientes', $data) .
            view('common/footer');
    }


    /* 
        Función para buscar entre todos los pacientes datos en específico.
        Al terminar de hacer la búsqueda en los respectivos modelos, se redirige
        a la vista de la función "administrarPaciente" 
    */
    public function buscarPacientes()
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

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

         /*
            Los siguientes modelos son para recuperar la información de los médicos que atienden
            a cada paciente
        */
        $medicoPacienteModel = model ('MedicoPacienteModel');
        $data['medicosPaciente'] = $medicoPacienteModel->findAll();
        $medicoModel = model ('MedicoModel');
        $data['medicos'] = $medicoModel->findAll();
        $data['userInfoMedicos'] = $userInfoModel->findAll();
        $data['userMedicos'] = $usersModel->findAll();

        return view('common/head') .
            view('common/menu') .
            view('administrador/pacientes/administrarPacientes', $data) .
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
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $userInfoModel = model('UserInfoModel');
        $userModel = model('UsersModel');
        $direccionModel = model('DireccionModel');
        $pacienteModel = model('PacienteModel');

        $data['user'] = $userModel->where('paciente', $id)->findAll();

        $data['userinfo'] = $userInfoModel->where('id', ($data['user'][0]->id))->findAll();

        $data['direccion'] = $direccionModel->where('userinfo', ($data['userinfo'][0]->id))->findAll();

        $data['paciente'] = $pacienteModel->find($id);

        $data['id'] = $id;

        /*
            Los siguientes modelos son para recuperar la información de los médicos que atienden
            a cada paciente
        */
        $medicoPacienteModel = model ('MedicoPacienteModel');
        $data['medicosPaciente'] = $medicoPacienteModel->findAll();
        $medicoModel = model ('MedicoModel');
        $data['medicos'] = $medicoModel->findAll();
        $data['userInfoMedicos'] = $userInfoModel->findAll();
        $data['userMedicos'] = $userModel->findAll();
        
        return view('common/head') .
            view('common/menu') .
            view('administrador/pacientes/sabermasPaciente', $data) .
            view('common/footer');
    }

    /* 
        Función que redirige al primer formulario para agregar un paciente 
        a la respectiva tabla de la base de datos. 
        El formulario requiere datos del usuario
    */
    public function agregarPacientes()
    {      
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        if(strtolower($this->request->getMethod())==='get'){
            return view('common/head') .
            view('common/menu') .
            view('administrador/pacientes/agregarPacientes') .
            view('common/footer');
        }

    }

    /*
        Función que redirige al segundo formulario para agregar un paciente a la
        respectiva tabla de la base de datos. El formulario requiere datos médicos
        del paciente.
        Se recuperan los valores del formulario "agregarPacientes" para incluirlos 
        en un arreglo que servirá en la función "insertPacientes"
    */
    public function agregarPacientesDatosMedicos()
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $validation = \Config\Services::validation();

        $rules =[
            'primerNombre'=>'required|max_length[15]|min_length[3]|string',
            'segundoNombre'=>'max_length[15]',
            'apellidoPaterno'=>'required|max_length[15]|min_length[3]|string',
            'apellidoMaterno'=>'required|max_length[15]|min_length[3]|string',
            'genero'=>'required|max_length[1]|alpha_numeric_punct',
            'telefono'=>'required|max_length[15]|min_length[10]',
            'CURP'=>'required|max_length[18]|min_length[18]|alpha_numeric',
            'correo'=>'required|max_length[100]|min_length[7]|valid_email',
            'username'=>'required|max_length[50]|min_length[1]|string',
            'contraseña'=>'required|max_length[150]|min_length[1]|string',
            'foto'=>'required|max_length[250]|valid_url',
        ];

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

        if(!$this->validate($rules)){
            
            return view('common/head') .
            view('common/menu') .
            view('administrador/pacientes/agregarPacientes', ['validation'=>$validation,$data]) .
            view('common/footer');

        }else{
            return view('common/head') .
            view('common/menu') .
            view('administrador/pacientes/agregarPacientesDatosMedicos', $data) .
            view('common/footer');
        }        
    }

    /*
        Función para redirigir al último formulario para agregar a un paciente,
        mismo que hace referencia a la dirección del paciente.
        Se añaden elementos al arreglo "data" de la función "agregarPacientesDatosMedicos" 
    */
    public function agregarPacientesDireccion()
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $validation = \Config\Services::validation();

        $rules =[
            'statusSeguro'=>'required|max_length[50]|min_length[7]|alpha_space',
            'sangre'=>'required|max_length[3]|min_length[2]|alpha_numeric_punct',
            'alergia'=>'required|max_length[250]|min_length[7]',
            'fechaChequeo'=>'required|valid_date',
            'motivoConsulta'=>'required|max_length[250]|alpha_numeric_punct',
            'habitosToxicos'=>'required',
            'condicionesPrevias'=>'required',
        ];

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
            'validation'=>$validation
        ];


        if(!$this->validate($rules)){
            
            return view('common/head') .
            view('common/menu') .
            view('administrador/pacientes/agregarPacientesDatosMedicos',$data) .
            view('common/footer');

        }else{
            return view('common/head') .
            view('common/menu') .
            view('administrador/pacientes/agregarPacientesDireccion', $data) .
            view('common/footer');
        }  
        
    }

    /* 
        Función que recupera datos de los formularios de las funciones 
        "agregarPacientes", "agregarPacientesDatosMedicos" y "agregarPacientesDireccion"
        para hacer las inserciones a las tablas del paciente, users,
        userinfo y direccion en la base de datos.
        Al terminar re actualiza y redirige a la vista de "administrarPacientes"
    */
    public function insertPacientes()
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $validation = \Config\Services::validation();

        $rules =[
            'estado'=>'required|max_length[50]|min_length[2]|string',
            'municipio'=>'required|max_length[50]|min_length[2]|string',
            'colonia'=>'required|max_length[50]|min_length[2]|string',
            'calle'=>'required|max_length[50]|min_length[2]|string',
            'noExt'=>'required|max_length[11]|integer',
            'noInt'=>'max_length[11]|',
            'CP'=>'required|max_length[5]|integer',
            'tipo'=>'required|max_length[50]|min_length[2]|alpha_numeric_punct',
        ];

        if(!$this->validate($rules)){     
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
                'validation'=>$validation
            ];
            return view('common/head') .
            view('common/menu') .
            view('administrador/pacientes/agregarPacientesDireccion',$data) .
            view('common/footer');

        }else{
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
            "created_at" => date('Y-m-d')
        ];
        $pacienteModel->insert($dataPaciente);

        $usersModel = model('UsersModel');
        $dataUser = [
            "correo" => $_POST['correo'],
            "username" => $_POST['username'],
            "password" => $_POST['contraseña'],
            "paciente" => $pacienteModel->getInsertID(),
            "created_at" => date('Y-m-d')
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
            "created_at" => date('Y-m-d')
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
            "created_at" => date('Y-m-d')
        ];
        $direccionModel->insert($dataDireccion);

        return redirect('administrador/pacientes/administrarPacientes', 'refresh');
        }  
        
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
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $pacienteModel = model('PacienteModel');
        $data['paciente'] = $pacienteModel->find($id);

        $usersModel = model('UsersModel');
        $data['users'] = $usersModel->where('paciente',($data['paciente']->id))->find();

        $userInfoModel = model('UserInfoModel');
        $data['usersInfo'] = $userInfoModel->where('id',($data['users'][0]->id))->find();

            return view('common/head') .
            view('common/menu') .
            view('administrador/pacientes/editarPaciente', $data) .
            view('common/footer');
        
    }

    /*
        Función para recuperar los datos del formulario de la función 
        "editarPaciente", mismos que se envían en un arreglo ("data").
        Se redirige la información a un segundo formulario "editarPacienteDatosMedicos"
        que hace referencia a los datos médicos del paciente
    */
    public function editarPacienteDatosMedicos($id)
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $validation = \Config\Services::validation();

        $rules =[
            'primerNombre'=>'required|max_length[15]|min_length[3]|string',
            'segundoNombre'=>'max_length[15]',
            'apellidoPaterno'=>'required|max_length[15]|string',
            'apellidoMaterno'=>'required|max_length[15]|string',
            'genero'=>'required|max_length[1]|alpha',
            'telefono'=>'required|max_length[15]|min_length[10]',
            'CURP'=>'required|max_length[18]|min_length[18]|alpha_numeric',
            'correo'=>'required|max_length[100]|min_length[7]|valid_email',
            'username'=>'required|max_length[50]|min_length[1]|string',
            'contraseña'=>'required|max_length[150]|min_length[1]|string',
            'foto'=>'required|max_length[250]|valid_url',
        ];

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
            "paciente" => $pacienteModel->find($id),
            'validation'=>$validation
        ];

        if(!$this->validate($rules)){
            
            $pacienteModel = model('PacienteModel');
        $data['paciente'] = $pacienteModel->find($id);

        $usersModel = model('UsersModel');
        $data['users'] = $usersModel->where('paciente',($data['paciente']->id))->find();

        $userInfoModel = model('UserInfoModel');
        $data['usersInfo'] = $userInfoModel->where('id',($data['users'][0]->id))->find();

            return view('common/head') .
            view('common/menu') .
            view('administrador/pacientes/editarPaciente', $data) .
            view('common/footer');

        }else{
            return view('common/head') .
            view('common/menu') .
            view('administrador/pacientes/editarPacienteDatosMedicos', $data) .
            view('common/footer');
        }   
        
    }


    /*
        Función para recuperar los datos del formulario de la función 
        "editarPacienteDatosMedicos", mismos que se envían en un arreglo ("data").
        Se redirige la información a un último formulario "editarPacienteDireccion"
        que hace referencia a la dirección del paciente
    */
    public function editarPacienteDireccion($id)
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $pacienteModel = model('PacienteModel');
        $direccionModel = model('DireccionModel');

        $validation = \Config\Services::validation();

        $rules =[
            'seguro'=>'required|max_length[50]|min_length[3]|alpha_space',
            'sangre'=>'required|max_length[3]|min_length[2]|alpha_numeric_punct',
            'alergia'=>'required|max_length[250]|min_length[7]',
            'fechaRevision'=>'required|valid_date',
            'motivoRevision'=>'required|max_length[250]|alpha_numeric_punct',
            'habitosToxicos'=>'required',
            'condicionesPrevias'=>'required',
        ];

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
            "paciente" => $pacienteModel->find($id),
            "sangre" => $_POST['sangre'],
            "alergia" => $_POST['alergia'],
            "fechaRevision" => $_POST['fechaRevision'],
            "motivoRevision" => $_POST['motivoRevision'],
            "direccion" => $direccionModel->where('userinfo', $_POST['id'])->findAll(),
            "seguro" => $_POST['seguro'],
            "habitosToxicos" => $_POST['habitosToxicos'],
            "condicionesPrevias" => $_POST['condicionesPrevias'],
            'validation'=>$validation
        ];

        if(!$this->validate($rules)){
            
            return view('common/head') .
            view('common/menu') .
            view('administrador/pacientes/editarPacienteDatosMedicos',$data) .
            view('common/footer');

        }else{
            return view('common/head') .
            view('common/menu') .
            view('administrador/pacientes/editarPacienteDireccion', $data) .
            view('common/footer');
        } 

        
    }

    /*
        Función para recuperar los datos de los formularios que se usaron en las
        funciones "editarPaciente", "editarPacienteDatosMedicos" y "editarPacienteDireccion".
        Los datos usan para actualizar un registro en específico, relacionado al
        id del paciente que se trata desde el primer formulario de editar pacientes.
        Al finalizar se redirige y actualiza la vista de "administrarPacientes"
    */
    public function pacienteUpdate()
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

         $validation = \Config\Services::validation();

        $rules =[
            'estado'=>'required|max_length[50]|min_length[2]|string',
            'municipio'=>'required|max_length[50]|min_length[2]|string',
            'colonia'=>'required|max_length[50]|min_length[2]|string',
            'calle'=>'required|max_length[50]|min_length[2]|string',
            'noExt'=>'required|max_length[11]|integer',
            'noInt'=>'max_length[11]|',
            'CP'=>'required|max_length[5]|integer',
            'tipo'=>'required|max_length[50]|min_length[2]|alpha_numeric_punct',
        ];

        $userInfoModel = model('UserInfoModel');

        $usersModel = model('UsersModel');

        $pacienteModel = model('PacienteModel');

        $direccionModel = model('DireccionModel');

        if(!$this->validate($rules)){
            
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
                "paciente" => $pacienteModel->find(($_POST['PacienteID'])),
                "sangre" => $_POST['sangre'],
                "alergia" => $_POST['alergia'],
                "fechaChequeo" => $_POST['fechaRevision'],
                "motivoConsulta" => $_POST['motivoRevision'],
                "direccion" => $direccionModel->where('userinfo', $_POST['id'])->findAll(),
                "statusSeguro" => $_POST['seguro'],
                "habitosToxicos" => $_POST['habitosToxicos'],
                "condicionesPrevias" => $_POST['condicionesPrevias'],
                'validation'=>$validation
            ];

            return view('common/head') .
            view('common/menu') .
            view('administrador/pacientes/agregarPacientesDireccion',$data) .
            view('common/footer');

        }else{
          
            $data = array(
                "CURP" => $_POST['CURP'],
                "statusSeguro" => $_POST['seguro'],
                "tipoSangre" => $_POST['sangre'],
                "alergia" => $_POST['alergia'],
                "fechaRevision" => $_POST['fechaRevision'],
                "motivoRevision" => $_POST['motivoRevision'],
            );
            $pacienteModel->update(($_POST['PacienteID']), $data);
    
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
                "foto"=>$_POST['foto']
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
    
            return redirect('administrador/pacientes/administrarPacientes', 'refresh');
        } 
        
    }


    /*
        Función para eliminar un registro del paciente que se desea, a partir
        del id que se seleccione. También se eliminan los registros relacionados a 
        dicho paciente, incluyendo la información de usuario, su dirección y su usuario
    */
    public function eliminarPaciente($id)
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $direccionModel = model('DireccionModel');
        $direccionModel->delete(['userinfo' => $id]);

        $userInfoModel = model('UserInfoModel');
        $userInfoModel->delete($id);

        $usersModel = model('UsersModel');
        $usersModel->delete($id);

        $pacienteModel = model('PacienteModel');
        $pacienteModel->delete(['paciente' => $id]);


        return redirect('administrador/pacientes/administrarPacientes', 'refresh');
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
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $userInfoModel = model('UserInfoModel');
        $data['usersInfo'] = $userInfoModel->findAll();

        $usersModel = model('UsersModel');
        $data['users'] = $usersModel->findAll();

        $medicoModel = model('MedicoModel');
        $data['medicos'] = $medicoModel->findAll();


        /*
            Los siguientes modelos son para recuperar la información de los pacientes que son
            atendidos por cada médico
        */
        $medicoPacienteModel = model ('MedicoPacienteModel');
        $data['medicosPaciente'] = $medicoPacienteModel->findAll();
        $pacienteModel = model ('PacienteModel');
        $data['pacientes'] = $pacienteModel->findAll();
        $data['userInfoPacientes'] = $userInfoModel->findAll();
        $data['userPacientes'] = $usersModel->findAll();

        return view('common/head') .
            view('common/menu') .
            view('administrador/medicos/administrarMedicos', $data) .
            view('common/footer');
    }


    /* 
        Función para buscar entre todos los médicos datos en específico.
        Al terminar de hacer la búsqueda en los respectivos modelos, se redirige
        a la vista de la función "administrarMedicos" 
    */
    public function buscarMedicos()
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

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

        /*
            Los siguientes modelos son para recuperar la información de los pacientes que son
            atendidos por cada médico
        */
        $medicoPacienteModel = model ('MedicoPacienteModel');
        $data['medicosPaciente'] = $medicoPacienteModel->findAll();
        $pacienteModel = model ('PacienteModel');
        $data['pacientes'] = $pacienteModel->findAll();
        $data['userInfoPacientes'] = $userInfoModel->findAll();
        $data['userPacientes'] = $usersModel->findAll();

        return view('common/head') .
            view('common/menu') .
            view('administrador/medicos/administrarMedicos', $data) .
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
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $userInfoModel = model('UserInfoModel');
        $userModel = model('UsersModel');
        $direccionModel = model('DireccionModel');
        $medicoModel = model('MedicoModel');

        $data['user'] = $userModel->where('medico', $id)->findAll();

        $data['userinfo'] = $userInfoModel->where('id', ($data['user'][0]->id))->findAll();

        $data['direccion'] = $direccionModel->where('userinfo', ($data['user'][0]->id))->findAll();

        $data['medico'] = $medicoModel->find($id);

        $data['id'] = $id;

        /*
            Los siguientes modelos son para recuperar la información de los pacientes que son
            atendidos por cada médico
        */
        $medicoPacienteModel = model ('MedicoPacienteModel');
        $data['medicosPaciente'] = $medicoPacienteModel->findAll();
        $pacienteModel = model ('PacienteModel');
        $data['pacientes'] = $pacienteModel->findAll();
        $data['userInfoPacientes'] = $userInfoModel->findAll();
        $data['userPacientes'] = $userModel->findAll();

        return view('common/head') .
            view('common/menu') .
            view('administrador/medicos/sabermasMedico', $data) .
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
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $userInfoModel = model('UserInfoModel');
        $data['usersInfo'] = $userInfoModel->find($id);

        $usersModel = model('UsersModel');
        $data['users'] = $usersModel->find($id);

        $idM = $usersModel->select('medico')->find($id)->medico;
        $medicosModel = model('MedicoModel');
        $data['medico'] = $medicosModel->find($idM);

        return view('common/head') .
            view('common/menu') .
            view('administrador/medicos/editarMedico', $data) .
            view('common/footer');
    }

    /*
        Función para recuperar los datos del formulario de la función 
        "editarMedico", mismos que se envían en un arreglo ("data").
        Se redirige la información a un segundo formulario "editarMedicoDireccion"
        que hace referencia a los datos dek perfil laboral del médico
    */
    public function editarMedicoDireccion($id)
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $validation = \Config\Services::validation();

        $rules =[
            'primerNombre'=>'required|max_length[15]|min_length[3]|string',
            'segundoNombre'=>'max_length[15]',
            'apellidoPaterno'=>'required|max_length[15]|string',
            'apellidoMaterno'=>'required|max_length[15]|string',
            'genero'=>'required|max_length[1]|alpha_numeric_punct',
            'telefono'=>'required|max_length[15]|min_length[10]',
            'correo'=>'required|max_length[100]|min_length[7]|valid_email',
            'username'=>'required|max_length[50]|min_length[1]|string',
            'password'=>'required|max_length[150]|min_length[1]|string',
            'foto'=>'required|max_length[250]|valid_url',
            'especialidad'=>'required|max_length[50]|min_length[3]',
            'diasLaborales'=>'required|max_length[50]|min_length[3]',
            'turno'=>'required|max_length[50]|min_length[3]|alpha_numeric_punct',
        ];

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
            'validation'=>$validation
        ];

        if(!$this->validate($rules)){

            $userInfoModel = model('UserInfoModel');
        $data['usersInfo'] = $userInfoModel->find($id);

        $usersModel = model('UsersModel');
        $data['users'] = $usersModel->find($id);

        $idM = $usersModel->select('medico')->find($id)->medico;
        $medicosModel = model('MedicoModel');
        $data['medico'] = $medicosModel->find($idM);

            return view('common/head') .
            view('common/menu') .
            view('administrador/medicos/editarMedico', $data) .
            view('common/footer');

        }else{
            return view('common/head') .
            view('common/menu') .
            view('administrador/medicos/editarMedicoDireccion', $data) .
            view('common/footer');
        }   
    }

    /*
        Función para recuperar los datos de los formularios que se usaron en las
        funciones "editarMedico", "editarMedicoDireccion" 
        Los datos usan para actualizar un registro en específico, relacionado al
        id del médico que se trata desde el primer formulario de editar médico.
        Al finalizar se redirige y actualiza la vista de "administrarMedicos"
    */
    public function medicoUpdate()
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $validation = \Config\Services::validation();

        $rules =[
            'estado'=>'required|max_length[50]|min_length[2]|string',
            'municipio'=>'required|max_length[50]|min_length[2]|string',
            'colonia'=>'required|max_length[50]|min_length[2]|string',
            'calle'=>'required|max_length[50]|min_length[2]|string',
            'noExt'=>'required|max_length[11]|integer',
            'noInt'=>'max_length[11]|',
            'CP'=>'required|max_length[5]|integer',
            'tipo'=>'required|max_length[50]|min_length[2]|alpha_numeric_punct',
        ];

        if(!$this->validate($rules)){
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
                "id" => $_POST['id'],
                "direccion" => $direccionModel->where('userinfo', $_POST['id'])->findAll(),
                'validation'=>$validation
            ];
            return view('common/head') .
            view('common/menu') .
            view('administrador/medicos/editarMedicoDireccion',$data) .
            view('common/footer');

        }else{
            $medicosModel = model('MedicoModel');
        $usersModel = model('UsersModel');
        $userInfoModel = model('UserInfoModel');
        $direccionModel = model('DireccionModel');

        $dataMedico = [
            "especialidad" => $_POST['especialidad'],
            "diasLaborales" => $_POST['diasLaborales'],
            "turno" => $_POST['turno'],
            "created_at" => date('Y-m-d')
        ];
        $medicosModel->update(($usersModel->select('medico')->find($_POST['id'])->medico), $dataMedico);

        $dataUser = [
            "correo" => $_POST['correo'],
            "username" => $_POST['username'],
            "password" => $_POST['password'],
            "created_at" => date('Y-m-d')
        ];
        $usersModel->update($_POST['id'], $dataUser);

        $dataUserInfo = [
            "primerNombre" => $_POST['primerNombre'],
            "segundoNombre" => $_POST['segundoNombre'],
            "apellidoPaterno" => $_POST['apellidoPaterno'],
            "apellidoMaterno" => $_POST['apellidoMaterno'],
            "genero" => $_POST['genero'],
            "telefono" => $_POST['telefono'],
            "foto" => $_POST['foto'],
            "created_at" => date('Y-m-d')
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
            "created_at" => date('Y-m-d')
        ];
        $direccionModel->update($direccionModel->select('userInfo')->find($_POST['id'])->userInfo, $dataDireccion);

        return redirect('administrador/medicos/administrarMedicos', 'refresh');
        }  
        
    }


    /*
        Función para eliminar un registro del médico que se desea, a partir
        del id que se seleccione. También se eliminan los registros relacionados a 
        dicho médico, incluyendo la información de usuario, su dirección y su usuario
    */
    public function eliminarMedico($id)
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $direccionModel = model('DireccionModel');
        $direccionModel->delete(['userinfo' => $id]);

        $userInfoModel = model('UserInfoModel');
        $userInfoModel->delete($id);

        $usersModel = model('UsersModel');
        $usersModel->delete($id);

        $medicoModel = model('MedicoModel');
        $medicoModel->delete(['medico' => $id]);

        return redirect('administrador/medicos/administrarMedicos', 'refresh');
    }

    /* 
        Función que redirige al primer formulario para agregar un médico 
        a la respectiva tabla de la base de datos. 
        El formulario requiere datos del usuario
    */
    public function agregarMedicos()
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        if(strtolower($this->request->getMethod())==='get'){

        return view('common/head') .
            view('common/menu') .
            view('administrador/medicos/agregarMedicos') .
            view('common/footer');
        }
    }


    /*
        Función que redirige al segundo formulario para agregar un médico a la
        respectiva tabla de la base de datos. El formulario requiere datos del 
        perfil laboral del médico.
        Se recuperan los valores del formulario "agregarMedicos" para incluirlos 
        en un arreglo que servirá en la función "insertMedicos"
    */
    public function agregarMedicosDireccion()
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $validation = \Config\Services::validation();

        $rules =[
            'primerNombre'=>'required|max_length[15]|min_length[3]|string',
            'segundoNombre'=>'max_length[15]',
            'apellidoPaterno'=>'required|max_length[15]|string',
            'apellidoMaterno'=>'required|max_length[15]|string',
            'genero'=>'required|max_length[1]|alpha_numeric_punct',
            'telefono'=>'required|max_length[15]|min_length[10]',
            'correo'=>'required|max_length[100]|min_length[7]|valid_email',
            'username'=>'required|max_length[50]|min_length[1]|string',
            'password'=>'required|max_length[150]|min_length[1]|string',
            'foto'=>'required|max_length[250]|valid_url',
            'especialidad'=>'required|max_length[50]|min_length[3]',
            'diasLaborales'=>'required|max_length[50]|min_length[3]',
            'turno'=>'required|max_length[50]|min_length[3]|alpha_numeric_punct',
        ];

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
            'validation'=>$validation
        ];

        if(!$this->validate($rules)){

            return view('common/head') .
            view('common/menu') .
            view('administrador/medicos/agregarMedicos', $data) .
            view('common/footer');

        }else{
            return view('common/head') .
            view('common/menu') .
            view('administrador/medicos/agregarMedicosDireccion', $data) .
            view('common/footer');
        } 
        
    }

    /* 
        Función que recupera datos de los formularios de las funciones 
        "agregarMedicos" y "agregarMedicosDireccion" para hacer las inserciones a 
        las tablas del médico, users, userinfo y direccion, en la base de datos.
        Al terminar re actualiza y redirige a la vista de "administrarMedicos"
    */
    public function insertMedicos()
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $validation = \Config\Services::validation();

        $rules =[
            'estado'=>'required|max_length[50]|min_length[2]|string',
            'municipio'=>'required|max_length[50]|min_length[2]|string',
            'colonia'=>'required|max_length[50]|min_length[2]|string',
            'calle'=>'required|max_length[50]|min_length[2]|string',
            'noExt'=>'required|max_length[11]|integer',
            'noInt'=>'max_length[11]|',
            'CP'=>'required|max_length[5]|integer',
            'tipo'=>'required|max_length[50]|min_length[2]|alpha_numeric_punct',
        ];

        if(!$this->validate($rules)){

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
                'validation'=>$validation
            ];

            return view('common/head') .
            view('common/menu') .
            view('administrador/medicos/agregarMedicosDireccion', $data) .
            view('common/footer');

        }else{
            $medicosModel = model('MedicoModel');
            $dataMedicos = [
                "especialidad" => $_POST['especialidad'],
                "diasLaborales" => $_POST['diasLaborales'],
                "turno" => $_POST['turno'],
                "created_at" => date('Y-m-d')
            ];
            $medicosModel->insert($dataMedicos);
    
            $usersModel = model('UsersModel');
            $dataUser = [
                "correo" => $_POST['correo'],
                "username" => $_POST['username'],
                "password" => $_POST['password'],
                "medico" => $medicosModel->getInsertID(),
                "created_at" => date('Y-m-d')
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
                "created_at" => date('Y-m-d')
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
                "created_at" => date('Y-m-d')
            ];
            $direccionModel->insert($dataDireccion);
    
            return redirect('administrador/medicos/administrarMedicos', 'refresh');
        } 
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
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $medicamentosModel = model('MedicamentosModel');
        $data['medicamentos'] = $medicamentosModel->findAll();

        return view('common/head') .
            view('common/menu') .
            view('administrador/medicamentos/administrarMedicamentos', $data) .
            view('common/footer');
    }

     /* 
        Función para buscar entre todos los medicamentos datos en específico.
        Al terminar de hacer la búsqueda en los respectivos modelos, se redirige
        a la vista de la función "administrarMedicamentos" 
    */
    public function buscarMedicamentos()
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

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
            view('administrador/medicamentos/administrarMedicamentos', $data) .
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
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $medicamentosModel = model('MedicamentosModel');
        $data['medicamento'] = $medicamentosModel->find($id);

        return view('common/head') .
            view('common/menu') .
            view('administrador/medicamentos/sabermasMedicamento', $data) .
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

        if(strtolower($this->request->getMethod())==='get'){

        return view('common/head') .
            view('common/menu') .
            view('administrador/medicamentos/editarMedicamento', $data) .
            view('common/footer');
        }

        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }
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
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $validation = \Config\Services::validation();

        $medicamentosModel = model('MedicamentosModel');

        $rules =[
            'nombreComercial'=>'required|max_length[50]|min_length[3]|string',
            'nombreCinetifico'=>'required|max_length[80]|min_length[3]|string',
            'formaFarmaceutica'=>'required|max_length[20]|string',
            'dosis'=>'required|max_length[11]|integer',
            'fechaCaducidad'=>'required|valid_date',
            'loteFabricacion'=>'required|max_length[10]|string',
            'version'=>'required|max_length[15]|string',
            'simbolo'=>'required',
            'imagenEmpaque'=>'required|max_length[150]|valid_url',
            'stock'=>'required|max_length[11]|integer',
        ];

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
            "updated_at" => time(),
        ];


        if(!$this->validate($rules)){
            $data['validation']=$validation;

            $data['medicamento'] = $medicamentosModel->find($_POST['id']);

            return view('common/head') .
            view('common/menu') .
            view('administrador/medicamentos/editarMedicamento', $data) .
            view('common/footer');

        }else{
            $medicamentosModel->update($_POST['id'], $data);


            return redirect('administrador/medicamentos/administrarMedicamentos', 'refresh');
        } 

    }

    /*
        Función para eliminar un registro del medicamento que se desea, a partir
        del id que se seleccione.
    */
    public function eliminarMedicamento($id)
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $medicamentosModel = model('MedicamentosModel');
        $medicamentosModel->delete($id);

        return redirect('administrador/medicamentos/administrarMedicamentos', 'refresh');
    }

     /* 
        Función que redirige al formulario para agregar un medicamento 
        a la respectiva tabla de la base de datos. 
    */
    public function agregarMedicamentos()
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        if(strtolower($this->request->getMethod())==='get'){

        return view('common/head') .
            view('common/menu') .
            view('administrador/medicamentos/agregarMedicamentos') .
            view('common/footer');
        }
    }

    /* 
        Función que recupera datos de los formularios de la función "agregarMedicamentos" 
        para hacer las inserciones a la tabla del medicamento, en la base de datos.
        Al terminar re actualiza y redirige a la vista de "administrarMedicamentoss"
    */
    public function insertMedicamentos()
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $validation = \Config\Services::validation();

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

        $rules =[
            'nombreComercial'=>'required|max_length[50]|min_length[3]|string',
            'nombreCinetifico'=>'required|max_length[80]|min_length[3]|string',
            'formaFarmaceutica'=>'required|max_length[20]|string',
            'dosis'=>'required|max_length[11]|integer',
            'fechaCaducidad'=>'required|valid_date',
            'loteFabricacion'=>'required|max_length[10]|string',
            'version'=>'required|max_length[15]|string',
            'simbolo'=>'required',
            'imagenEmpaque'=>'required|max_length[150]|valid_url',
            'stock'=>'required|max_length[11]|integer',
        ];

        if(!$this->validate($rules)){
            $data['validation']=$validation;

            return view('common/head') .
            view('common/menu') .
            view('administrador/medicamentos/agregarMedicamentos', $data) .
            view('common/footer');

        }else{
            $medicamentosModel->insert($data, false);

        return redirect('administrador/medicamentos/administrarMedicamentos', 'refresh');
        } 

        
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
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        $consultasModel = model('ConsultasModel');
        $data['consultas'] = $consultasModel->findAll();

        $recetaModel = model('RecetaModel');
        $data['recetas'] = $recetaModel->findAll();

        return view('common/head') .
            view('common/menu') .
            view('administrador/consultas/administrarConsultas', $data) .
            view('common/footer');
    }


    /* 
        Función para buscar entre todas las consultas datos en específico.
        Al terminar de hacer la búsqueda en los respectivos modelos, se redirige
        a la vista de la función "administrarConsultas" 
    */
    public function buscarConsultas()
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $consultasModel = model('ConsultasModel');
        $recetaModel = model('RecetaModel');

        if (isset($_GET['columnaBusquedaConsulta']) && isset($_GET['valIngresado'])) {
            $columnaBusquedaConsulta = $_GET['columnaBusquedaConsulta'];
            $valIngresado = $_GET['valIngresado'];

            if ($columnaBusquedaConsulta == 'todo') {
                $data['consultas'] = $consultasModel->findAll();
            }

            if ($columnaBusquedaConsulta == 'lugar') {
                $data['consultas'] = $consultasModel->like('lugar', $valIngresado)
                    ->findAll();
            }

            if ($columnaBusquedaConsulta == 'fecha') {
                $data['consultas'] = $consultasModel->like('fecha', $valIngresado)
                    ->findAll();
            }

            if ($columnaBusquedaConsulta == 'motivo') {
                $data['consultas'] = $consultasModel->like('motivo', $valIngresado)
                    ->findAll();
            }

             
            $data['recetas'] = $recetaModel->findAll();
        } else {
            $columnaBusquedaConsulta = "";
            $valIngresado = "";
            $data['consultas'] = $consultasModel->findAll();
            $data['recetas'] = $recetaModel->findAll();
        }


        return view('common/head') .
            view('common/menu') .
            view('administrador/consultas/administrarConsultas', $data) .
            view('common/footer');
    }

    /*
        Función para marcar como "Realizada" el status de la consulta 
        específica que se requiera, actualizando la fecha de modiciación
        de dicho registro en la base de datos
    */
    public function realizarConsulta($id){
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $consultasModel = model('ConsultasModel');
        $data = array(
            "updated_at" => date('Y-m-d'),
        );

        $consultasModel->update($id, $data);

        return redirect('administrador/consultas/administrarConsultas', 'refresh');
   }


    /*
        Función que añade 7 días a la fecha de consulta que se tiene registrada
    */
   public function posponerConsulta($id){
    //Proteger la ruta para que no accedan personas sin iniciar sesión
    $session = session();
    if($session->get('logged_in')!=TRUE){
        return redirect('/','refresh');
    }

    //Proteger la ruta para que no accedan usuarios que no sean administradores
    if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
        return redirect('/','refresh');
    }

    $consultasModel = model('ConsultasModel');
    $consulta = $consultasModel->find($id);
    $nuevaFecha=date("Y-m-d",strtotime($consulta->fecha."+ 7 days"));

    $data = array(
        "fecha" =>$nuevaFecha,
    );
   

    $consultasModel->update($id, $data);

    return redirect('administrador/consultas/administrarConsultas', 'refresh');
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
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
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
            view('administrador/consultas/sabermasConsulta', $data) .
            view('common/footer');
    }


    /*
        Función que redirige al formulario que sirve para añadir una
        nueva consulta a la base de datos, empezando por buscar
        qué médico la realizará
    */
    public function agregarMedicoConsulta(){

        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

            $userInfoModel = model('UserInfoModel');
            $userModel = model('UsersModel');
            $medicoModel = model ('MedicoModel');

            $data['medicos'] = $medicoModel->findAll();
            $data['userInfoMedicos'] = $userInfoModel->findAll();
            $data['userMedicos'] = $userModel->findAll();

            if(strtolower($this->request->getMethod())==='get'){

        return view('common/head') .
            view('common/menu') .
            view('administrador/consultas/agregarMedicoConsulta',$data) .
            view('common/footer');
            }
    }


    /*
        Función que busca, entre todos los médicos, aquellos que 
        cumplan con ciertos criterios.
        Es un apoyo a la función "agregarMedicoConsulta" pues reenvía
        al formulario con el mismo nombre, los datos actualizados
    */
    public function agregarMedicoConsultaBuscar(){

        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $userInfoModel = model('UserInfoModel');
        $userModel = model('UsersModel');
        $medicoModel = model ('MedicoModel');
        
        if (isset($_GET['columnaBusquedaMedicos']) && isset($_GET['valIngresado'])) {
            $columnaBusquedaMedicos = $_GET['columnaBusquedaMedicos'];
            $valIngresado = $_GET['valIngresado'];

            if ($columnaBusquedaMedicos == 'nombre') {
                $data['userInfoMedicos'] = $userInfoModel->like('primerNombre', $valIngresado)
                    ->orlike('segundoNombre', $valIngresado)
                    ->orlike('apellidoPaterno', $valIngresado)
                    ->orlike('apellidoMaterno', $valIngresado)
                    ->findAll();
                $data['userMedicos'] = $userModel->findAll();
                $data['medicos'] = $medicoModel->findAll();
            }

            if ($columnaBusquedaMedicos == 'especialidad') {
                $data['medicos'] = $medicoModel->like('especialidad', $valIngresado)
                    ->findAll();
                $data['userMedicos'] = $userModel->findAll();
                $data['userInfoMedicos'] = $userInfoModel->findAll();
            }

            if ($columnaBusquedaMedicos == 'turno') {
                $data['medicos'] = $medicoModel->like('turno', $valIngresado)
                    ->findAll();
                $data['userMedicos'] = $userModel->findAll();
                $data['userInfoMedicos'] = $userInfoModel->findAll();
            }

            if ($columnaBusquedaMedicos == 'diasLaborales') {
                $data['medicos'] = $medicoModel->like('diasLaborales', $valIngresado)
                    ->findAll();
                $data['userMedicos'] = $userModel->findAll();
                $data['userInfoMedicos'] = $userInfoModel->findAll();
            }

            if ($columnaBusquedaMedicos == 'todo') {
                $data['medicos'] = $medicoModel->findAll();
                $data['userMedicos'] = $userModel->findAll();
                $data['userInfoMedicos'] = $userInfoModel->findAll();
            }

        } else {
            $columnaBusquedaMedicos = "";
            $valIngresado = "";
            $data['medicos'] = $medicoModel->findAll();
            $data['userInfoMedicos'] = $userInfoModel->findAll();
            $data['userMedicos'] = $userModel->findAll();
        }

    return view('common/head') .
        view('common/menu') .
        view('administrador/consultas/agregarMedicoConsulta',$data) .
        view('common/footer');
}

    /*
        Función que redirige al formulario que sirve para añadir una
        nueva consulta a la base de datos, empezando por buscar
        qué médico la realizará
    */
    public function agregarPacienteConsulta($idMedico){

        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $userInfoModel = model('UserInfoModel');
        $userModel = model('UsersModel');
        $pacienteModel = model ('PacienteModel');

        $data['pacientes'] = $pacienteModel->findAll();
        $data['userInfoPacientes'] = $userInfoModel->findAll();
        $data['userPacientes'] = $userModel->findAll();
        $data['idMedico'] = $idMedico;

        if(strtolower($this->request->getMethod())==='post'){

    return view('common/head') .
        view('common/menu') .
        view('administrador/consultas/agregarPacienteConsulta',$data) .
        view('common/footer');
        }
}


    /*
        Función que busca, entre todos los pacientes, aquellos que 
        cumplan con ciertos criterios.
        Es un apoyo a la función "agregarPacienteConsulta" pues reenvía
        al formulario con el mismo nombre, los datos actualizados
    */
    public function agregarPacienteConsultaBuscar($idMedico){

        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $userInfoModel = model('UserInfoModel');
        $userModel = model('UsersModel');
        $pacienteModel = model ('PacienteModel');

        if (isset($_GET['columnaBusquedaPaciente']) && isset($_GET['valIngresado'])) {
            $columnaBusquedaPaciente = $_GET['columnaBusquedaPaciente'];
            $valIngresado = $_GET['valIngresado'];

            if ($columnaBusquedaPaciente == 'nombre') {
                $data['userInfoPacientes'] = $userInfoModel->like('primerNombre', $valIngresado)
                    ->orlike('segundoNombre', $valIngresado)
                    ->orlike('apellidoPaterno', $valIngresado)
                    ->orlike('apellidoMaterno', $valIngresado)
                    ->findAll();
                $data['userPacientes'] = $userModel->findAll();
            }

            if ($columnaBusquedaPaciente == 'telefono') {
                $data['userInfoPacientes'] = $userInfoModel->like('telefono', $valIngresado)
                    ->findAll();
                $data['userPacientes'] = $userModel->findAll();
            }

            if ($columnaBusquedaPaciente == 'todo') {
                $data['userInfoPacientes'] = $userInfoModel->findAll();
                $data['userPacientes'] = $userModel->findAll();
            }

            $data['pacientes'] = $pacienteModel->findAll();

        } else {
            $columnaBusquedaPaciente = "";
            $valIngresado = "";
            $data['userInfoPacientes'] = $userInfoModel->findAll();
            $data['userPacientes'] = $userModel->findAll();
            $data['pacientes'] = $pacienteModel->findAll();
        }
        $data['idMedico'] = $idMedico;


        return view('common/head') .
        view('common/menu') .
        view('administrador/consultas/agregarPacienteConsulta',$data) .
        view('common/footer');
    }



    /*
        Función que redirige al formulario que sirve para añadir la
        información referente a una nueva consulta, en la base de datos
    */
    public function agregarConsulta($idPaciente){

        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $medicoPacienteModel = model('MedicoPacienteModel');

        $data['medicoPaciente'] = $medicoPacienteModel->findAll();
        $ExistenciaDeRelacion = 0;
        $ultimoID = 0;
        foreach($data['medicoPaciente'] as $medicoPaciente){
            if(($medicoPaciente->medico == $_POST['idMedico']) && ($medicoPaciente->paciente == $idPaciente)){
                $ExistenciaDeRelacion = $medicoPaciente->id;
            }
            $ultimoID = $ultimoID + 1;
        }

        if($ExistenciaDeRelacion != 0){
        $data['medicoPaciente'] = $medicoPacienteModel->find($ExistenciaDeRelacion);
        }else{
            $data = [
                "medico" => $_POST['idMedico'],
                "paciente" => $idPaciente,
                "created_at" => date('Y-m-d')
            ];
            $medicoPacienteModel->insert($data);
            $data['medicoPaciente'] = $medicoPacienteModel->find($ultimoID);
        }
    
        if(strtolower($this->request->getMethod())==='post'){

    return view('common/head') .
        view('common/menu') .
        view('administrador/consultas/agregarInformacionConsulta',$data) .
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
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

        $validation = \Config\Services::validation();

        $rules =[
            'lugar'=>'required|max_length[15]|min_length[3]|string',
            'hora'=>'max_length[15]',
            'fecha'=>'required|max_length[15]|string',
            'motivo'=>'required|max_length[250]|string',
        ];

        if(!$this->validate($rules)){
            $data['medicoPaciente'] = $_POST['idMedicoPaciente'];

            $medicoPacienteModel = model('MedicoPacienteModel');
            $userInfoModel = model('UserInfoModel');
        $userModel = model('UsersModel');
        $pacienteModel = model ('PacienteModel');

        $data['medicoPaciente'] = $medicoPacienteModel->find($_POST['idMedicoPaciente']);
        $data['pacientes'] = $pacienteModel->findAll();
        $data['userInfoPacientes'] = $userInfoModel->findAll();
        $data['userPacientes'] = $userModel->findAll();
        $data['idMedico'] = $data['medicoPaciente']->medico;
        $data['validation']= $validation;

            return view('common/head') .
        view('common/menu') .
        view('administrador/consultas/agregarInformacionConsulta',$data) .
        view('common/footer');

        }else{
            $consultasModel = model('ConsultasModel');
        $dataConsulta = [
            "lugar" => $_POST['lugar'],
            "hora" => $_POST['hora'],
            "fecha" => $_POST['fecha'],
            "motivo" => $_POST['motivo'],
            "medico_paciente"=>$_POST['idMedicoPaciente'],
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

        return redirect('administrador/consultas/administrarConsultas', 'refresh');
        } 

        
    }





    
    //---------------------------------------------------------------------------------------------
    //                                     Sección para recetas
    //---------------------------------------------------------------------------------------------

    /* 
        Función que redirige los datos de las recetas, que se encuentran almacenados en el 
        respectivo modelo
    */
    public function administrarRecetas()
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
        }

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
            view('administrador/recetas/administrarRecetas', $data) .
            view('common/footer');
    }

    /*
        Función para dar de baja una receta, cambiando su status, para
        que no sea válida en caso de que quiera usarse en otros procesos
    */
   public function cancelarReceta($id){
    //Proteger la ruta para que no accedan personas sin iniciar sesión
    $session = session();
    if($session->get('logged_in')!=TRUE){
        return redirect('/','refresh');
    }

    //Proteger la ruta para que no accedan usuarios que no sean administradores
    if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
        return redirect('/','refresh');
    }

        $recetaModel = model('RecetaModel');
        $data = array(
            "status" => 0,
            "updated_at" => date('Y-m-d'),
        );

        $recetaModel->update($id, $data);

        return redirect('administrador/recetas/administrarRecetas', 'refresh');
   }

   /*
    Función para reactivar el status de la receta, agregando más tiempo a
    la fecha de vencimiento (hasta el año 2048)
   */
   public function renovarReceta($id){
    //Proteger la ruta para que no accedan personas sin iniciar sesión
    $session = session();
    if($session->get('logged_in')!=TRUE){
        return redirect('/','refresh');
    }

    //Proteger la ruta para que no accedan usuarios que no sean administradores
    if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
        return redirect('/','refresh');
    }

    $recetaModel = model('RecetaModel');
    $data = array(
        "status" => 1,
        "updated_at" => date('Y-m-d'),
        "fechaVencimiento" => date('2048-m-d'),
    );

    $recetaModel->update($id, $data);

    return redirect('administrador/recetas/administrarRecetas', 'refresh');
    }

    /*
        Función para mostrar información más específica de cada receta,
        conectándola con la información de los usuarios "paciente" y 
        "médico" de los cuales surgió la consulta (y posteriormente, la receta)
    */
    public function recetaSaberMas($id)
    {
        //Proteger la ruta para que no accedan personas sin iniciar sesión
        $session = session();
        if($session->get('logged_in')!=TRUE){
            return redirect('/','refresh');
        }

        //Proteger la ruta para que no accedan usuarios que no sean administradores
        if($session->get('idMedico')==TRUE || $session->get('idPaciente')==TRUE){
            return redirect('/','refresh');
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
            view('administrador/recetas/sabermasReceta', $data) .
            view('common/footer');
    }
}