<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ReportModel;
use CodeIgniter\HTTP\Response;

class Report extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function pdf()
    {
        $request = \Config\Services::request();
        $this->ReportModel = new ReportModel();
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
        $data['records'] = $this->ReportModel->getManualReportSumSet($newData);

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

    public function manual_bill()
    {
        return view('reports/manual_report');
    }
    public function trunkpdf()
    {

        $request = \Config\Services::request();
        $this->ReportModel = new ReportModel();
        $session = session();

        $month = $request->getVar('month');
        $year = $request->getVar('year');
        $tenant = $request->getVar('tenant');

        $rate = 0.1;

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
            'start_cycle' => $start_cycle,
            'end_cycle' => $end_cycle,
            'msg' => $msg,
        ];
        $data['records'] = $this->ReportModel->getTrunkReports($newData);
        $dompdf = new \Dompdf\Dompdf();
        // Sending data to view file
        $dompdf->loadHtml(view('reports/trunk_pdf', $data));
        // setting paper to portrait, also we have landscape
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        // Download pdf
        $dompdf->stream();
        // to give pdf file name
        // $dompdf->stream("myfile");

        // return redirect()->to(base_url('monthly-report'));
    }
    public function trunk()
    {
        return view('reports/trunk_report');
    }

    public function custom_bill()
    {
        return view('reports/custom_report');
    }

    public function custom()
    {
        $request = \Config\Services::request();
        $this->ReportModel = new ReportModel();
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

        $data['records'] = $this->ReportModel->getCustomReport($newData);
        return $this->response->setJSON($data);
    }

    public function manual()
    {
        $request = \Config\Services::request();
        $this->ReportModel = new ReportModel();
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
            'status' => $status,
            'tenant' => $tenant,
            'start_cycle' => $start_cycle,
            'end_cycle' => $end_cycle,
            'msg' => $msg,
        ];
        $data['records'] = $this->ReportModel->getManualReportSumSet($newData);
        // print_r($data);
        return $this->response->setJSON($data);
    }
    public function trunk_report()
    {
        $request = \Config\Services::request();
        $this->ReportModel = new ReportModel();
        $session = session();

        $month = $request->getVar('month');
        $year = $request->getVar('year');
        $tenant = $request->getVar('tenant');

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
            'start_cycle' => $start_cycle,
            'end_cycle' => $end_cycle,
            'msg' => $msg,
        ];
        $data['records'] = $this->ReportModel->getTrunkReports($newData);
        // print_r($data);
        return $this->response->setJSON($data);
    }
    public function send_pdf()
    {
        $request = \Config\Services::request();
        $this->ReportModel = new ReportModel();
        $session = session();

        $month = $request->getVar('month');
        $year = $request->getVar('year');
        $tenant = $request->getVar('tenant');
        $status = $request->getVar('status');
        $tenant_email = $request->getVar('email');

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
        $data['records'] = $this->ReportModel->getManualReportSumSet($newData);

        $dompdf = new \Dompdf\Dompdf();

        // Sending data to view file
        $dompdf->loadHtml(view('reports/report_pdf', $data));
        // setting paper to portrait, also we have landscape
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        // Download pdf
        // $dompdf->stream();
        // to give pdf file name
        // $dompdf->stream("invoice");
        $pdfname = "Invoice" . date('YmdHis') . ".pdf";
        $output = $dompdf->output();
        file_put_contents(WRITEPATH . $pdfname . '', $output);
        $file_path = WRITEPATH . $pdfname;

        $email = \Config\Services::email(); // where email() is static method of Services class.

        $email->setFrom('info@mprentals.co.za', 'Net 15');
        $email->setTo($tenant_email);
        $email->setSubject('Invoice');

        // file attach here //
        $email->attach($file_path);
        $email->setMessage('Find the attached invoice below');

        if ($email->send()) {
            $session = session();
            $session->setFlashdata("email_sent", "Email sent Successfully");
            return redirect()->to(base_url('monthly-report'));
        } else {
            $session = session();
            $session->setFlashdata("email_failed", "Failed to send");
            return redirect()->to(base_url('monthly-report'));
        }
    }
}
