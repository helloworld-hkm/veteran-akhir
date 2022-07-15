<?php

namespace App\Controllers;
use App\Models\ModelAuth;
use App\Models\ModelSiswa;

class Siswa extends BaseController
{
    // protected $encrypter;
    protected $data_user;
    public function __Construct()
    {
        $this->ModelAuth = new ModelAuth();
        $this->ModelSiswa = new ModelSiswa();
        // $this->encrypter = \Config\Services::encrypter();

    }
    public function index()
    {

        $this->data_user = $this->db->table('siswa')->where('user_id', session()->get('id_user'))->get()->getRow();
        session()->set('nama', $this->data_user->nama);
        $dataPassword = $this->db->table('user')->where('username', session()->get('username'))->get()->getRow();
        $verify_pass = password_verify(session()->get('username'), $dataPassword->password);
        // if ($verify_pass) {
        //     dd( $verify_pass);
        // } else{
        //     echo('salah');
        // }

        $kelas =  $this->data_user->id_kelas;
        $builder = $this->db->table('ulangan');
        $query   = $builder->join('mapel', 'mapel.id=ulangan.id_mapel')->where('id_kelas', $kelas)->get();
        // dd($query->getResult());
        // $id_siswa=$this->data_user->id;
        // $jadwal=$this->db->query("SELECT ulangan.*, (SELECT count(id_tes) FROM ikut_ulangan WHERE ikut_ulangan.id_siswa=". $this->data_user->id." AND ikut_ulangan.id_ulangan=ulangan.id_ulangan) AS sudah_ikut, (SELECT id_mapel FROM mapel WHERE mapel.id=ulangan.id_mapel) AS mapel, (SELECT status FROM ikut_ulangan WHERE ikut_ulangan.id_siswa=".$this->data_user->id." AND ikut_ulangan.id_ulangan=ulangan.id_ulangan) AS status FROM ulangan, siswa WHERE ulangan.id_kelas=siswa.id_kelas AND siswa.id=".$this->data_user->id." ORDER BY sudah_ikut ASC;");

        $data = [
            'title' => 'siswa',
            'ulangan' => $query->getResult(),
            'siswa' => $this->data_user,
            'cek_password' => $verify_pass


        ];


        return view('siswa/index', $data);
    }

    public function ubahPassword()
    {
       
        $data = [
            'title' => 'siswa',



        ];


        return view('siswa/ubahPassword', $data);
    }
    public function updatePassword()
    {
        $passwordLama = $this->request->getPost('passwordLama');
        $passwordbaru = $this->request->getPost('passwordBaru');
        $konfirm = $this->request->getPost('konfirm');
      
        $id=session()->id_siswa;
        $this->data_user = $this->db->table('siswa')->where('user_id', session()->get('id_user'))->get()->getRow();
        session()->set('nama', $this->data_user->nama);
        $dataPassword = $this->db->table('user')->where('username', session()->get('username'))->get()->getRow();
        $verify_pass = password_verify($passwordLama, $dataPassword->password);
       if ($verify_pass) {
        $data = [
           
            'password' => password_hash($passwordbaru, PASSWORD_DEFAULT),
            
        ];
        $this->ModelAuth->update($id,$data);
        session()->setFlashdata('success', 'Password berhasil Diubah');
        return redirect()->to(base_url('siswa/index'));
       }else{
        session()->setFlashdata('eror', 'Password Lama tidak sesuai');
        return redirect()->to(base_url('siswa/ubahPassword'));
       }
        $data = [
            'title' => 'siswa',



        ];


        return view('siswa/ubahPassword', $data);
    }

    public function cekUser()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $validation = \Config\Services::validation();
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
            //okay
        } else {
            $validation = \Config\Services::validation()->getErrors();
            session()->setFlashdata('errors', $validation);
            return redirect()->to(base_url('Auth/register'));
        }
    }
}
