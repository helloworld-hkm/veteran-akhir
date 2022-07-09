<?php

namespace App\Controllers;
use App\Models\ModelSiswa;
class Siswa extends BaseController
{
    protected $data_user;
    public function __Construct()
    {
        $this->ModelSiswa = new ModelSiswa();
   
    }
    public function index()
    {
        $this->data_user= $this->db->table('siswa')->where('user_id',session()->get('id_user'))->get()->getRow();
       
        $builder = $this->db->table('ulangan');
        $query   = $builder->get();
       
        $data=[
            'title'=>'siswa',
            'ulangan'=>$query->getResult(),
            'siswa'=> $this->data_user
    ];

        return view('siswa/index',$data);
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
