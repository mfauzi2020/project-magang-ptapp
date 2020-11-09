<?php

namespace App\Controllers;

class Menu extends BaseController
{
  public function menu_admin()
  {
    if (session()->get('level') <> 1) {
      return redirect()->to(base_url('home'));
    }
    $data = array(
      'title' => 'Menu Admin',
      'isi' => 'v_menu'
    );
    return view('layout/v_wrapper', $data);
  }
  public function menu_user()
  {
    if (session()->get('level') <> 2) {
      return redirect()->to(base_url('home'));
    }
    $data = array(
      'title' => 'Menu User',
      'isi' => 'v_menu'
    );
    return view('layout/v_wrapper', $data);
  }
  public function menu_pelanggan()
  {
    if (session()->get('level') <> 3) {
      return redirect()->to(base_url('home'));
    }
    $data = array(
      'title' => 'Menu Pelanggan',
      'isi' => 'v_menu'
    );
    return view('layout/v_wrapper', $data);
  }
}
