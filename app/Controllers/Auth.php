<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function doLogin()
    {
        $model = new UserModel();

        $user = $model
            ->where('email', $this->request->getPost('email'))
            ->first();

        if ($user && password_verify($this->request->getPost('password'), $user['password'])) {

            session()->set([
                'user_id'   => $user['id'],
                'user_name' => $user['name'],
                'logged_in' => true
            ]);

            return redirect()->to('/dashboard');
        }

        return redirect()->back()->with('error', 'Invalid login');
    }

    public function dashboard()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        return view('dashboard');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
