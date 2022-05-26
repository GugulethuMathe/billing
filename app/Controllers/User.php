<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
	public function index()
	{
		$model = new UserModel();
		$data['managers'] = $model->getManagers()->getResult();

		return view('managers/all_managers', $data);
	}

	public function createUser()
	{
		$data = [];
		$request = \Config\Services::request();
		$session = session();

		$model = new UserModel();
		$request = \Config\Services::request();
		$newData = [
			'first_name' => $request->getVar('first_name'),
			'last_name' => $request->getVar('last_name'),
			'user_name' => $request->getVar('user_name'),
			'organisation' => $request->getVar('organisation'),
			'tenant_code' => $request->getVar('tenant_code'),
			'email' => $request->getVar('email'),
			'contact_number' => $request->getVar('contact_number'),
			'address' => $request->getVar('address'),
			'password' => $request->getVar('password'),
			'user_role' => $request->getVar('user_role'),
		];
		$model->save($newData);

		$session->setFlashdata("success_create_user", "User Added Successfully");

		return redirect()->to('/add-user');
	}
	public function updateUser()
	{
		$data = [];
		$request = \Config\Services::request();
		$id = $request->getVar('id');

		$session = session();

		$model = new UserModel();
		$request = \Config\Services::request();
		$newData = [
			'first_name' => $request->getVar('first_name'),
			'last_name' => $request->getVar('last_name'),
			'user_name' => $request->getVar('user_name'),
			'organisation' => $request->getVar('organisation'),
			'tenant_code' => $request->getVar('tenant_code'),
			'email' => $request->getVar('email'),
			'contact_number' => $request->getVar('contact_number'),
			'address' => $request->getVar('address'),
			'password' => $request->getVar('password'),
			'user_role' => $request->getVar('user_role'),
		];
		$model->update($id, $newData);
		$session->setFlashdata("success_update_user", "User Updated Successfully");
		return redirect()->to('/edit_user?id=' . $id);
	}

	public function addUser()
	{
		return view('user/add_user');
	}
	public function dashboard()
	{
		return view('backend/dashboard');
	}
	public function admins()
	{
		$model = new UserModel();
		$data['admins'] = $model->getAdmins()->getResult();
		return view('admin/admins', $data);
	}
	public function view_admin()
	{
		$request = \Config\Services::request();
		$model = new UserModel();
		$id = $request->getVar('id');
		$data['view_admin'] = $model->getUserById($id);
		return view('admin/view', $data);
	}
	public function edit_admin()
	{
		$model = new UserModel();
		$data['admins'] = $model->getAdmins()->getResult();
		return view('admin/edit', $data);
	}
	public function clients()
	{
		$model = new UserModel();
		$data['clients'] = $model->getClients()->getResult();
		return view('client/clients', $data);
	}
	public function logout()
	{
		session()->destroy();
		return redirect()->to('/');
	}
}
