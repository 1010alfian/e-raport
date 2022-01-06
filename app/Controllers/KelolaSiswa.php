<?php

namespace App\Controllers;

use App\Models\Mkelas;
use App\Models\Msiswa;
use App\Models\Muser;
use CodeIgniter\RESTful\ResourceController;

class KelolaSiswa extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    function __construct()
    {
        $this->kelolasiswa = new Msiswa();
        $this->kelas = new Mkelas();
        $this->user = new Muser();
    }

    public function index()
    {
        //
        $siswa = $this->kelolasiswa->getAll();

        $data = [
            'title' => "Kelola Data Siswa",
            'siswa' => $siswa,
            'pager' => $this->kelolasiswa->pager,
            'user' => $this->user->where('id_user', session()->get('id_user'))->first()
        ];
        return view('masterdata/siswa/v_kelolasiswa', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
        $data = [
            'title' => "Tambah Data Siswa",
            'user' => $this->user->where('id_user', session()->get('id_user'))->first(),
            'kelas' => $this->kelas->findAll(),
        ];
        echo view('masterdata/siswa/v_tambahsiswa', $data);
        
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'nis' => 'required',
            'id_kelas' => 'required',
            'jns_kelamin' => 'required',
        ]);
        $isValidation = $validation->withRequest($this->request)->run();


        if ($isValidation) {
            $data = [
                'username' => $this->request->getVar('nis'),
                'nama' => $this->request->getVar('nama'),
                'password' => password_hash('12345', PASSWORD_BCRYPT),
                'level' => 4,
            ];
            $this->user->insert($data);
            $id_user = $this->user->insertID();
            $data = [
                'id_user' => $id_user,
                'nis' => $this->request->getVar('nis'),
                'jns_kelamin' => $this->request->getVar('jns_kelamin'),
                'id_kelas' => $this->request->getVar('id_kelas'),
            ];
            $this->kelolasiswa->insert($data);
            return redirect()->to(site_url('KelolaSiswa'))->with('msg', 'Data Berhasil Disimpan');
        }

    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
        $this->kelolasiswa->hapus($id);
        return redirect()->to(site_url('KelolaSiswa'))->with('msg', 'Data Berhasil Dihapus');
    }
}
