<?php

namespace App\Controllers;

use App\Models\ModelAuth;

class Admin extends BaseController
{
    public function __Construct()
    {
        helper('form');
        $this->ModelAuth = new ModelAuth();
    }

    public function index()
    {

        $builder = $this->db->table('jurusan');
        $query   = $builder->get();
        $jurusan = count($query->getResult());

        $builder = $this->db->table('siswa');
        $query1   = $builder->get();
        $siswa = count($query1->getResult());

        $builder = $this->db->table('kelas');
        $query2   = $builder->get();
        $kelas = count($query2->getResult());

        $builder = $this->db->table('guru');
        $query3   = $builder->get();
        $guru = count($query3->getResult());
        $data = [
            'title' => 'home',
            'jurusan' => $jurusan,
            'siswa' => $siswa,
            'kelas' => $kelas,
            'guru' => $guru,



        ];



        return view('admin/home', $data);
    }

    public function simpanSiswa()
    {
        $valid = $this->validate([
            'username' => [

                'rules' => 'is_unique[user.username]',
                'errors' => [
                    'required', 'username harus diisi'
                ]

            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required', 'password harus diisi'
                ]

            ]

        ]);
        if ($valid) {
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('username'), PASSWORD_DEFAULT),
                'role_id' => 2
            ];
            $this->ModelAuth->save($data);
            $id_siswa = $this->db->table('user')->where([
                'username' => $this->request->getVar('username')
            ])->get()->getRowArray();
            // dd($id_siswa);
            $dataSiswa = [
                'user_id' => $id_siswa['id'],
                'nama' => $this->request->getPost('nama')

            ];
            $this->ModelAuth->siswa($dataSiswa);

            session()->setFlashdata('pesan', 'register berhasil');
            return redirect()->to(base_url('Admin/siswa/'));
        } else {

            $validation = \Config\Services::validation();
            return redirect()->to(base_url('Admin/registerSiswa'))->withInput('validation', $validation);
        }
    }

    public function simpanGuru()
    {
        $valid = $this->validate([
            'username' => [

                'rules' => 'is_unique[user.username]',
                'errors' => [
                    'required', 'username harus diisi'
                ]

            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required', 'password harus diisi'
                ]

            ]

        ]);
        if ($valid) {
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('username'), PASSWORD_DEFAULT),
                'role_id' => 3
            ];
            $this->ModelAuth->save($data);
            $id_guru = $this->db->table('user')->where([
                'username' => $this->request->getVar('username')
            ])->get()->getRowArray();
            // dd($id_siswa);
            $dataGuru = [
                'user_id' => $id_guru['id'],
                'nama' => $this->request->getPost('nama')

            ];
            $this->ModelAuth->guru($dataGuru);

            session()->setFlashdata('pesan', 'register berhasil');
            return redirect()->to(base_url('Admin/guru/'));
        } else {

            $validation = \Config\Services::validation();
            return redirect()->to(base_url('Admin/registerGuru'))->withInput('validation', $validation);
        }
    }

    public function registerGuru()
    {
        $data = [
            'title' => 'register guru',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/guru/tambah', $data);
    }

    public function registerSiswa()
    {
        $data = [
            'title' => 'register siswa',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/siswa/tambah', $data);
    }

    public function hapusSiswa($id)
    {
        $this->db->table('siswa')->where(['id' => $id])->delete();
        return redirect()->to(base_url('/admin/siswa'))->with('success', 'Data Berhasil Dihapus!');
    }
    //guru

    public function guru()
    {
        $data['title'] = 'Data Guru';
        $builder = $this->db->table('guru');
        $query = $builder->get();
        $data['guru'] = $query->getResult();
        return view('admin/guru/index', $data);
    }
    public function siswa()
    {
        $data['title'] = 'Data Siswa';
        $builder = $this->db->table('siswa');
        $query   = $builder->get();
        $data['siswa'] = $query->getResult();

        return view('admin/siswa/index', $data);
    }

    public function mapel()
    {
        $data['title'] = 'Data Mapel';

        $builder = $this->db->table('mapel');
        $query   = $builder->get();
        $data['mapel'] = $query->getResult();
        return view('admin/mapel/index', $data);
    }
    public function tambahMapel()
    {
        $data = [
            'title' => 'Tambah Data Mapel',
            'validation' => \Config\Services::validation()

        ];

        return view('admin/mapel/tambah', $data);
    }

    public function simpanMapel()
    {
        if (!$this->validate([

            'nama_mapel' => ['rules' => 'required|is_unique[mapel.nama_mapel]', 'errors' => ['is_unique' => 'data Mapel Sudah Ada!!', 'required' => 'NISN wajib diisi!!']]


        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/tambahMapel')->with('is_unique', 'Data Mapel Sudah Ada!!!')->withInput();
        }
        $data = [
            'nama_mapel' => ucwords($this->request->getVar('nama_mapel'))

        ];
        $this->db->table('mapel')->insert($data);
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(base_url('/admin/mapel'))->with('success', 'Data Berhasil Disimpan!');
        }
        return view('admin/mapel/tambah', $data);
    }

    public function editMapel($id = null)
    {
        $data['title'] = "Edit Mata Pelajaran";
        if ($id != null) {
            $query = $this->db->table('mapel')->getWhere(['id' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['mapel'] = $query->getRow();
                return view('admin/mapel/edit', $data);
            } else {
                return redirect()->to(base_url('/admin/mapel'))->with('eror', 'Data Tidak Ditemukan!');
            }
        } else {
            return redirect()->to(base_url('/admin/mapel'))->with('eror', 'Data Tidak Ditemukan!');
        }
    }

    public function updateMapel($id)
    {
        $data = $this->request->getPost();
        if (!$this->validate([

            'nama_mapel' => ['rules' => 'required|is_unique[mapel.nama_mapel]', 'errors' => ['is_unique' => 'data Mapel Sudah Ada!!', 'required' => 'NISN wajib diisi!!']]


        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/editMapel/' . $id)->with('is_unique', 'Data Mapel Sudah Ada!!!')->withInput();
        }
        $data = [
            'nama_mapel' => ucwords($this->request->getVar('nama_mapel'))

        ];
        unset($data['_method']);
        $this->db->table('mapel')->where(['id' => $id])->update($data);
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(base_url('/admin/mapel'))->with('success', 'Data Berhasil Diubah!');
        }
        // return view('admin/mapel/tambah',$data);

    }
    public function hapusMapel($id)
    {
        $this->db->table('mapel')->where(['id' => $id])->delete();
        return redirect()->to(base_url('/admin/mapel'))->with('success', 'Data Berhasil Dihapus!');
    }

    // jurusan
    public function jurusan()
    {
        $data['title'] = 'Data Jurusan';

        $builder = $this->db->table('jurusan');
        $query   = $builder->get();
        $data['jurusan'] = $query->getResult();
        return view('admin/jurusan/index', $data);
    }

    public function tambahJurusan()
    {
        $data = [
            'title' => 'Tambah Data Jurusan',
            'validation' => \Config\Services::validation()

        ];

        return view('admin/jurusan/tambah', $data);
    }
    public function simpanJurusan()
    {
        $validate = $this->validate([

            'keterangan' => [
                'rules' => 'required|is_unique[jurusan.keterangan]',
                'errors' => [
                    'is_unique' => 'Keterangan Tidak Boleh Sama!!'
                ]
            ],
            'nama_jurusan' => ['rules' => 'required|is_unique[jurusan.nama_jurusan]', 'errors' => ['is_unique' => 'Kode Jurusan Tidak Boleh Sama!!']]
        ]);
        if (!$validate) {
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/tambahJurusan')->withInput('validation', $validation);;
        }
        $data = [
            'nama_jurusan' => strtoupper($this->request->getVar('nama_jurusan')),
            'keterangan' => ucwords($this->request->getVar('keterangan')),
        ];
        $this->db->table('jurusan')->insert($data);
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(base_url('/admin/jurusan'))->with('success', 'Data Berhasil Disimpan!');
        }
        return view('admin/jurusan/tambah', $data);
    }

    public function editJurusan($id = null)
    {
        $data = [
            'title' => 'Edit Data Jurusan',
            'validation' => \Config\Services::validation()

        ];
        if ($id != null) {
            $query = $this->db->table('jurusan')->getWhere(['id_jurusan' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['jurusan'] = $query->getRow();
                return view('admin/jurusan/edit', $data);
            } else {
                return redirect()->to(base_url('/admin/jurusan'))->with('eror', 'Data Tidak Ditemukan!');
            }
        } else {
            return redirect()->to(base_url('/admin/jurusan'))->with('eror', 'Data Tidak Ditemukan!');
        }
    }

    public function updateJurusan($id)
    {
        $validate = $this->validate([

            'keterangan' => [
                'rules' => 'required|is_unique[jurusan.keterangan]',
                'errors' => [
                    'is_unique' => 'Keterangan Tidak Boleh Sama!!'
                ]
            ],
            'nama_jurusan' => ['rules' => 'required|is_unique[jurusan.nama_jurusan]', 'errors' => ['is_unique' => 'Kode Jurusan Tidak Boleh Sama!!']]
        ]);
        if (!$validate) {
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/editJurusan/' . $id)->withInput('validation', $validation);;
        }
        $data = [
            'nama_jurusan' => strtoupper($this->request->getVar('nama_jurusan')),
            'keterangan' => ucwords($this->request->getVar('keterangan')),
        ];
        unset($data['_method']);
        $this->db->table('jurusan')->where(['id_jurusan' => $id])->update($data);
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(base_url('/admin/jurusan'))->with('success', 'Data Berhasil Diubah!');
        }
        return view('admin/jurusan/tambah', $data);
    }

    public function hapusJurusan($id)
    {
        $this->db->table('jurusan')->where(['id_jurusan' => $id])->delete();
        return redirect()->to(base_url('/admin/jurusan'))->with('success', 'Data Berhasil Dihapus!');
    }

    public function kelas()
    {
        $data['title'] = 'Data Kelas';

        $builder = $this->db->table('kelas');
        $query   = $builder->get();
        $data['kelas'] = $query->getResult();
        return view('admin/kelas/index', $data);
    }

    public function tambahKelas()
    {
        $builder = $this->db->table('jurusan');
        $query   = $builder->get();

        $data = [
            'title' => 'Tambah Data Kelas',
            'validation' => \Config\Services::validation(),
            'jurusan' => $query->getResult()

        ];

        return view('admin/kelas/tambah', $data);
    }
    public function simpanKelas()
    {
        // $validate=$this->validate([

        //     'keterangan' => [
        //         'rules' => 'required|is_unique[jurusan.keterangan]', 
        //         'errors' => [
        //             'is_unique' => 'Keterangan Tidak Boleh Sama!!'
        //             ]
        //         ],
        //     'nama_jurusan' => ['rules' => 'required|is_unique[jurusan.nama_jurusan]', 'errors' => ['is_unique' => 'Kode Jurusan Tidak Boleh Sama!!']]
        // ]); 
        // if (!$validate) {
        //       $validation = \Config\Services::validation();
        //     return redirect()->to('/admin/tambahJurusan')->withInput('validation',$validation);;
        // }
        $nama_jurusan = $this->db->table('jurusan')->where([
            'id_jurusan' => $this->request->getVar('jurusan_id')
        ])->get()->getRowArray();;
        // dd($nama_jurusan);
        $data = [
            'tingkatan' => $this->request->getVar('tingkatan'),
            'rombel' => $this->request->getVar('rombel'),
            'jurusan_id' => $this->request->getVar('jurusan_id'),
            'nama_kelas' => strtoupper($this->request->getVar('tingkatan') . $nama_jurusan['nama_jurusan'] . $this->request->getVar('rombel')),
        ];
        $this->db->table('kelas')->insert($data);
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(base_url('/admin/kelas'))->with('success', 'Data Berhasil Disimpan!');
        }
        return view('admin/kelas/tambah', $data);
    }
    public function hapusKelas($id)
    {
        $this->db->table('kelas')->where(['id_kelas' => $id])->delete();
        return redirect()->to(base_url('/admin/kelas'))->with('success', 'Data Berhasil Dihapus!');
    }


    public function editKelas($id = null)
    {
        $builder = $this->db->table('jurusan');
        $query   = $builder->get();
        $data = [
            'title' => 'Edit Data kelas',
            'validation' => \Config\Services::validation(),
            'jurusan' => $query->getResult()


        ];
        if ($id != null) {
            $query = $this->db->table('kelas')->getWhere(['id_kelas' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['kelas'] = $query->getRow();
                return view('admin/kelas/edit', $data);
            } else {
                return redirect()->to(base_url('/admin/kelas'))->with('eror', 'Data Tidak Ditemukan!');
            }
        } else {
            return redirect()->to(base_url('/admin/kelas'))->with('eror', 'Data Tidak Ditemukan!');
        }
    }

    public function updateKelas($id)
    {
        // $validate=$this->validate([

        //     'keterangan' => [
        //         'rules' => 'required|is_unique[jurusan.keterangan]', 
        //         'errors' => [
        //             'is_unique' => 'Keterangan Tidak Boleh Sama!!'
        //             ]
        //         ],
        //     'nama_jurusan' => ['rules' => 'required|is_unique[jurusan.nama_jurusan]', 'errors' => ['is_unique' => 'Kode Jurusan Tidak Boleh Sama!!']]
        // ]); 
        // if (!$validate) {
        //      $validation = \Config\Services::validation();
        //     return redirect()->to('/admin/editJurusan/'.$id)->withInput('validation',$validation);;
        // }
        $nama_jurusan = $this->db->table('jurusan')->where([
            'id_jurusan' => $this->request->getVar('jurusan_id')
        ])->get()->getRowArray();;
        // dd($nama_jurusan);
        $data = [
            'tingkatan' => $this->request->getVar('tingkatan'),
            'rombel' => $this->request->getVar('rombel'),
            'jurusan_id' => $this->request->getVar('jurusan_id'),
            'nama_kelas' => strtoupper($this->request->getVar('tingkatan') . $nama_jurusan['nama_jurusan'] . $this->request->getVar('rombel')),
        ];
        unset($data['_method']);
        $this->db->table('kelas')->where(['id_kelas' => $id])->update($data);
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(base_url('/admin/kelas'))->with('success', 'Data Berhasil Diubah!');
        }
        return view('admin/kelas/tambah', $data);
    }

    public function editsiswa($id = null)
    {
        $data['title'] = "Edit Siswa";
        if ($id != null) {
            $query = $this->db->table('siswa')->getWhere(['id' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['siswa'] = $query->getRow();
                return view('admin/siswa/edit', $data);
            } else {
                return redirect()->to(base_url('/admin/siswa'))->with('eror', 'Data Tidak Ditemukan!');
            }
        } else {
            return redirect()->to(base_url('/admin/siswa'))->with('eror', 'Data Tidak Ditemukan!');
        }
    }

    public function updateSiswa($id)
    {
        $data = $this->request->getPost();
        if (!$this->validate([

            'nama' => ['rules' => 'required|is_unique[siswa.nama]', 'errors' => ['is_unique' => 'data Siswa Sudah Ada!!', 'required' => 'NISN wajib diisi!!']]


        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/editSiswa/' . $id)->with('is_unique', 'Data Siswa Sudah Ada!!!')->withInput();
        }
        $data = [
            'nama' => ucwords($this->request->getVar('nama'))

        ];
        unset($data['_method']);
        $this->db->table('siswa')->where(['id' => $id])->update($data);
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(base_url('/admin/siswa'))->with('success', 'Data Berhasil Diubah!');
        }
        // return view('admin/mapel/tambah',$data);

    }
}
