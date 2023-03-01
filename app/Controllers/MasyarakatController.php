<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Masyarakat;

class MasyarakatController extends BaseController
{

    protected $masyarakats;

    function __construct()
    {
        $this->masyarakats = new Masyarakat();
    }

    # Views ========================================================================>

    public function index()
    {
        $data['masyarakat'] = $this->masyarakats->findAll();
        return view('admin/masyarakat', $data);
    }

    #==============================================================================>


    # Simpan ======================================================================>

    public function savemasyarakat()
    {
        $data = array(
            'nik' => $this->request->getPost('nik'),
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password') . "", PASSWORD_DEFAULT),
            'telp' => $this->request->getPost('telp'),
        );
        $this->masyarakats->insert($data);
        session()->setFlashdata("message", 'Data Berhasil disimpan');
        return $this->response->redirect('/masyarakat');
    }

    #==============================================================================>


    # Edit ========================================================================>

    public function editmasy($id)
    {
        if ($this->request->getPost('ubahpassword') == null) {
            $data = array(
                'nik' => $this->request->getPost('nik'),
                'nama' => $this->request->getPost('nama'),
                'username' => $this->request->getPost('username'),
                'telp' => $this->request->getPost('telp'),
            );
            $this->masyarakats->update($id, $data);
        } else {
            $data = array(
                'nik' => $this->request->getPost('nik'),
                'nama' => $this->request->getPost('nama'),
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password') . "", PASSWORD_DEFAULT),
                'telp' => $this->request->getPost('telp'),
            );
            $this->masyarakats->update($id, $data);
        }
        session()->setFlashdata("message", "data berhasi diubah");
        return $this->response->redirect('/masyarakat');
    }

    #==============================================================================>


    # Hapus ========================================================================>

    public function hapusmasy($id)
    {
        $this->masyarakats->delete($id);
        session()->setFlashdata("message", "data berhasil dihapus");
        return $this->response->redirect('/masyarakat');
    }

    #==============================================================================>

}
