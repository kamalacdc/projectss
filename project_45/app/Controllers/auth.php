<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login(): string
    {
        return view('auth/login');
    }
    public function daftar(): string
    {
        return view('auth/register_manajer');
    }
    public function processRegister()
    {
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $nama = $this->request->getPost('nama');
        $jabatan = $this->request->getPost('jabatan');
        $password = $this->request->getPost('password');




        if (!$email || !$nama || !$jabatan || !$password) {
            return redirect()->back()->with('error', 'Semua field wajib diisi!');
        }

        // untuk cek apakah ada email lain yg sudah terdaftar
        if ($userModel->where('email', $email)->first()) {
            return redirect()->back()->with('error', 'Email sudah digunakan!');
        }


        // Simpan user
        $userModel->insert([
            'email' => $email,
            'nama' => $nama,
            'jabatan' => 'jabatan',
            'password' => password_hash($password, PASSWORD_DEFAULT),

        ]);

        return redirect()->to('/login')->with('success', 'Pendaftaran berhasil!');
    }

    public function processLogin()
    {
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email tidak ditemukan!');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Password salah!');
        }

        // Set session
        session()->set([
            'isLoggedIn' => true,
            'user_id' => $user['id_user'],
            'email' => $user['email'],
            'jabatan' => $user['jabatan'],
        ]);

        //role redirect tiap user
        if ($user['role'] === 'admin') {
            return redirect()->to('dashboard');
        } else {
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
