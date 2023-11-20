<?php

namespace App\Controllers;
$session = \Config\Services::session();

class Home extends BaseController
{
    public function index()
    {
        $validation =  \Config\Services::validation();
        if (strtolower($this->request->getMethod()) === 'get'){
            return view('common/head') .
            view('common/inicioSesion') .
            view('common/footer');
        }

        $rules = [
            'username' => 'required',
            'password'=>'required',
            'tipo'=>'required'
        ];

        if (! $this->validate($rules)) {
            return view('common/head') .
            view('common/inicioSesion') .
            view('common/footer');
        }
        else{
            //si pasa las reglas
            $username = $_POST['username'];
            $password = $_POST['password'];
            $tipo = $_POST['tipo'];
            $userModel = model('UsersModel');

            if($tipo == 'medico'){
                $data['usuario']= $userModel->like('username',$username)
                            ->Like('password',$password)
                            ->where('medico',!NULL)
                            ->findAll();
            }

            if($tipo == 'paciente'){
                $data['usuario']= $userModel->like('username',$username)
                            ->Like('password',$password)
                            ->where('paciente',!NULL)
                            ->findAll();
            }

            if($tipo == 'admin'){
                $data['usuario']= $userModel->like('username',$username)
                            ->Like('password',$password)
                            ->where('paciente',NULL)
                            ->where('medico',NULL)
                            ->findAll();
            }
            
            print_r($data['usuario']);
            if(count($data['usuario'])>0){
                print $data['usuario'][0]->id;
            
                if($tipo == 'admin'){
                    session()->set([
                        'idUsuario' => $data['usuario'][0]->id,
                        'username'     => $data['usuario'][0]->username,
                        'logged_in' => true,
                    ]);
                    return redirect('administrador', 'refresh');
                }

                if($tipo == 'medico'){
                    session()->set([
                        'idUsuario' => $data['usuario'][0]->id,
                        'username'     => $data['usuario'][0]->username,
                        'logged_in' => true,
                        'idMedico' => $data['usuario'][0]->medico
                    ]);
                    
                    return redirect('medico',);
                }

                if($tipo == 'paciente'){
                    session()->set([
                        'idUsuario' => $data['usuario'][0]->id,
                        'username'     => $data['usuario'][0]->username,
                        'logged_in' => true,
                        'idPaciente' => $data['usuario'][0]->paciente
                    ]);
                    return redirect('paciente', 'refresh');
                }
            }
            else{
                return redirect('/','refresh');
            }
        }

    }

    public function cerrarSesion(){
        session_destroy();
        return redirect('/','refresh');
    }
}
