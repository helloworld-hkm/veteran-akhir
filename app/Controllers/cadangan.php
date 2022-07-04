<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }
    public function cekUser()
    {
        $username=$this->request->getPost('username');
        $password=$this->request->getPost('password');

        $validation = \Config\Services::validation();
        $valid = $this->validate([
            'username'=>[
                'rules'=>'required',
                'errors'=>[
                    'required','username harus diisi'
                ]

                ],
                'password'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required','password harus diisi'
                    ]
    
                    ]
            ]);

            if ($valid) {
                //okay
            }else{
                $validation= \Config\Services::validation()->getErrors();
                session()->setFlashdata('errors',$validation);
                return redirect()->to(base_url('Auth/register'));
            }
            

    }
    
}
