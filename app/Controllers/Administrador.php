<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Administrador extends BaseController
{
    public function index()
    {
        return view('common/head').
               view('common/menuUsers').
               view('administrador/index').
               view('common/footer');
    }

    public function opciones(){
        return view('common/head').
               view('common/menu').
               view('administrador/opciones').
               view('common/footer');
    }



    //Sección para pacientes
    public function administrarPacientes(){
        return view('common/head').
               view('common/menu').
               view('administrador/administrarPacientes').
               view('common/footer');
    }

    public function buscarPacientes(){
        return view('common/head').
            view('common/menu').
            view('administrador/administrarPacientes').
            view('common/footer');
    }

    public function editarPaciente(){
        return view('common/head').
            view('common/menu').
            view('administrador/editarPaciente').
            view('common/footer');
    }

    public function editarPaciente2(){
        return view('common/head').
            view('common/menu').
            view('administrador/editarPaciente2').
            view('common/footer');
    }

    public function editarPaciente3(){
        return view('common/head').
            view('common/menu').
            view('administrador/editarPaciente3').
            view('common/footer');
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


    //Sección para médicos
    public function administrarMedicos(){
        return view('common/head').
               view('common/menu').
               view('administrador/administrarMedicos').
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
        return view('common/head').
               view('common/menu').
               view('administrador/administrarMedicamentos').
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

