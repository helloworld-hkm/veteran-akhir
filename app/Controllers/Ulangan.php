<?php

namespace App\Controllers;
use App\Models\ModelAuth;
class Ulangan extends BaseController
{
    public function kerjakan($kelas,$mapel)
    {
        $builder = $this->db->table('soal')->where('kelas',$kelas)->where('mapel',$mapel);
        $query   = $builder->get();
        $data['soal']=$query->getResult();
      
       
        
        return view('ulangan/kerjakan',$data);
    }
    public function hitung($kelas,$mapel)
    {
        
        $builder = $this->db->table('soal')->where('kelas',$kelas)->where('mapel',$mapel);
        $query   = $builder->get();
        $data['soal']=$query->getResult();
        $benar=0;
        foreach ($data['soal'] as $key => $soal) {
            $pilihan='pilihan'.$soal->id_soal;
            // dd($pilihan);
            $cek = $this->db->table('soal')->where('jawaban',$this->request->getVar($pilihan))->get()->getResult();
            
        }
        
    }

}