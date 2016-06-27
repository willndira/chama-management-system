<?php

class TransactionModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //--------------------------------------------------------------------------
    /*
      MemberTransaction
     */
    public function addMemberTransaction($transacter, $transID) {
        $time = date('y-m-d');
        $data = array(
            'transaction_member' => $transacter,
            'transaction_type' => 'addMember',
            'transaction_type_id' => $transID,
            'transaction_time' => $time
        );
        $this->db->insert('transaction', $data);
    }

    //--------------------------------------------------------------------------
    public function depositContribution($member_id, $contribution_id, $time, $transaction_for,$amount) {
        $type = "Contribution";
        $data = array(
            'transaction_member' => $member_id,
            'transaction_done_for' => $transaction_for,
            'transaction_type' => $type,
            'transaction_type_id' => $contribution_id,
            'transaction_time' => $time,
            'transaction_amount'=>$amount
        );
        $this->db->insert('transaction', $data);
    }

    public function getTransaction($id, $type) {
        $this->db->select('*');
        $this->db->from('transaction');
        $this->db->join('contribution', 'transaction.transaction_type_id = contribution.contribution_id');
        $this->db->where('transaction.transaction_member', $id);
        $this->db->where('transaction.transaction_type', $type);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllContributionTransactions() {
        $this->db->select('*');
        $this->db->from('transaction');
        $this->db->join('contribution', 'transaction.transaction_type_id = contribution.contribution_id');
        $this->db->where('transaction.transaction_type', 'contribution');
        $query = $this->db->get();
        return $query->result();
    }

    public function getTotalContributions() {
        $this->db->select('SUM(contribution_amount) as total');
        $query = $this->db->get('contribution');
        return $query->row();
    }

    public function getAllContributionTransactionsBetween($from, $to) {
        //$sql = "SELECT * FROM transaction,contribution  WHERE transaction_time >= '" . $from . "' and transaction_time <= '" . $to . "' and in(select * from contribution where contribution_id =)" ;
        //$sql = "select * from transaction,contribution where transaction.transaction_type_id = contribution.contribution_id and transaction.transaction_id in(select transaction_id from transaction where transaction_time between '".$from."'and'".$to."' )";
        $this->db->select('*');
        $this->db->from('transaction');
        $this->db->join('contribution', 'transaction.transaction_type_id = contribution.contribution_id');
//        $this->db->where('transaction.transaction_member', $id);
        $this->db->where('transaction.transaction_type', 'contribution');
        $this->db->where('transaction_time >= ', '2015/07/1');
        $this->db->where('transaction_time <= ', '2015/07/3');
//        $this->db->where('transaction_time >= ', $from);
//        $this->db->where('transaction_time <= ', $to);
        $query = $this->db->get();
//        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getTotalContributionsBetween($from, $to) {
        //$db->query("SELECT * FROM events WHERE event_date >= CURDATE()");
        $this->db->select('SUM(contribution_amount) as total');
        $this->db->where('contribution_date >= ', $from);
        $this->db->where('contribution_date <= ', $to);
        $query = $this->db->get('contribution');
        return $query->row();
    }

}
