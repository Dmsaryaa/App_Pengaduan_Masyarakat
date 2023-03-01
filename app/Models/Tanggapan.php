<?php

namespace App\Models;

use CodeIgniter\Model;

class Tanggapan extends Model
{
    protected $table      = 'tbl_tanggapan';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_tanggapan';
    protected $allowedFields = ['id_pengaduan', 'tgl_tanggapan', 'tanggapan', 'id_petugas'];

    protected $useSoftDeletes = true;
    protected $deletedFields = 'deleted_at';
}
