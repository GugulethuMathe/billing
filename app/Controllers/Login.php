<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Login extends Controller
{
    public function index()
    {
        return view('Layouts/login');
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $request = \Config\Services::request();
        $email = $request->getVar('email');
        $password = $request->getVar('password');
        $data = $model->where('email', $email)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id'       => $data['id'],
                    'first_name'     => $data['first_name'],
                    'last_name'     => $data['last_name'],
                    'organisation'     => $data['first_name'],
                    'tenant_code'     => $data['tenant_code'],
                    'user_name'     => $data['user_name'],
                    'contact_number'     => $data['contact_number'],
                    'email'    => $data['email'],
                    'user_role'    => $data['user_role'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/monthly-report');
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/');
            }
        } else {
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
    
}
