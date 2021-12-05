<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;
use Config\Services;
use ReflectionException;

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

    public function register(): string
    {
        $data = [
            'title' => 'Register',
            'validation' => Services::validation()
        ];
        return view('users/register', $data);
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
            $isPasswordVerify = password_verify($userRequest['password'], $userDb['password_hash']);

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

    /**
     * @throws ReflectionException
     */
    public function registerVerify(): RedirectResponse
    {
        $rules = [
            'username' => "required|is_unique[users.username]",
            'password' => 'required|min_length[8]|max_length[16]',
            'email' => "required|valid_email|is_unique[users.email]",
            'name' => 'required|min_length[6]|max_length[255]',
        ];

        if ($this->validate($rules)) {
            $data = [
                'username' => $this->request->getPost('username'),
                'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
            ];

            $this->userModel->save($data);
            return redirect()->to('/login');
        }

        return redirect()->to('/register')->withInput();
    }

    public function logout(): RedirectResponse
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}