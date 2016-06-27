<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LoanInfo extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function createLoanInfo($data) {
        $this->db->insert('loan_info', $data);
    }

    public function checkLoanInfoNo() {
        $query = $this->db->get('loan_info');
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function readLoanInfo() {
        $query = $this->db->get('loan_info');
        return $query->row();
    }

    public function availabilityOfLoan() {
        $this->db->where('loan_issue_status','1');
        $query = $this->db->get('loan_info');
        if($query->num_rows()>0){
            return TRUE;
        } else{
            return FALSE;
        }
       
    }

    public function updateLoanInfo($id, $data) {
        $this->db->where(array('loan_id' => $id));
        $this->db->update('loan_info', $data);
    }

    public function deleteLoanInfo($id) {
        $this->db->delete('loan_info', array('id' => $id));
    }

}
