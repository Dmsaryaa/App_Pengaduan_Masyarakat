<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Petugas;
use App\Models\Masyarakat;

class LoginController extends BaseController
{

    protected $masyaraaktt;

    function __construct()
    {
        $this->masyaraaktt = new Masyarakat;
    }


    # Login View ========================================================================>

    public function index()
    {
        return view('user/login');
    }

    #====================================================================================>


    # Login =============================================================================>

    public function savelogin()
    {
        $masy = new Masyarakat();
        $pet  = new Petugas();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password') . "";

        $cekPet = $pet->where(['username' => $username])->first();
        $cekMasy = $masy->where(['username' => $username])->first();

        if (!($cekMasy) && !($cekPet)) {
            return redirect('login')->with("error", lang('Username Tidak Ditemukan'));
        } else {
            # Masyarakat 
            # ========================================================================>
            if ($cekMasy) {
                if (password_verify($password, $cekMasy['password'])) {
                    session()->set(
                        [
                            'nik' => $cekMasy['nik'],
                            'nama' => $cekMasy['nama'],
                            'level' => 'masyarakat',

                        ]
                    );
                    return redirect('/');
                } else {
                    return redirect('login')->with("error", lang('Password Masyarakat Salah'));
                }
            }

            # Petugas
            # ========================================================================>
            if ($cekPet) {
                if (password_verify($password, $cekPet['password'])) {
                    session()->set([
                        'id_petugas' => $cekPet['id_petugas'],
                        'nama' => $cekPet['nama_petugas'],
                        'level' => $cekPet['level'],
                        'log_in' => true,
                    ]);
                    return redirect('/');
                } else {
                    return redirect('login')->with("error", lang('Password Petugas Salah'));
                }
            }
        }
    }

    #==================================================================================>


    # Register View ===================================================================>

    public function register()
    {
        return view('user/register');
    }

    #==================================================================================>


    # Register ========================================================================>

    public function saveregister()
    {
        $ceknik = $this->masyaraaktt->where('nik', $this->request->getPost('nik'))->findAll();
        // dd($ceknik);
        if ($ceknik == null) {
            $data = array(
                'nik' => $this->request->getPost('nik'),
                'nama' => $this->request->getPost('nama'),
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password') . "", PASSWORD_DEFAULT),
                'telp' => $this->request->getPost('telp'),
            );
            $this->masyaraaktt->insert($data);
            return redirect('login');
        } else {
            return redirect('register')->with('eror', lang('Nik Sudah Ada'));
        }
    }

    #===================================================================================>

    public function lihatprofil()
    {
        $masy = new Masyarakat();
        $pet  = new Petugas();

        if (session()->get('level') == 'masyarakat') {
            $data['user'] = $masy->where('nik', session('nik'))->findAll();
        } else {
            $data['user'] = $pet->where('id_petugas', session('id_petugas'))->findAll();
        }
        return view('user/profil', $data);
    }

    public function editprofil()
    {
        $masy = new Masyarakat();
        $pet  = new Petugas();

        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $username = $this->request->getPost('username');
        $telp = $this->request->getPost('telp');
        $password_old = $this->request->getPost('password_old');
        $password_new = $this->request->getPost('password_new');

        if (session('level') == 'masyarakat') {
            $datamasy = $masy->where('id_masyarakat', $id)->first();
            if (empty($password_old)) {
                $data = [
                    'nama' => $nama,
                    'username' => $username,
                    'telp' => $telp,
                ];
            } else {
                if (password_verify($password_old . "", $datamasy['password'])) {
                    $data = [
                        'nama' => $nama,
                        'username' => $username,
                        'telp' => $telp,
                        'password' => password_hash($password_new . "", PASSWORD_DEFAULT),
                    ];
                }
            }
            $masy->update($id, $data);
        } else {
            $datapet = $pet->where('id_petugas', $id)->first();
            if (empty($password_old)) {
                $data = [
                    'nama' => $nama,
                    'username' => $username,
                    'telp' => $telp,
                ];
            } else {
                if (password_verify($password_old . "", $datapet['password'])) {
                    $data = [
                        'nama' => $nama,
                        'username' => $username,
                        'telp' => $telp,
                        'password' => password_hash($password_new . "", PASSWORD_DEFAULT),
                    ];
                }
            }
            $pet->update($id, $data);
        }



        session()->setflashdata("message", "Data Berhasil DiubahUpdate Profil Berhasil");
        return redirect('profil');
    }
}
