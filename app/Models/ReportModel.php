<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{
    public function getCallRecords()
    {
        $sql = "select * from cdr";
        return $this->db->query($sql)->getResult();
    }

    public function getCustomReport($data)
    {
        $tenant = $data['tenant'];
        $organisation = $data['organisation'];
        $start_date = $data['start_date'];
        $end_date = $data['end_date'];
        $direction = $data['direction'];

        $start_dateStr = str_replace('T', ' ', $start_date);
        $start_dateStr .= ':00';
        $end_dateStr = str_replace('T', ' ', $end_date);
        $end_dateStr .= ':00';

        if ($tenant == "") {
            $sql = "select * from cdr where trunk IS NOT NULL and calldate between '$start_dateStr' and '$end_dateStr'";
        }
        if ($organisation != "") {
            $sql = "select * from cdr where trunk IS NOT NULL and tenant='$tenant' and calldate between '$start_dateStr' and '$end_dateStr'";
        }
        if ($direction != "") {
            $sql = "select * from cdr where trunk IS NOT NULL  and tenant='$tenant' and calldate between '$start_dateStr' and '$end_dateStr'";
        }
        if ($tenant != "") {
            $sql = "select * from cdr where trunk IS NOT NULL and tenant='$tenant' and calldate between '$start_dateStr' and '$end_dateStr'";
        }

        return $this->db->query($sql)->getResult();
    }

    public function getManualReportSumSet($data)
    {

        $tenant = $data['tenant'];
        $end_cycle = $data['end_cycle'];
        $start_cycle = $data['start_cycle'];
        $status = $data['status'];


        $subquery = "where trunk IS NOT NULL";
        if ($tenant != "") {
            $subquery = "$subquery and tenant='$tenant'";
        }
        if ($status != "") {
            $subquery = "$subquery and disposition='$status'";
        }
      
        $subquery = "$subquery and calldate between '$start_cycle' and '$end_cycle'";
        $sql = "select * from cdr $subquery ";
        
        if ($tenant != "") {
            $sqlsum = "SELECT clid, SUM(billamount) as minute_charged FROM `cdr` WHERE trunk IS NOT NULL and tenant='$tenant' and calldate between '$start_cycle' and '$end_cycle' GROUP BY clid";
        }else{
            $sqlsum = "SELECT clid, SUM(billamount) as minute_charged FROM `cdr` WHERE trunk IS NOT NULL and calldate between '$start_cycle' and '$end_cycle' GROUP BY clid";
        }
        $response['detailed'] = $this->db->query($sql)->getResult();
        $response['summary'] = $this->db->query($sqlsum)->getResult();
        return $response;
    }
    public function getTrunkReports($data)
    {
        $tenant = $data['tenant'];
        $end_cycle = $data['end_cycle'];
        $start_cycle = $data['start_cycle'];

        $sql = "SELECT tenant, SUM(billsec) as units FROM `cdr` WHERE trunk IS NOT NULL and calldate between '$start_cycle' and '$end_cycle' GROUP BY tenant";
        return $this->db->query($sql)->getResult();
    }
}
