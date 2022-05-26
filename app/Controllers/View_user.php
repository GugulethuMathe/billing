<?php

namespace App\Controllers;

use App\Models\UserModel;

class View_user extends BaseController
{
    public function index()
    {
        $request = \Config\Services::request();
        $UserModel = new UserModel();

        $request = \Config\Services::request();
        $model = new UserModel();

        $id = $request->getVar('id');
        $data['view_user'] = $model->getUserById($id);
        return view('user/view_user', $data);
    }
}
