<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Medico extends BaseController
{
    public function index()
    {
        return view('common/head').
               view('common/menuUsers').
               view('medico/index').
               view('common/footer');
    }

    public function opciones(){
        return view('common/head').
               view('common/menuBase').
               view('medico/opciones').
               view('common/footer');
    }



    //Sección para pacientes
    public function buscarPacientes(){
        return view('common/head').
            view('common/menuBase').
            view('medico/administrarPacientes').
            view('common/footer');
    }

    public function agregarPacientes(){
        return view('common/head').
        view('common/menuBase').
        view('medico/agregarPacientes').
            view('common/footer');
    }

    public function buscarPacientesAgregar(){
        return view('common/head').
        view('common/menuBase').
        view('medico/agregarPacientes').
            view('common/footer');
    }

    public function eliminarPaciente(){
        return view('common/head').
        view('common/menuBase').
        view('medico/eliminarPaciente').
            view('common/footer');
    }

    public function buscarPacientesEliminar(){
        return view('common/head').
        view('common/menuBase').
        view('medico/eliminarPaciente').
            view('common/footer');
    }

    public function administrarPacientes(){
        return view('common/head').
        view('common/menuBase').
        view('medico/administrarPacientes').
               view('common/footer');
    }

    public function administrarConsultas(){
        return view('common/head').
        view('common/menuBase').
        view('medico/administrarConsultas').
            view('common/footer');
    }

    public function buscarConsulta(){
        return view('common/head').
        view('common/menuBase').
        view('medico/administrarConsultas').
            view('common/footer');
    }
    
    public function editarConsulta(){
        return view('common/head').
        view('common/menuBase').
        view('medico/editarConsulta').
            view('common/footer');
    }

    public function agregarMedicamentoConsulta(){
        return view('common/head').
        view('common/menuBase').
        view('medico/editarConsulta').
            view('common/footer');
    }

    public function eliminarMedicamentoConsulta(){
        return view('common/head').
        view('common/menuBase').
        view('medico/editarConsulta').
            view('common/footer');
    }

    public function agregarEstudiosConsulta(){
        return view('common/head').
        view('common/menuBase').
        view('medico/editarConsulta').
            view('common/footer');
    }

    public function eliminarEstudioConsulta(){
        return view('common/head').
        view('common/menuBase').
        view('medico/editarConsulta').
            view('common/footer');
    }

    public function agregarConsulta(){
        return view('common/head').
        view('common/menuBase').
        view('medico/agregarConsulta').
            view('common/footer');
    }

    public function administrarRecetas(){
        return view('common/head').
        view('common/menuBase').
        view('medico/administrarRecetas').
            view('common/footer');
    }

    public function administrarEstudiosMedicos(){
        return view('common/head').
        view('common/menuBase').
        view('medico/administrarEstudiosMedicos').
            view('common/footer');
    }
}

