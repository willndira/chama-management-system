<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DateHelp extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    
    public function ConvertDateToTimeStamp($date) {
        $a = new DateTime($date);
        $b = $a->getTimestamp();
        return $b;
    }

}
