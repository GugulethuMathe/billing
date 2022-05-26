<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomModel;
use CodeIgniter\HTTP\Response;

class Custom extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function custom_pdf()
    {
        $request = \Config\Services::request();
        $this->CustomModel = new CustomModel();
        $session = session();

        $month = $request->getVar('month');
        $year = $request->getVar('year');
        $tenant = $request->getVar('tenant');
        $status = $request->getVar('status');

        $start_month = $month - 1;
        $start_month = "0" . $start_month;
        $today_date = date("Y-m-d");
        $current_year = date("Y");
        $current_month = date("m");
        $current_day = date("d");
        $selected_month_year = $year . "-" . $month;
        $current_month_year = $current_year . "-" . $current_month;
        $billing_date = $year . "-" . $month . "-" . "14";
        $start_cycle = $year . '-' . $start_month . '-' . '21' . ' ' . '00:00:00';
        $end_cycle = $year . '-' . $month . '-' . '22' . ' ' . '00:00:00';
        $msg = "The selected time is good for calcuation";

        if ($selected_month_year > $current_month_year) {
            $msg = "The system cannot generate reports for future months";
        }
        if ($month == $current_month) {
            // chech date if the date is more than 21st
            if ($today_date > $billing_date) {
                $msg = "You are in the current month but the biling date has passed";
            }
            $end_cycle = $today_date . ' ' . '00:00:00';
        }
        $newData = [
            'tenant' => $tenant,
            'status' => $status,
            'start_cycle' => $start_cycle,
            'end_cycle' => $end_cycle,
            'msg' => $msg,
        ];
        $data['records'] = $this->CustomModel->getManualReportSumSet($newData);

        $dompdf = new \Dompdf\Dompdf();

        // Sending data to view file
        $dompdf->loadHtml(view('reports/report_pdf', $data));
        // setting paper to portrait, also we have landscape
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        // Download pdf
        $dompdf->stream();
        // to give pdf file name
        // $dompdf->stream("myfile");

        return redirect()->to(base_url('monthly-report'));
    }

    public function custom()
    {
        $request = \Config\Services::request();
        $this->CustomModel = new CustomModel();
        $session = session();

        $organisation = $request->getVar('organisation');
        $start_date = $request->getVar('start_date');
        $end_date = $request->getVar('end_date');
        $tenant = $request->getVar('tenant');
        $direction = $request->getVar('direction');

        $newData = [
            'organisation' => $organisation,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'tenant' => $tenant,
            'direction' => $direction,
        ];

        $data['records'] = $this->CustomModel->getCustomReport($newData);
        return $this->response->setJSON($data);
    }


}
