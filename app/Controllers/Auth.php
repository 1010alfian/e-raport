<?php

namespace App\Controllers;

use App\Models\Muser;


class Auth extends BaseController
{
    public function index()
    {
        return view('v_login');
    }

    public function prosesLogin()
    {
        $this->user = new Muser();

        $post = $this->request->getPost();
        $query = $this->user->getWhere(['username' => $post['username']]);
        $user = $query->getRow();
        if ($user) {
            if (password_verify($post['password'], $user->password)) {
                $params = [
                    'id_user' => $user->id_user,
                    'level' => $user->level,
                    'username' => $user->username
                ];
                session()->set($params);

                if ($user->level < 4) {
                    return redirect()->to(site_url('Dashboard'));
                } else {
                    echo "siswa";
                }
            } else {
                return redirect()->back()->with('msg', '<div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">x</button>
                    Password Salah
                </div>
            </div>');
            }
        } else {
            return redirect()->back()->with('msg', '<div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                Username tidak terdaftar
            </div>
        </div>');
        }
    }

    public function logout()
    {
        $data = ['id_user', 'level'];
        session()->remove($data);
        return redirect()->to('/')->with('msg', '<div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">x</button>
            Berhasil Keluar
        </div>
    </div>');
    }

    public function block()
    {
        $data['title'] = "403";
        return view('403', $data);
    }
}
