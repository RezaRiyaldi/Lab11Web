<?php

namespace App\Controllers;
// namespace App\Models\UserModel;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    private $user;

    public function __construct()
    {
        $this->user = new UserModel();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar User',
            'users' => $this->user->findAll()
        ];

        return view('user/index', $data);
    }

    public function login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $message = "";
        $type_message = "errors";

        if (!$email) {
            $data = [
                'title' => 'Login',
                'auth' => TRUE
            ];
            return view('user/login', $data);
        }
        $login = $this->user->where('useremail', $email)->first();
        if ($login) {
            $pass = $login['userpassword'];
            // var_dump($login); die;
            if (password_verify($password, $pass)) {
                $login_data = [
                    'user_id' => $login['id'],
                    'username' => $login['username'],
                    'password' => $login['userpassword'],
                    'logged_id' => TRUE
                ];

                session()->set($login_data);
                $type_message = "success";
                $message = "Login berhasil, selamat datang " . $login['username'];
            } else {
                $message = "Password salah!";
            }
        } else {
            $message = "User tidak ditemukan!";
        }

        session()->setFlashdata($type_message, $message);
        if ($type_message != "errors") {
            return redirect()->to('artikel/admin');
        } else {
            return redirect()->to('user/login');
        }
    }

    public function logout()
    {
        session()->remove([
            'username', 'email', 'user_id', 'logged_in'
        ]);
        session()->setFlashdata('success', "Logout berhasil, semoga harimu senin terus");
        return redirect()->to('user/login');
    }
}
