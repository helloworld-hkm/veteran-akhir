<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelGuru extends Model
{
    protected $table = 'guru';
    protected $useTimestamps = true;
    protected $primarykey = 'id';
    protected $allowedFields = ['id', 'user_id', 'nama', 'tempat_lahir','tanggal_lahir','jenis_kelamin','agama','no_hp','alamat','foto'];
}
