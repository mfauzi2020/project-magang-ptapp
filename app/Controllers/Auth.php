<?php

namespace App\Controllers;

use App\Models\ModelAuth;

class Auth extends BaseController
{
  public function __construct()
  {
    helper('form');
    $this->ModelAuth = new ModelAuth();
  }

  public function register()
  {
    $data = array(
      'title' => 'Register',
    );
    return view('v_register', $data);
  }

  public function save_register()
  {
    if ($this->validate([
      'nama_depan' => [
        'label' => 'Nama Depan',
        'rules' => 'required',
        'errors' => [
          'required' => '{field}  Wajib untuk diisi!'
        ]
      ],
      'nama_belakang' => [
        'label' => 'Nama Belakang',
        'rules' => 'required',
        'errors' => [
          'required' => '{field}  Wajib untuk diisi!'
        ]
      ],

      'email' => [
        'label' => 'Email',
        'rules' => 'required',
        'errors' => [
          'required' => '{field}  Wajib untuk diisi!'
        ]
      ],
      'no_hp' => [
        'label' => 'No Handphone',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Wajib untuk diisi!'
        ]
      ],
      'tempat_lahir' => [
        'label' => 'Tempat Lahir',
        'rules' => 'required',
        'errors' => [
          'required' => '{field}  Wajib untuk diisi!'
        ]
      ],
      'tanggal_lahir' => [
        'label' => 'Tanggal Lahir',
        'rules' => 'required',
        'errors' => [
          'required' => '{field}  Wajib untuk diisi!'
        ]
      ],
      'provinsi' => [
        'label' => 'Provinsi',
        'rules' => 'required',
        'errors' => [
          'required' => '{field}  Wajib untuk diisi!'
        ]
      ],
      'kota' => [
        'label' => 'Kota',
        'rules' => 'required',
        'errors' => [
          'required' => '{field}  Wajib untuk diisi!'
        ]
      ],
      'kecamatan' => [
        'label' => 'Kecamatan',
        'rules' => 'required',
        'errors' => [
          'required' => '{field}  Wajib untuk diisi!'
        ]
      ],
      'kelurahan' => [
        'label' => 'Kelurahan',
        'rules' => 'required',
        'errors' => [
          'required' => '{field}  Wajib untuk diisi!'
        ]
      ],
      'password' => [
        'label' => 'Password',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Wajib untuk diisi!'
        ]
      ],
      'repassword' => [
        'label' => 'Ketik Ulang Password',
        'rules' => 'required|matches[password]',
        'errors' => [
          'required' => '{field} Wajib untuk diisi!',
          'matches' => '{field} Anda Tidak Sama!'
        ]
      ]
    ])) {
      // jika valid , akan ada notifikasi register sukses
      $data = array(
        'nama_depan' => $this->request->getPost('nama_depan'),
        'nama_belakang' => $this->request->getPost('nama_belakang'),
        'email' => $this->request->getPost('email'),
        'no_hp' => $this->request->getPost('no_hp'),
        'tempat_lahir' => $this->request->getPost('tempat_lahir'),
        'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
        'provinsi' => $this->request->getPost('provinsi'),
        'kota' => $this->request->getPost('kota'),
        'kecamatan' => $this->request->getPost('kecamatan'),
        'kelurahan' => $this->request->getPost('kelurahan'),
        'password' => $this->request->getPost('password'),
        'level' =>  3
      );
      $this->ModelAuth->save_register($data);
      session()->setFlashdata('pesan', 'Registrasi Berhasil!, Silahkan Login');
      return redirect()->to(base_url('Auth/login'));
    } else {
      // jika tidak valid
      session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
      return redirect()->to(base_url('Auth/register'));
    }
  }



  public function login()
  {
    $data = array(
      'title' => 'Login',
    );
    return view('v_login', $data);
  }

  public function cek_login()
  {
    if ($this->validate([
      'email' => [
        'label' => 'Email',
        'rules' => 'required',
        'errors' => [
          'required' => '{field}  Wajib untuk diisi!'
        ]
      ],
      'password' => [
        'label' => 'Password',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Wajib untuk diisi!'
        ]
      ],
    ])) {
      // jika valid
      $email = $this->request->getPost('email');
      $password = $this->request->getPost('password');
      $cek = $this->ModelAuth->login($email, $password);
      if ($cek) {
        // jika data benar
        session()->set('log', true);
        session()->set('nama_depan', $cek['nama_depan']);
        session()->set('nama_belakang', $cek['nama_belakang']);
        session()->set('email',  $cek['email']);
        session()->set('level', $cek['level']);
        session()->set('foto_user', $cek['foto_user']);
        // Login
        return redirect()->to(base_url('home'));
      } else {
        // jika data salah
        session()->setFlashdata('pesan', 'Login Gagal! , Email dan Password Tidak Terdaftar!');
        return redirect()->to(base_url('auth/login'));
      }
    } else {
      // jika tidak valid
      session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
      return redirect()->to(base_url('auth/login'));
    }
  }
  public function logout()
  {
    session()->remove('log');
    session()->remove('nama_user');
    session()->remove('level');
    session()->remove('foto_user');
    session()->setFlashdata('pesan', 'Anda telah berhasil Logout!');
    return redirect()->to(base_url('auth/login'));
  }
}
