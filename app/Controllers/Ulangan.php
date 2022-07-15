<?php

namespace App\Controllers;
use App\Models\ModelAuth;
use CodeIgniter\CLI\Console;

class Ulangan extends BaseController
{
    public function kerjakan($kelas,$mapel)
    {
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
    }
    public function hitung()
    {
        $kelas=$this->request->getPost('kelas');
        $mapel=$this->request->getPost('mapel');
        $builder = $this->db->table('soal')->where('kelas',$kelas)->where('mapel',$mapel);
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
            echo($benar);
            echo(" " );
            echo(round($nilai));
        }
        else {
            
            echo('nilai nol');
            
        }
        
       
        
        
    }

}