<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function showRegister()
    {
        return view('auth/register');
    }

    public function register()
    {
        $rules = [
            'name'     => 'required|max_length[255]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]',
            'password_confirmation' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $userModel = model(UserModel::class);
        $userModel->insert([
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ]);

        $userId = $userModel->getInsertID();
        $user = $userModel->find($userId);

        session()->set([
            'user_id'   => $user->id,
            'user_name' => $user->name,
        ]);

        return redirect()->to('/entries')->with('success', 'Welcome to Catatku, ' . $user->name . '!');
    }
}
