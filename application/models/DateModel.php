<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DateModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function dateDifference($date1,$date2) {
//        $date1 = "2007-03-24";
//        $date2 = "2009-06-26";
        $diff = abs(strtotime($date2) - strtotime($date1));
        $years = floor($diff / (365 * 60 * 60 * 24));
        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        $interval = array(
            'years'=>$years,
            'months'=>$months,
            'days'=>$days
        );
        return $interval;
    }

}
