<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;


class Organisation extends BaseController
{
	public function __construct()
	{
		$this->db = \Config\Database::connect();
	}

	public function index()
    {
       
        return view('managers/all_managers');
    }

}
