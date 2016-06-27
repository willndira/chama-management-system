<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CreditModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('DateHelp');
        $this->load->model('DebitModel');
    }

    //------------------------------------------------------
//       $data = array(
//            'credit_debit_id'=>'',
//            'credit_date'=>'',
//            'credit_amount_credited'=>'',
//            'credit_amount_remaining'=>'',
//            'credit_intitial_debit_amount'=>'',
//            'credit_trans_by'=>'',
//            'credit_trans_for'=>''
//        );
    //------------------------------------------------------

    public function makeContribution($debit_id, $amount_credited, $for) {

        $debitRow = $this->DebitModel->getDebitRow($debit_id);
        $amount_remaining = $debitRow->debit_expected_amount - ($debitRow->debit_paid_amount + $amount_credited);
        $now = $this->DateHelp->ConvertDateToTimeStamp(date('Y/m/d'));
        $session_data = $this->session->userdata('logged_in');
        $data = array(
            'credit_debit_id' => $debit_id,
            'credit_date' => $now,
            'credit_amount_credited' => $amount_credited,
            'credit_amount_remaining' => $amount_remaining,
            'credit_intitial_debit_amount' => $debitRow->debit_expected_amount,
            'credit_trans_by' => $session_data['member_id'],
            'credit_trans_for' => $for
        );
        $this->db->insert('credit', $data);

        //check if all debit has been paid if true set debit_status to true
        $amountPaid = $amount_credited + $debitRow->debit_paid_amount;

        if ($amount_remaining === 0) {
            $debit = array(
                'debit_status' => TRUE,
                'debit_paid_amount' => $amountPaid
            );
        } else {
            $debit = array(
                'debit_paid_amount' => $amountPaid
            );
        }

        $this->db->where('debit_id', $debit_id);
        $this->db->update('debit', $debit);
    }

    public function getCreditRow($credit_id) {
        $this->db->select('*');
        $this->db->from('credit');
        $this->db->where('credit_id', $credit_id);
        $query = $this->db->get();
        return $query->row();
    }

//-----------------------------------------------------------------
    public function getMemberCreditTransaction($member_id) {
        $this->db->select('*');
        $this->db->from('credit');
        $this->db->where('credit_trans_for', $member_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getTotalMemberCreditTransaction($member_id) {
        $this->db->select('SUM(credit_amount_credited) as total ,SUM(credit_amount_remaining) as remaining,SUM(credit_amount_credited) as deposited');
        $this->db->where('credit_trans_for', $member_id);
        $query = $this->db->get('credit');
        return $query->row();
    }

    public function searchMemberCreditTransactionBetween($member_id, $f, $t) {
        $from = $this->DateHelp->ConvertDateToTimeStamp($f);
        $to = $this->DateHelp->ConvertDateToTimeStamp($t);
        $this->db->select('*');
        $this->db->from('credit');
        $this->db->where('credit_trans_for', $member_id);
       
        
        $this->db->where('credit_date >=', $from);
        $this->db->where('credit_date <=', $to);
        $query = $this->db->get();
        return $query->result();
    }

    public function searchTotalMemberCreditTransactionBetween($member_id, $f, $t) {
        $from = $this->DateHelp->ConvertDateToTimeStamp($f);
        $to = $this->DateHelp->ConvertDateToTimeStamp($t);
        $this->db->select('SUM(credit_intitial_debit_amount) as total ,SUM(credit_amount_remaining) as remaining,SUM(credit_amount_credited) as deposited');
        $this->db->where('credit_trans_for', $member_id);
        $this->db->where('credit_date >=', $from);
        $this->db->where('credit_date <=', $to);
        $query = $this->db->get('credit');
        return $query->row();
    }

//-----------------------------------------------------------------
      public function getGroupCreditTransaction() {
        $this->db->select('*');
        $this->db->from('credit');
        $query = $this->db->get();
        return $query->result();
    }
    
     public function getTotalAllCreditTransaction() {
        $this->db->select('SUM(credit_intitial_debit_amount) as total ,SUM(credit_amount_remaining) as remaining,SUM(credit_amount_credited) as deposited');
        $query = $this->db->get('credit');
        return $query->row();
    }

    public function searchGroupCreditTransactionBetween( $f, $t) {
        $from = $this->DateHelp->ConvertDateToTimeStamp($f);
        $to = $this->DateHelp->ConvertDateToTimeStamp($t);
        $this->db->select('*');
        $this->db->from('credit');
        $this->db->where('credit_date >=', $from);
        $this->db->where('credit_date <=', $to);
        $query = $this->db->get();
        return $query->result();
    }

    public function searchTotalGroupCreditTransactionBetween($f, $t) {
        $from = $this->DateHelp->ConvertDateToTimeStamp($f);
        $to = $this->DateHelp->ConvertDateToTimeStamp($t);
        $this->db->select('SUM(credit_intitial_debit_amount) as total ,SUM(credit_amount_remaining) as remaining,SUM(credit_amount_credited) as deposited');
        $this->db->where('credit_date >=', $from);
        $this->db->where('credit_date <=', $to);
        $query = $this->db->get('credit');
        return $query->row();
    }
    
    
    
    
}
