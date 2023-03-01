<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengaduan extends Model
{
    protected $table      = 'tbl_pengaduan';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_pengaduan';
    protected $allowedFields = ['tgl_pengaduan', 'nik', 'isi_laporan', 'foto', 'status'];

    protected $useSoftDeletes = true;
    protected $deletedFields = 'deleted_at';
}
