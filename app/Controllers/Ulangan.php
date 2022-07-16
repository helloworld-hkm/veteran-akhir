<?php

namespace App\Controllers;
use App\Models\ModelAuth;
use CodeIgniter\CLI\Console;
use App\Models\ModelUlangan;
class Ulangan extends BaseController
{
    public function __Construct()
    {
        $this->ModelUlangan = new ModelUlangan();
    }
    public function kerjakan($kelas,$mapel)
    { 
        $idSiswa=$this->db->table('siswa')->join('user','siswa.user_id=user.id')->select('siswa.id')->where('username',session()->username)->get()->getRow(); 
        $idUlangan = $this->db->table('ulangan')->where('id_kelas',$kelas)->where('id_mapel',$mapel)->get()->getRow(); 
        $cek_status=$this->db->table('ikut_ulangan')->where('id_siswa',$idSiswa->id)->where('id_ulangan',$idUlangan->id_ulangan)->get()->getRow();

        // dd($cek_status);
        if($cek_status==null){
            $builder = $this->db->table('soal')->where('kelas',$kelas)->where('mapel',$mapel);
        $query   = $builder->get();
        // $data['soal']=$query->getResult();
        $data=[
            'soal'=>$query->getResult(),
            'id'=>$query->getRow()
        ];
        // dd( $data['soal']);
        // dd($data['soal']);
      
       
        
        return view('ulangan/kerjakan',$data);
        } else{
            session()->setFlashdata('eror', 'Ulangan Sudah Dikerjakan');
            return redirect()->to(base_url('siswa/index'));

        }
        
    }
    public function hitung()
    {
        $kelas=$this->request->getPost('kelas');
        $mapel=$this->request->getPost('mapel');
        $builder = $this->db->table('soal')->where('kelas',$kelas)->where('mapel',$mapel);
        $idUlangan = $this->db->table('ulangan')->where('id_kelas',$kelas)->where('id_mapel',$mapel)->get()->getRow();
        $idSiswa=$this->db->table('siswa')->join('user','siswa.user_id=user.id')->select('siswa.id')->where('username',session()->username)->get()->getRow();
       
        $query   = $builder->get();
        $data['soal']=$query->getResult();
        // dd($query->getResult());
        $jumlahSoal=count($query->getResult());
    //  dd( $data['soal']);
        $benar=0;
        foreach ($data['soal'] as $key => $soal) {
            $pilihan='jawaban'.$soal->id_soal;
        
           $jwb=$this->request->getPost($pilihan);
    
    
            $soal = $this->db->table('soal')->where('kelas',$kelas)->where('mapel',$mapel)->where('id_soal',$soal->id_soal)->get()->getRow();
            // dd($builder);
            if ( $jwb==$soal->jawaban) {
               $benar++;
            }
            // dd($cek);
        }
        // dd ($benar);
        if ($benar>=1) {
            $bobot=100/$jumlahSoal;
            $nilai=$benar*$bobot;
            // echo($benar);
            // echo(" " );
            // echo(round($nilai));
        }
        else {
            
           $nilai=0;
            
        }
        
        $data=[
            'id_ulangan'=>$idUlangan->id_ulangan,
            'id_siswa'=>$idSiswa->id,
            'list_jawaban'=>'kosong dulu',
            'nilai'=>$nilai,
            'jml_benar'=>intval($benar),
            'status'=>'Y',
        ];
       
        $this->ModelUlangan->save($data);
        return redirect()->to('ulangan/selesai/'.$idUlangan->id_ulangan);
       
        
        
    }
    public function selesai($idUlangan)
    {
        
        $idSiswa=$this->db->table('siswa')->join('user','siswa.user_id=user.id')->select('siswa.id')->where('username',session()->username)->get()->getRow();
        // dd($idSiswa);
        $dataUlangan=$this->db->table('ikut_ulangan')->where('id_siswa',$idSiswa->id)->where('id_ulangan',$idUlangan)->get()->getRow();
        // dd($dataUlangan);
        $data=[
            'nilai'=>$dataUlangan->nilai
        ];
       return view('ulangan/selesai',$data);
    }

}