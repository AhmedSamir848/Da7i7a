<?php
$path = __DIR__;
$path = rtrim($path, "classes");
include_once $path . 'Database/DB.php';

class Report {

    private $reportName;
    private $reportID;
    private $reportDate;
    private $discription;
    
    function collectData(){
        
    }
    
    function getReportName() {
        return $this->reportName;
    }

    function getReportID() {
        return $this->reportID;
    }

    function getReportDate() {
        return $this->reportDate;
    }

    function getDiscription() {
        return $this->discription;
    }

    function setReportName($reportName) {
        $this->reportName = $reportName;
    }

    function setReportID($reportID) {
        $this->reportID = $reportID;
    }

    function setReportDate($reportDate) {
        $this->reportDate = $reportDate;
    }

    function setDiscription($discription) {
        $this->discription = $discription;
    }


}
