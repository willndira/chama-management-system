<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Loan extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function calculateLoan($amount, $rate, $months) {
        $this->load->model('LoanModel');
        $data = array(
            'amount' => $this->LoanModel->calculateLoan($amount, $rate, $months)
        );
    }


}
