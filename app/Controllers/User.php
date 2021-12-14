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
            'name' => 'required|min_length[6]|max_length[255]'
        ];

        if ($this->validate($rules)) {
            $data = [
                'username' => $this->request->getPost('username'),
                'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email')
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

    public function dashboard()
    {
        if (!(session()->has('logged_in') && (session()->get('logged_in') === true))) {
            return redirect()->to('/login');
        }

        $userId = session()->get('userId');
        $dataDB = $this->userModel->where('id', $userId)->first();
        $data = [
            'title' => 'Dashboard',
            'username' => $dataDB['username'],
            'name' => $dataDB['name'],
            'email' => $dataDB['email'],
            'gender' => $dataDB['gender'],
            'description' => $dataDB['description'],
            'university' => $dataDB['university'],
            'major' => $dataDB['major'],
            'linkedin_account' => $dataDB['linkedin_account'],
            'linkedin_url' => $dataDB['linkedin_url'],
            'whatsapp_account' => $dataDB['whatsapp_account'],
            'github_account' => $dataDB['github_account']
        ];

        $data["image_url"] = $dataDB["image_url"] ?? 'default.jpg';

        return view('users/dashboard', $data);
    }

    public function update()
    {
        // Validate has login or not
        if (!(session()->has('logged_in') && (session()->get('logged_in') === true))) {
            return redirect()->to('/login');
        }

        $userId = session()->get('userId');
        $dataDB = $this->userModel->where('id', $userId)->first();

        $data = [
            'title' => 'Update Data',
            'validation' => Services::validation(),
            'username' => $dataDB['username'],
            'name' => $dataDB['name'],
            'password_hash' => $dataDB['password_hash'],
            'email' => $dataDB['email'],
            'gender' => $dataDB['gender'],
            'description' => $dataDB['description'],
            'university' => $dataDB['university'],
            'major' => $dataDB['major'],
            'linkedin_account' => $dataDB['linkedin_account'],
            'linkedin_url' => $dataDB['linkedin_url'],
            'whatsapp_account' => $dataDB['whatsapp_account'],
            'github_account' => $dataDB['github_account']
        ];

        return view('users/update', $data);
    }

    public function updateVerify()
    {
        // Validate has login or not
        if (!(session()->has('logged_in') && (session()->get('logged_in') === true))) {
            return redirect()->to('/login');
        }

        $userId = session()->get('userId');
        $dataDB = $this->userModel->where('id', $userId)->first();

        // Validation rules
        $rules = [
            'username' => "required|is_unique[users.username,id,{$userId}]",
            'email' => "required|valid_email|is_unique[users.email,id,{$userId}]",
            'name' => 'required|min_length[6]|max_length[255]'
        ];

        $rulesImage = [
            'image_url' => [
                'rules' => 'uploaded[image_url]|max_size[image_url,1024]|is_image[image_url]|mime_in[image_url,image/jpg,image/jpeg,image/png]',
            ]
        ];



        if ($this->validate($rules)) {
            $data = [
                'username' => $this->request->getPost('username'),
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'gender' => $this->request->getPost('gender'),
                'description' => $this->request->getPost('description'),
                'image_url' => $dataDB['image_url'],
                'university' => $this->request->getPost('university'),
                'major' => $this->request->getPost('major'),
                'linkedin_account' => $this->request->getPost('linkedin_account'),
                'linkedin_url' => $this->request->getPost('linkedin_url'),
                'whatsapp_account' => $this->request->getPost('whatsapp_account'),
                'github_account' => $this->request->getPost('github_account')
            ];

            if ($this->validate($rulesImage)) {
                $image = $this->request->getFile('image_url');
                $image->move('uploads');
                $data['image_url'] = $image->getName();
            }

            $this->userModel->update(session()->get('userId'), $data);
            return redirect()->to('/dashboard');
        } else {
            return redirect()->to('/update')->withInput();
        }
    }
}
