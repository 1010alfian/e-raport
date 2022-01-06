<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\MKelolaguru;
use App\Models\Muser;

class KelolaGuru extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function __construct()
    {
        $this->kelolaguru = new MKelolaguru();
        $this->user = new Muser();
    }

    public function index()
    {
        //
        $builder = $this->kelolaguru;
        $builder->select('*');
        $builder->join('users', 'users.id_user = tbl_guru.id_user');
        $guru = $builder->get()->getResultArray();

        $data = [
            'title' => "Kelola Data Guru",
            'guru' => $guru,
            'user' => $this->user->where('id_user', session()->get('id_user'))->first()
        ];

        return view('masterdata/v_kelolaguru', $data);
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
        
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
        $data = [
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('nip'),
            'password' => password_hash('12345', PASSWORD_BCRYPT),
            'level' => 2,
        ];
        $this->user->insert($data);
        $id_user = $this->user->insertID();
        $data = [
            'id_user' => $id_user,
            'nip' => $this->request->getVar('nip'),
            'jns_kelamin' => $this->request->getVar('jns_kelamin'),
        ];
        $this->kelolaguru->insert($data);
        return redirect()->to(site_url('KelolaGuru'))->with('msg', 'Data Berhasil Disimpan');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
         $data = [
            'nama' => $this->request->getVar('nama'),
            'nip' => $this->request->getVar('nip'),
            'jns_kelamin' => $this->request->getVar('jns_kelamin'),
        ];
        $this->user->set($data['nama']);
        $this->user->where('id_user', $id);
        $this->user->update($id, $data);

        $this->kelolaguru->set($data['nip']);
        $this->kelolaguru->set($data['jns_kelamin']);
        $this->kelolaguru->where('id_user', $id);
        $this->kelolaguru->update($id, $data);
        return redirect()->to(site_url('KelolaGuru'))->with('msg', 'Data Berhasil Disimpan');
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
        $this->kelolaguru->hapus($id);
        return redirect()->to(site_url('KelolaGuru'))->with('msg', 'Data Berhasil Dihapus');
    }
}
