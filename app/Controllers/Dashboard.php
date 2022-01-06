<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "Dashboard",
            'user' => $this->user->where('id_user', session()->get('id_user'))->first()
        ];
        echo view('v_dashboard', $data);
    }
}
