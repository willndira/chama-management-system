<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DebitModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('DateHelp');
        $this->load->model('Schedule');
    }

    public function getDebitRow($debit_id) {
        $this->db->select('*');
        $this->db->from('debit');
        $this->db->where('debit_id', $debit_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function registrationFee($amount, $trans_for, $trans_by) {
        $wen = $this->DateHelp->ConvertDateToTimeStamp(date('Y/m/d'));
        $data = array(
            'debit_date_debited' => $wen,
            'debit_date_due' => $wen,
            'debit_type' => 'registration',
            'debit_expected_amount' => $amount,
            'debit_paid_amount' => 0,
            'debit_status' => 0,
            'debit_tran_for' => $trans_for,
            'debit_tran_by' => $trans_by
        );
        $this->db->insert('debit', $data);
    }

    public function setFine($due, $amount, $for) {
        $now = $this->DateHelp->ConvertDateToTimeStamp(date('Y/m/d'));
        $date_due = $this->DateHelp->ConvertDateToTimeStamp($due);
        $session_data = $this->session->userdata('logged_in');
        $data = array(
            'debit_date_debited' => $now,
            'debit_date_due' => $date_due,
            'debit_type' => 'fine',
            'debit_expected_amount' => $amount,
            'debit_paid_amount' => 0,
            'debit_status' => '0',
            'debit_tran_for' => $for,
            'debit_tran_by' => $session_data['member_id'],
        );
        $this->db->insert('debit', $data);
    }

    public function setDebitDate($due, $amount) {
        $now = $this->DateHelp->ConvertDateToTimeStamp(date('Y/m/d'));
        $date_due = $this->DateHelp->ConvertDateToTimeStamp($due);
        $type = 'contribution';
        $this->load->model('MemberModel');
        $results = $this->MemberModel->getAllMembers();
        //---------------------------------------------------------------------
        $session_data = $this->session->userdata('logged_in');
        $data = array(
            'schedule_date' => $this->DateHelp->ConvertDateToTimeStamp(date('Y/m/d')),
            'schedule_amount' => $amount,
            'schedule_tran_id' => $session_data['member_id']
        );
        $schedule_id = $this->Schedule->insertDebit($data);
        //---------------------------------------------------------------------
        foreach ($results as $row) {
            $this->setAllMembersDebit($schedule_id, $now, $date_due, $type, $amount, $row->member_id);
        }
    }

    public function setAllMembersDebit($sche_id, $now, $date_due, $type, $amount, $for) {
        $session_data = $this->session->userdata('logged_in');
        $data = array(
            'debit_schedule_id' => $sche_id,
            'debit_date_debited' => $now,
            'debit_date_due' => $date_due,
            'debit_type' => $type,
            'debit_expected_amount' => $amount,
            'debit_paid_amount' => 0,
            'debit_status' => '0',
            'debit_tran_for' => $for,
            'debit_tran_by' => $session_data['member_id'],
        );
        $this->db->insert('debit', $data);
    }

    public function getAllUnpaidMemberDebits($member_id) {
        $this->db->select('*');
        $this->db->from('debit');
        $this->db->where('debit_status', 0);
        $this->db->where('debit_tran_for', $member_id);
        $this->db->join('member', 'debit.debit_tran_for= member.member_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllUnpaidFines() {
        $this->db->select('*');
        $this->db->from('debit');
        $this->db->where('debit_type', 'fine');
        $this->db->where('debit_status', 0);
        $this->db->join('member', 'debit.debit_tran_for= member.member_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function searchMemberGetAllUnpaidFines($value) {
        $this->db->select("*");
        $this->db->from('debit');
        $this->db->where('debit_type', 'fine');
        $this->db->where('debit_status', 0);
        $this->db->join('member', 'debit.debit_tran_for= member.member_id');
        $this->db->like('member.nationalId', $value);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllMemberUnpaidDebits($id) {
        $this->db->select('*');
        $this->db->from('debit');
        $this->db->where('debit_tran_for', $id);
        $this->db->where('debit_status', 0);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllMemberDebits($id) {
        $this->db->select('*');
        $this->db->from('debit');
        $this->db->where('debit_tran_for', $id);
        $this->db->join('member', 'debit.debit_tran_for= member.member_id');
        $query = $this->db->get();
        return $query->result();
    }

}
