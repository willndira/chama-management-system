<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ContributionModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function remindContribution($amount, $date) {
        $this->load->model('MemberModel');
        $results = $this->MemberModel->getAllMembers();

        foreach ($results as $row) {
            $this->rContriLoop($row->member_id, $amount, $date);
        }
    }

    public function rContriLoop($member_id, $amount, $date) {


        $data = array(
            'contribution_amount' => 0,
            'contribution_date' => " ",
            'contribution_status' => 0,
            'contribution_member' => $member_id,
            'contribution_notification_date' => $date,
            'contribution_expected_amount' => $amount
        );
        $this->db->insert('contribution', $data);
    }

    public function contribute($amount, $status, $contribution_id) {
        $dates = date('Y/m/d');

        $query = $this->db->get_where('contribution', array('contribution_id' => $contribution_id));
        $res = $query->row();

        $a = $res->contribution_amount;
        $b = $a + $amount;
        $c = $res->contribution_expected_amount - $b;

        if ($c === 0) {
            $status = 1;
        }

        $data = array(
            'contribution_amount' => $b,
            'contribution_date' => $dates,
            'contribution_status' => $status
        );

        $this->db->where('contribution_id', $contribution_id);
        $this->db->update('contribution', $data);
        $this->load->model('TransactionModel', '', TRUE);
        $session_data = $this->session->userdata('logged_in');
        $data['member_id'] = $session_data['member_id'];
        $this->TransactionModel->depositContribution($data['member_id'], $contribution_id, $dates, $res->contribution_member, $amount);
    }

    public function getContribution($id) {
        $query = $this->db->get_where('contribution', array('contribution_member' => $id));
        return $query->result();
    }

    public function getMemberContributionNotification($id) {

        $this->db->select('*');
        $this->db->from('contribution');
        $this->db->where('contribution_status', 0);
        $this->db->where('contribution_member ', $id);
        $this->db->join('member', 'contribution.contribution_member= member.member_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function getContributionBetween($first_date, $second_date, $id) {

        $sql = "SELECT * FROM `contribution` WHERE `contribution_date` >= '" . $first_date . "' and `contribution_date` <= '" . $second_date . "' and `contribution_member` = '" . $id . "'";
//        $this->db->where('contribution_date >=', $first_date);
//        $this->db->where('contribution_date <=', $second_date);
//        $this->db->where('contribution_member ', $id);
//
//        $query = $this->db->get('contribution');
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getAllContributions() {
        $this->db->select('*');
        $this->db->from('contribution');
        $this->db->join('member', 'contribution.contribution_member= member.member_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllContributionsBetween($from, $to) {
        $this->db->select('*');
        $this->db->from('contribution');
        $this->db->where('contribution_date >=', $from);
        $this->db->where('contribution_date <=', $to);
        $this->db->join('member', 'contribution.contribution_member= member.member_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function getTotalContributionBetween($from, $to) {
        $this->db->select('SUM(contribution_amount) as total');
        $this->db->where('contribution_date >=', $from);
        $this->db->where('contribution_date <=', $to);
        $query = $this->db->get('contribution');
        return $query->row();
    }

    public function getAllPendingContribution() {
        $this->db->select('*');
        $this->db->from('contribution');
        $this->db->where('contribution_status ', 0);
        $this->db->where('contribution_notification_date <=', date('Y/m/d'));
        $this->db->join('member', 'contribution.contribution_member= member.member_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function getTotalPendingContributions() {
        $this->db->select('SUM(contribution_expected_amount-contribution_amount) as total');
        $this->db->where('contribution_status ', 0);
        $this->db->where('contribution_notification_date <=', date('Y/m/d'));
        $query = $this->db->get('contribution');
        return $query->row();
    }

    public function getAllPendingContributionBetween($from, $to) {
        $this->db->select('*');
        $this->db->from('contribution');
        $this->db->where('contribution_status ', 0);
        $this->db->where('contribution_notification_date <=', date('Y/m/d'));
        $this->db->where('contribution_date >=', $from);
        $this->db->where('contribution_date <=', $to);
        $this->db->join('member', 'contribution.contribution_member= member.member_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function getTotalContributions() {
        $this->db->select('SUM(contribution_amount) as total');
        $query = $this->db->get('contribution');
        return $query->row();
    }

}
