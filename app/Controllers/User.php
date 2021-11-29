<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;

class User extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        if (session()->has('logged_in') && (session()->get('logged_in') === true)) {
            return redirect()->to('/dashboard');
        }

        $data = ['title' => 'Login'];
        return view('users/login', $data);
    }

    public function loginVerify(): RedirectResponse
    {
        $session = session();

        $userRequest = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
        ];

        $userDb = $this->userModel->where('username', $userRequest['username'])->first();
        if ($userDb) {
            $isPasswordVerify = password_verify($userRequest['password'], $userDb['password']);

            if ($isPasswordVerify) {
                $session_data = [
                    'logged_in' => TRUE,
                    'userId' => $userDb['id']
                ];

                $session->set($session_data);
                return redirect()->to('/dashboard');
            }

            $session->setFlashdata('msg', 'Wrong Password');
        } else {
            $session->setFlashData('msg', 'Username not found');
        }

        return redirect()->to('/login');
    }
}