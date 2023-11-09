<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
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
            $data['usuario']= $userModel->like('username',$username)
                            ->Like('password',$password)
                            ->findAll();
            print_r($data['usuario']);
            if(count($data['usuario'])>0){
                print $data['usuario'][0]->idUsuario;
                $session = session();

                $newdata = [
                    'idUsuario' => $data['usuario'][0]->id,
                    'username'     => $data['usuario'][0]->username,
                    'logged_in' => true,
                ];
                
                $session->set($newdata);

            }
            else{
                return redirect('/','refresh');
            }
        }

    }
}
