<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Auth extends Controller
{
    public function login()
    {
        if (session()->get('logged_in')) {
            // If logged in, redirect to dashboard (avoid redirect loop)
            return redirect()->to('/dashboard');
        }
        return view('pages/auth/login');
    }

    public function authenticate()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            // Set session data
            session()->set([
                'id' => $user['id'],
                'username' => $user['username'],
                'logged_in' => true
            ]);
            return redirect()->to('/dashboard');
        } else {
            // Error if login failed
            return redirect()->to('login')->with('error', 'Invalid credentials');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}