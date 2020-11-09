<?php

namespace App\Controllers;

class Web extends BaseController
{
  public function index()
  {
    $data = array(
      'title' => 'Home',
      'isi' => 'v_home'
    );
    return view('v_web', $data);
  }

  //--------------------------------------------------------------------
}
