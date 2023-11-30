<?php

namespace App\Controllers;

$session = \Config\Services::session();

class Home extends BaseController
{
    public function index()
    {
        //Redireccionar en caso de que ya tenga una sesión iniciada
        $session = session();
        //Se envía a la vista según el tipo de usuario que se tenga
        if ($session->get('logged_in') == TRUE) {
            if ($session->get('idMedico') == FALSE && $session->get('idPaciente') == FALSE) {
                return redirect('administrador', 'refresh');
            }

            if ($session->get('idMedico') == TRUE && $session->get('idPaciente') == FALSE) {
                return redirect('medico', 'refresh');
            }

            if ($session->get('idMedico') == FALSE && $session->get('idPaciente') == TRUE) {
                return redirect('paciente', 'refresh');
            }
        }




        if (strtolower($this->request->getMethod()) === 'get') {
            return view('common/head') .
                view('common/inicioSesion') .
                view('common/footer');
        }


        //Reglas de validación del formulario anterior
        $validation = \Config\Services::validation();
        $rules = [
            'tipo' => 'required|string',
            'username' => 'required|max_length[50]|min_length[1]|string',
            'password' => 'required|max_length[150]|min_length[1]|string',
        ];

        //Se validan los datos del formulario
        if (!$this->validate($rules)) {
            return view('common/head') .
                view('common/inicioSesion', ['validation' => $validation]) .
                view('common/footer');
        } else {
            //si pasa las reglas, se redirecciona a la respectiva vista principal, guardanfo
            // el username y un id de referenci
            $username = $_POST['username'];
            $password = $_POST['password'];
            $tipo = $_POST['tipo'];
            $userModel = model('UsersModel');

            if ($tipo == 'medico') {
                $data['usuario'] = $userModel->where('username', $username)
                    ->where('password', $password)
                    ->where('paciente', NULL)
                    ->findAll();
            }

            if ($tipo == 'paciente') {
                $data['usuario'] = $userModel->where('username', $username)
                    ->where('password', $password)
                    ->where('medico', NULL)
                    ->findAll();
            }

            if ($tipo == 'admin') {
                $data['usuario'] = $userModel->where('username', $username)
                    ->where('password', $password)
                    ->where('paciente', NULL)
                    ->where('medico', NULL)
                    ->findAll();
            }

            print_r($data['usuario']);
            if (count($data['usuario']) > 0) {
                print $data['usuario'][0]->id;

                if ($tipo == 'admin') {
                    session()->set([
                        'idUsuario' => $data['usuario'][0]->id,
                        'username' => $data['usuario'][0]->username,
                        'logged_in' => true,
                    ]);
                    return redirect('administrador', 'refresh');
                }

                if ($tipo == 'medico') {
                    session()->set([
                        'idUsuario' => $data['usuario'][0]->id,
                        'username' => $data['usuario'][0]->username,
                        'logged_in' => true,
                        'idMedico' => $data['usuario'][0]->medico
                    ]);

                    return redirect('medico', 'refresh');
                }

                if ($tipo == 'paciente') {
                    session()->set([
                        'idUsuario' => $data['usuario'][0]->id,
                        'username' => $data['usuario'][0]->username,
                        'logged_in' => true,
                        'idPaciente' => $data['usuario'][0]->paciente
                    ]);
                    return redirect('paciente', 'refresh');
                }
            } else {

                return redirect('/', 'refresh');
            }
        }

    }

    public function cerrarSesion()
    {
        //Redireccionar en caso de que ya tenga una sesión iniciada
        $session = session();
        if ($session->get('logged_in') == TRUE) {
            session_destroy();
            return redirect('/', 'refresh');
        }
    }
}
