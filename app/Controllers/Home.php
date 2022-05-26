<?php

namespace App\Controllers;
use App\Models\ApartmentModel;
class Home extends BaseController
{
	public function index()
	{	
		return view('layouts/home');
	}
	public function dashboard()
	{	
		return view('backend/dashboard');
	}
	public function organisation()
	{	
		return view('backend/organisation');
	}
	public function tenant()
	{	
		return view('tenant/tenant');
	}

}
