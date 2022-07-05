<?php

namespace App\Controllers;
use App\Models\ModelAuth;
class Ulangan extends BaseController
{
    public function kerjakan()
    {
        $builder = $this->db->table('tbl_soal');
        $query   = $builder->get();
        $data['spal']=$query->getResult();
        return view('ulangan',$data);
    }

}