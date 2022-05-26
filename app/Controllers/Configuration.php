<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BillCycleConfig;
use App\Models\ConfigModel;


class Configuration extends BaseController
{
	public function __construct()
	{
		$this->db = \Config\Database::connect();
	}

	public function index()
    {
		$model = new ConfigModel();
        $data['rates']  = $model->getIpConfig()->getResult();
        return view('configs/ip_configs',$data);
    }
	public function billConfig()
    {
		$model = new ConfigModel();
        $data['billcycle']  = $model->getBillConfig()->getResult();
        return view('configs/billcycle',$data);
    }

	public function addIp()
	{
		$data = [];
		$request = \Config\Services::request();
		$session = session();

			$model = new ConfigModel();
			$request = \Config\Services::request();
			$newData = [
				'ip_address' => $request->getVar('ip_address'),
				'ip_active' => $request->getVar('ip_active')
			];
			$model->save($newData);
		
		$session->setFlashdata("success_ip", "IP Added Successfully");

		return redirect()->to('/ip-configurations');
	} 
	public function addBillingCycle()
	{
		$data = [];
		$request = \Config\Services::request();
		$session = session();
			$model = new BillCycleConfig();
			$request = \Config\Services::request();
			$newData = [
				'cycle_start_day' => $request->getVar('cycle_start_day'),
				'cycle_end_day' => $request->getVar('cycle_end_day')
			];
			$model->save($newData);
		
		$session->setFlashdata("success_cycle", "Billing Cycle Added Successfully");

		return redirect()->to('/billing-cycle-configurations');
	} 
}
