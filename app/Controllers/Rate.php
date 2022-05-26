<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RateModel;


class Rate extends BaseController
{
	public function __construct()
	{
		$this->db = \Config\Database::connect();
	}

	public function index()
    {
		$model = new RateModel();
        $data['rates']  = $model->getRate()->getResult();
        return view('rate/rate_page', $data);
    }
	
	public function addRate()
	{
		$data = [];
		$request = \Config\Services::request();
		$session = session();

			$model = new RateModel();
			$request = \Config\Services::request();
			$newData = [
				'trunk' => $request->getVar('trunk'),
				'channel_name' => $request->getVar('channel_name'),
				'rate' => $request->getVar('rate')
			];
			$model->save($newData);
		
		$session->setFlashdata("success_rate", "Rate Added Successfully");

		return redirect()->to('/incoming-call-rates');
	} 
	public function updateRate()
	{
		$data = [];
		$request = \Config\Services::request();
		$session = session();
		$id = $request->getVar('id');


			$model = new RateModel();
			$request = \Config\Services::request();
			$newData = [
				'trunk' => $request->getVar('trunk'),
				'channel_name' => $request->getVar('channel_name'),
				'rate' => $request->getVar('rate')
			];
			$model->update($id, $newData);
		
		$session->setFlashdata("success_update_rate", "Rate Updated Successfully");

		return redirect()->to('/incoming-call-rates');
	} 

}
