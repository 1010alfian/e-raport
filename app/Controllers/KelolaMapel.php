<?php

namespace App\Controllers;

use App\Models\Muser;
use CodeIgniter\RESTful\ResourceController;

class KelolaMapel extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    function __construct()
    {
        $this->user = new Muser();
        $db = \Config\Database::connect();
        $this->mapel = $db->table('mapel');
    }

    public function index()
    {
        //
        $data = [
            'title' => "Mata Pelajaran",
            'user' => $this->user->where('id_user', session()->get('id_user'))->first(),
            'mapel' => $this->mapel->get()->getResultArray()
        ];
        return view('masterdata/v_mapel', $data);
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
            'mapel' => $this->request->getVar('mapel')
        ];
        $this->mapel->insert($data);
        return redirect()->to(site_url('KelolaMapel'))->with('msg', 'Berhasil Ditambah!');
        
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
        $data = $this->request->getVar('mapel');
        $this->mapel->update($id, $data);
        return redirect()->to(site_url('KelolaMapel'))->with('msg', 'Berhasil Ditambah!');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
        $this->mapel->where('id', $id);
        $this->mapel->delete();
        return redirect()->to(site_url('KelolaMapel'))->with('msg', 'Berhasil Dihapus!');
    }
}
