<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomModel extends Model
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
        $organisation = $data['organisation'];
        $start_date = $data['start_date'];
        $end_date = $data['end_date'];
        $direction = $data['direction'];

        $start_dateStr = str_replace('T', ' ', $start_date);
        $start_dateStr .= ':00';
        $end_dateStr = str_replace('T', ' ', $end_date);
        $end_dateStr .= ':00';

        $t999 = array("100", "200", "332", "682", "682", "795");

        $t998 = array("6820", "999101", "333", "0640505138");

        $t997 = array("1001", "value2", "value3");

        $t995 = array("0103300333", "7950", "value3");

        $t994 = array("value1", "value2", "value3");

        $t990 = array("value1", "value2", "value3");

        $t970 = array("value1", "value2", "value3");

        $t972 = array("value1", "value2", "value3");
        $t973 = array("value1", "value2", "value3");
        $t974 = array("value1", "value2", "value3");
        $t901 = array("value1", "value2", "value3");
        $t986 = array("value1", "value2", "value3");
        $t910 = array("value1", "value2", "value3");

        $subquery = "where trunk IS NOT NULL";
        if ($tenant != "") {
            $subquery = "$subquery and tenant='$tenant'";
        }
             
        $subquery = "$subquery and where src calldate between '$start_dateStr' and '$end_dateStr'";
        $sql = "select * from cdr $subquery ";

        $response['detailed'] = $this->db->query($sql)->getResult();
        $sql = "SELECT clid, SUM(billamount) as minute_charged FROM `cdr` WHERE trunk IS NOT NULL and calldate between '$start_dateStr' and '$end_dateStr' GROUP BY clid";
        // $sql = "SELECT clid, SUM(billamount) as minute_charged FROM `cdr` WHERE trunk IS NOT NULL and calldate between '$start_cycle' and '$end_cycle' GROUP BY src";
        $response['summary'] = $this->db->query($sql)->getResult();
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
