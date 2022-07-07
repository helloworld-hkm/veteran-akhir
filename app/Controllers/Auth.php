<?php

namespace App\Controllers;

use App\Models\ModelAuth;

class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelAuth = new ModelAuth();
    }
    public function index()
    {
        return view('auth/login');
    }
    public function register()
    {
        $data = [
            'title' => 'register',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/register/index', $data);
    }



    public function simpanSiswa()
    {
        $valid = $this->validate([
            'username' => [

                'rules' => 'required',
                'errors' => [
                    'required', 'username harus diisi'
                ]

            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required', 'password harus diisi'
                ]

            ]

        ]);
        if ($valid) {
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'role_id' => 1
            ];
            $this->ModelAuth->save($data);
            session()->setFlashdata('pesan', 'register berhasil');
            return redirect()->to(base_url('Auth/register'));
        } else {

            $validation = \Config\Services::validation();
            return redirect()->to(base_url('Auth/register'))->withInput('validation', $validation);
        }
    }

    public function simpanGuru()
    {
        $valid = $this->validate([
            'username' => [

                'rules' => 'required',
                'errors' => [
                    'required', 'username harus diisi'
                ]

            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required', 'password harus diisi'
                ]

            ]

        ]);
        if ($valid) {
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'role_id' => 3
            ];
            $this->ModelAuth->save($data);
            session()->setFlashdata('pesan', 'register berhasil');
            return redirect()->to(base_url('Auth/register'));
        } else {

            $validation = \Config\Services::validation();
            return redirect()->to(base_url('Auth/register'))->withInput('validation', $validation);
        }
    }

    public function login()
    {
        $data['title'] = 'login';
        return view('auth/login', $data);
    }

    public function cekLogin()
    {
        $valid = $this->validate([
            'username' => [

                'rules' => 'required',
                'errors' => [
                    'required', 'username harus diisi'
                ]

            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required', 'password harus diisi'
                ]

            ]

        ]);
        if ($valid) {
            $username = $this->request->getPost('username');

            $password = $this->request->getPost('password');

            $cek = $this->ModelAuth->login($username);


            if ($cek) {
                $pass = $cek['password'];
                // dd($cek);
                $verify_pass = password_verify($password, $pass);
                // dd($verify_pass);
                if ($verify_pass) {
                    session()->set('log', true);
                    session()->set('username', $cek['username']);

                    session()->set('role', $cek['role_id']);
                    //success
                    if ($cek['role_id'] == 1) {
                        # code...
                    }
                    return redirect()->to(base_url('admin'));
                } else {
                    session()->setFlashdata('pesan', 'Login gagal,password salah silahkan ulangi lagi');
                    return redirect()->to(base_url('auth/login'));
                }
            } else {
                session()->setFlashdata('pesan', 'Login gagal, silahkan ulangi lagi');
                return redirect()->to(base_url('auth/login'));
            }
        } else {
            return redirect()->to(base_url('auth/login'));
        }
    }
    public function logout()
    {
        session()->remove('log');
        session()->remove('username');
        session()->remove('role');
        return redirect()->to(base_url('auth/login'));
    }

    // public function cekUser()
    // {
    //     $username=$this->request->getPost('username');
    //     $password=$this->request->getPost('password');

    //     $validation = \Config\Services::validation();
    //     $valid = $this->validate([
    //         'username'=>[
    //             'rules'=>'required',
    //             'errors'=>[
    //                 'required','username harus diisi'
    //             ]

    //             ],
    //             'password'=>[
    //                 'rules'=>'required',
    //                 'errors'=>[
    //                     'required','password harus diisi'
    //                 ]

    //                 ]
    //         ]);


    // }

}
