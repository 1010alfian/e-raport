<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Mketerampilan;
use App\Models\Msiswa;

class Nilai extends BaseController
{
    function __construct()
    {
        $this->siswa = new Msiswa();
        $this->keterampilan = new Mketerampilan();
    }

    public function keterampilan()
    {
        //
        $data = [
            'title' => "Keterampilan",
            'user' => $this->user->where('id_user', session()->get('id_user'))->first()
        ];
        return view('nilai/keterampilan/v_keterampilan', $data);
    }

    //Matematika Keterampilan
    public function form_matematika(){
        $data = [
            'siswa'=> $this->siswa->getAll(),
            'title' => "Matematika",
            'user' => $this->user->where('id_user', session()->get('id_user'))->first()
        ];
        return view('nilai/keterampilan/v_matematika',$data);
    }

    public function save_matematika(){

            $id_siswa = $this->request->getPost('id_siswa');
            $id_mapel = 3;
            $tgs = $this->request->getPost('tgs');
            $uts = $this->request->getPost('uts');
            $uas = $this->request->getPost('uas');
            $deskripsi = $this->request->getPost('deskripsi');
            $jumlah = array($tgs+$uts+$uas);
            $count = count($jumlah);
            $sum = array_sum($jumlah);
            $hasil = $sum/$count;
            $rata = $hasil;

                foreach ($id_siswa as $key) {
                    //masukkan data ke variabel array jika kedua form tidak kosong
                    $simpan[] = [

                        'id_siswa' => $id_siswa[$key],
                        'id_mapel'         => $id_mapel[$key],
                        'tgs'         => $tgs[$key],
                        'uts'         => $uts[$key],
                        'uas'         => $uas[$key],
                        'deskripsi'         => $deskripsi[$key],
                        'rata_rata'         => $rata[$key],
                        
                    ];
                    $this->keterampilan->insertBatch($simpan);
                }
                    return redirect()->to(site_url('keterampilan/matematika'))->with('msg', 'Berhasil Disimpan');

    }
    //Matematika Keterampilan
}
