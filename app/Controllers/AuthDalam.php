<?php

namespace App\Controllers;

use App\Models\ModelAuth;

class AuthDalam extends BaseController
{
    public function __construct()
    {
        $this->load->helper('form');
        $this->ModelAuth = new ModelAuth();
    }

    public function p_anggota()
    {
        $data = array(
            'title' => 'Pendaftaran',
        );
        return view('v_home', $data);
    }
}
