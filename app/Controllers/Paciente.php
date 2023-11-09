<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Paciente extends BaseController
{
    public function index()
    {

    }

    public function opciones(){
        return view('common/head').
               view('common/menuBase').
               view('paciente/opciones').
               view('common/footer');
    }

    public function administrarConsultas(){
        return view('common/head').
               view('common/menuBase').
               view('paciente/administrarConsultas').
               view('common/footer');
    }
}

