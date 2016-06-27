<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AccountModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function createAccount($id) {
        $this->load->helper('date');
        $data = array(
            'account_member' => $id,
            'account_amount' => 0,
            'account_creation_date' => now()
        );
        $this->db->insert('account', $data);
    }

    public function getAccount($id) {
        $query = $this->db->get_where('account', array('id' => $id));
        return $query->result();
    }

    public function editMember($id, $data) {
        $this->db->where('member_id', $id);
        $this->db->update('member', $data);
    }

    public function deposit($id) {
        $member = $id;
        $amount = $this->input->post('amount');
        $data = array(
        );
        $this->db->where('account_member', $id);
        $this->db->update('account',$data);
        
        $transactionDate = date('y-m-d');

        $this->db->insert();

        depositContribution($member_id, $account_id, $time);
        $row = $this->getAccount($id);
        if ($row->num_rows() > 0) {
            //if that account exists
            $cA = -1;
            $cA = $row->amount;
            $cA +=$depositedAmount;

            $data = array(
                'amount' => $cA
            );
            $this->db->where('id', $id);
            $this->db->update('account', $data);
        } else {
            
        }
    }

}
