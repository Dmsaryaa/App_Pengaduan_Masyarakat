<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Tanggapan;
use App\Models\Pengaduan;

class TanggapanController extends BaseController
{


    protected $tanggapann, $pengaduann, $db;

    function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->tanggapann = new Tanggapan();
        $this->pengaduann = new Pengaduan();
    }

    public function lapor()
    {
        $data['tanggapan'] = $this->tanggapann->findAll();
        return view('admin/laporan', $data);
    }

    public function simpan()
    {
        $data = [
            'tgl_tanggapan' => date('Y-m-d H:i:s'),
            'id_petugas' => session()->get('id_petugas'),
            'tanggapan' => $this->request->getPost('tanggapan'),
            'id_pengaduan' => $this->request->getPost('id_pengaduan'),
        ];

        $this->tanggapann->insert($data);
        $this->pengaduann->set('status', 'SELESAI');
        $this->pengaduann->where('id_pengaduan', $this->request->getPost('id_pengaduan'));
        $this->pengaduann->update();
        return redirect('pengaduan');
    }

    public function getTanggapan()
    {
        // dd($this->request->getGet('id_pengaduan'));

        $data = $this->tanggapann->where('id_pengaduan', $this->request->getGet('id_pengaduan'))->findAll();
        return response()->setJSON($data);
    }

    public function filter()
    {
        $status = $this->request->getPost('status');
        if ($status == "" || $status == null) {
            $query = $this->db->query("select a.*,b.* from tbl_pengaduan a, tbl_tanggapan b where a.id_pengaduan=b.id_tanggapan");
        } else {
            $query = $this->db->query("select a.*,b.* from tbl_pengaduan a, tbl_tanggapan b where a.id_pengaduan=b.id_tanggapan and a.status='$status'");
        }

        $result = $query->getResultArray();
        $data['pengaduan'] = $result;
        return view('admin/laporan', $data);
    }
}
