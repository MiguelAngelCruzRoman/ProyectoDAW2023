<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Administrador extends BaseController
{
    public function index()
    {
        
    }

    public function opciones(){
        return view('common/head').
               view('common/menu').
               view('administrador/opciones').
               view('common/footer');
    }



    //Sección para pacientes
    public function administrarPacientes(){
        $userInfoModel = model('UserInfoModel');
        $data['usersInfo'] = $userInfoModel->findAll();

        $usersModel = model('UsersModel');
        $data['users'] = $usersModel->findAll();

        return view('common/head').
               view('common/menu').
               view('administrador/administrarPacientes',$data).
               view('common/footer');
    }

    public function buscarPacientes(){

        $userInfoModel = model('UserInfoModel');
        $usersModel = model('UsersModel');

        if(isset($_GET['columnaBusquedaPaciente']) && isset($_GET['valIngresado'])){
            $columnaBusquedaPaciente = $_GET['columnaBusquedaPaciente'];
            $valIngresado = $_GET['valIngresado'];

            if($columnaBusquedaPaciente=='nombre'){
                $data['usersInfo']=$userInfoModel->like('primerNombre',$valIngresado)
                            ->orlike('segundoNombre',$valIngresado)
                            ->orlike('apellidoPaterno',$valIngresado)
                            ->orlike('apellidoMaterno',$valIngresado)
                            ->findAll();
                $data['users'] = $usersModel->findAll();
            }

            if($columnaBusquedaPaciente=='telefono'){
                $data['usersInfo']=$userInfoModel->like('telefono',$valIngresado)
                            ->findAll();
                $data['users'] = $usersModel->findAll();
            }

            if($columnaBusquedaPaciente=='todo'){
                $data['usersInfo']=$userInfoModel->findAll();
                $data['users'] = $usersModel->findAll();
            }

            if($columnaBusquedaPaciente=='username'){
                $data['usersInfo']=$userInfoModel->findAll();
                $data['users'] = $usersModel->like('username',$valIngresado)
                            ->findAll();
            }

            if($columnaBusquedaPaciente=='correo'){
                $data['usersInfo']=$userInfoModel->findAll();
                $data['users'] = $usersModel->like('correo',$valIngresado)
                            ->findAll();
            }
        }
        else {
            $columnaBusquedaPaciente ="";
            $valIngresado="";
            $data['usersInfo']=$userInfoModel->findAll();
            $data['users'] = $usersModel->findAll();
        }
        
        
        return view('common/head').
            view('common/menu').
            view('administrador/administrarPacientes',$data).
            view('common/footer');
    }

    public function editarPaciente($id){
        $userInfoModel = model('UserInfoModel');
        $data['usersInfo'] = $userInfoModel->find($id);

        $usersModel = model('UsersModel');
        $data['users'] = $usersModel->find($id);

        $pacienteModel = model('PacienteModel');
        $data['paciente'] = $pacienteModel->find($id);

        return view('common/head').
            view('common/menu').
            view('administrador/editarPaciente',$data).
            view('common/footer');
    }

    public function editarPaciente2($id){
        $pacienteModel = model('PacienteModel');
 
        $data = [
            "id"=>$_POST['id'],
            "primerNombre"=>$_POST['primerNombre'],
            "segundoNombre"=>$_POST['segundoNombre'],
            "apellidoPaterno"=>$_POST['apellidoPaterno'],
            "apellidoMaterno"=>$_POST['apellidoMaterno'],
            "telefono"=>$_POST['telefono'],
            "CURP"=>$_POST['CURP'],
            "seguro"=>$_POST['seguro'],
            "correo"=>$_POST['correo'],
            "contraseña"=>$_POST['contraseña'],
            "paciente"=>$pacienteModel->find($id)
        ];

        return view('common/head').
            view('common/menu').
            view('administrador/editarPaciente2',$data).
            view('common/footer');
    }
    

    public function editarPaciente3($id){
        $pacienteModel = model('PacienteModel');
        $direccionModel = model('DireccionModel');
        $data = [
            "id"=>$_POST['id'],
            "primerNombre"=>$_POST['primerNombre'],
            "segundoNombre"=>$_POST['segundoNombre'],
            "apellidoPaterno"=>$_POST['apellidoPaterno'],
            "apellidoMaterno"=>$_POST['apellidoMaterno'],
            "telefono"=>$_POST['telefono'],
            "CURP"=>$_POST['CURP'],
            "seguro"=>$_POST['seguro'],
            "correo"=>$_POST['correo'],
            "contraseña"=>$_POST['contraseña'],
            "paciente"=>$pacienteModel->find($id),
            "sangre"=>$_POST['sangre'],
            "alergia"=>$_POST['alergia'],
            "fechaRevision"=>$_POST['fechaRevision'],
            "motivoRevision"=>$_POST['motivoRevision'],
            "direccion"=>$direccionModel->where('userinfo',$id)->findAll()
        ];

        return view('common/head').
            view('common/menu').
            view('administrador/editarPaciente3',$data).
            view('common/footer');
    }

    public function pacienteUpdate(){
        $userInfoModel = model('UserInfoModel');

        $usersModel = model('UsersModel');

        $pacienteModel = model('PacienteModel');

        $direccionModel = model('DireccionModel');

//print($direccionModel->select('userInfo')->find($_POST['id'])->userInfo);
        $data = array(
            "id"=>$_POST['id'],
            "primerNombre"=>$_POST['primerNombre'],
            "segundoNombre"=>$_POST['segundoNombre'],
            "apellidoPaterno"=>$_POST['apellidoPaterno'],
            "apellidoMaterno"=>$_POST['apellidoMaterno'],
            "telefono"=>$_POST['telefono'],
        );
        $userInfoModel->update($_POST['id'],$data);

        $data = array(
            "correo"=>$_POST['correo'],
            "password"=>$_POST['contraseña'],
        );
        $usersModel->update($_POST['id'],$data);

        $data = array(
            "CURP"=>$_POST['CURP'],
            "statusSeguro"=>$_POST['seguro'],
            "tipoSangre"=>$_POST['sangre'],
            "alergia"=>$_POST['alergia'],
            "fechaRevision"=>$_POST['fechaRevision'],
            "motivoRevision"=>$_POST['motivoRevision'],
        );
        $pacienteModel->update($usersModel->select('paciente')->find($_POST['id'])->paciente,$data);

        $data = array(
            "estado"=>$_POST['estado'],
            "municipio"=>$_POST['municipio'],
            "colonia"=>$_POST['colonia'],
            "calle"=>$_POST['calle'],
            "noExt"=>$_POST['noExt'],
            "noInt"=>$_POST['noInt'],
            "CP"=>$_POST['CP'],
            "tipo"=>$_POST['tipo'],
        );
        $direccionModel->update($direccionModel->select('userInfo')->find($_POST['id'])->userInfo,$data);

        return redirect('administrador/administrarPacientes','refresh');
    }


    public function eliminarPaciente(){
        return view('common/head').
            view('common/menu').
            view('administrador/eliminarPaciente').
            view('common/footer');
    }

    public function agregarPacientes(){
        return view('common/head').
            view('common/menu').
            view('administrador/agregarPacientes').
            view('common/footer');
    }

    public function agregarPacientes2(){
        return view('common/head').
            view('common/menu').
            view('administrador/agregarPacientes2').
            view('common/footer');
    }

    public function agregarPacientes3(){
        return view('common/head').
            view('common/menu').
            view('administrador/agregarPacientes3').
            view('common/footer');
    }


    //Sección para médicos
    public function administrarMedicos(){
        $userInfoModel = model('UserInfoModel');
        $data['usersInfo'] = $userInfoModel->findAll();

        $usersModel = model('UsersModel');
        $data['users'] = $usersModel->findAll();

        $medicoModel = model('MedicoModel');
        $data['medicos'] = $medicoModel->findAll();

        return view('common/head').
               view('common/menu').
               view('administrador/administrarMedicos',$data).
               view('common/footer');
    }

    public function buscarMedicos(){
        return view('common/head').
            view('common/menu').
            view('administrador/administrarMedicos').
            view('common/footer');
    }

    public function editarMedico(){
        return view('common/head').
            view('common/menu').
            view('administrador/editarMedico').
            view('common/footer');
    }

    public function editarMedico2(){
        return view('common/head').
            view('common/menu').
            view('administrador/editarMedico2').
            view('common/footer');
    }

    public function eliminarMedico(){
        return view('common/head').
            view('common/menu').
            view('administrador/eliminarMedico').
            view('common/footer');
    }

    public function agregarMedicos(){
        return view('common/head').
            view('common/menu').
            view('administrador/agregarMedicos').
            view('common/footer');
    }

    public function agregarMedicos2(){
        return view('common/head').
            view('common/menu').
            view('administrador/agregarMedicos2').
            view('common/footer');
    }


    //Sección para medicamentos
    public function administrarMedicamentos(){
        $medicamentosModel = model('MedicamentosModel');
        $data['medicamentos'] = $medicamentosModel->findAll();

        return view('common/head').
               view('common/menu').
               view('administrador/administrarMedicamentos',$data).
               view('common/footer');
    }

    public function buscarMedicamentos(){
        return view('common/head').
            view('common/menu').
            view('administrador/administrarMedicamentos').
            view('common/footer');
    }

    public function editarMedicamento(){
        return view('common/head').
            view('common/menu').
            view('administrador/editarMedicamento').
            view('common/footer');
    }

    public function eliminarMedicamento(){
        return view('common/head').
            view('common/menu').
            view('administrador/eliminarMedicamento').
            view('common/footer');
    }

    public function agregarMedicamentos(){
        return view('common/head').
            view('common/menu').
            view('administrador/agregarMedicamentos').
            view('common/footer');
    }
}

