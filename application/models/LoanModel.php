<?php

class LoanModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getLoan($loan_member) {

        $this->db->where('loan_member', $loan_member);
        $this->db->join('member', 'loan.loan_member = member.member_id');
        $query = $this->db->get('loan');
        return $query->result();
    }

    public function getSpecificMemberLoan($id) {
        $data = array(
            'loan_id' => $id
        );
        $this->db->where($data);
        $query = $this->db->get('loan');
        return $query->row();
    }

    ////////////////////////////////////////////////////////////////////////////
    //Search
    public function searchLoan($id) {
        $this->db->like('loan_id', $id, 'both');
        $query = $this->db->get('loan');
        return $query->result();
    }
    

    //Pagination
    public function getAllUnpaidMemberLoans($limit, $start) {
        $this->db->select('*');
        $this->db->from('loan');
        $this->db->where('loan_status', 4);
        $this->db->or_where('loan_amount !=', 0);
        $this->db->join('member', 'loan.loan_member = member.member_id');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        $data = array();
         
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        
        
        /*
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return FALSE;
        }
         */
    }

    public function getAMemberLoan($id) {
        $this->db->select('*');
        $this->db->from('loan');
        $this->db->where('loan_member', $id);
        $this->db->where('loan_status', 4);
        $this->db->where('loan_amount !=', 0);
        $this->db->join('member', 'loan.loan_member = member.member_id and loan.loan_member = "' . $id . '"');
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllMemberLoan($id) {
        $this->db->select('*');
        $this->db->from('loan');
        $this->db->where('loan_member', $id);
        $this->db->join('member', 'loan.loan_member = member.member_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function getAllUnpaidMemberLoansCount() {
        $this->db->select('*');
        $this->db->from('loan');
        $this->db->where('loan_status', 4);
        $this->db->or_where('loan_amount !=', 0);
        $this->db->join('member', 'loan.loan_member = member.member_id');
        $query = $this->db->get();
        return $query->num_rows();
    }

    ///////////////////////////////////////////////////////////////////////////
    public function getAllLoans() {
        $this->db->from('loan');
        $this->db->join('member', 'loan.loan_member = member.member_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function getTotalLoans() {
        $this->db->select('SUM(loan_amount) as total');
        $query = $this->db->get('loan');
        return $query->row();
    }

    public function issueLoan($data) {
        $this->db->insert('loan', $data);
    }

    public function payLoan($data, $member, $loanId) {
        $this->db->where('loan_member', $member);
        $this->db->where('loan_id', $loanId);
        $this->db->update('loan', $data);
    }

//--------------------------------------------------------------------------
    public function calMonthlyPay($total, $months) {
        return $total / $months;
    }

    public function calculateLoan($amount, $rate, $months) {
        $a = $amount;
        $b = (1 + $rate / 100);
        $c = pow($b, $months);
        $d = $a * $c;
        $total = round($d, 2);
        $e = $this->calMonthlyPay($total, $months);
        $datas = array(
            'total' => $total,
            'monthly' => $e
        );
        return $datas;
    }

    public function takeLoan($member_id, $member_issuer_id, $amount, $months) {
        $dates = date('y-m-d');
        $data = array(
            'member_id' => $member_id,
            'member_issuer_id' => $member_issuer_id,
            'amount' => $amount,
            'status' => 0,
            'request_date' => $dates,
            'interest' => '',
            'duration' => $months
        );
        $this->db->insert('loan_request', $data);
    }

    public function getAllMemberLoanRequests($id) {
        $query = $this->db->get_where('loan_request', array('member_id' => $id));
        $this->db->order_by('id', 'DESC');
        return $query->result();
    }

    public function getLoanRequest($id) {
        $query = $this->db->get_where('loan_request', array('id' => $id));
        return $query->row();
    }

    public function getAllLoanRequest() {
        $this->db->select("*");
        $this->db->from("loan_request");
        $this->db->join('member', 'loan_request.member_id = member.member_id');
        $this->db->order_by('request_date', 'desc');
        $query = $this->db->get();

        return $query->result();
    }

    public function acceptLoanRequest($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('loan_request', $data);
    }

    public function rejectLoanRequest($id, $data) {

        $this->db->where('id', $id);
        $this->db->update('loan_request', $data);
    }

    public function deleteLoanRequest($id) {

        $this->db->where('id', $id);
        $this->db->delete('loan_request');
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function issueRequestedLoan($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('loan_request', $data);
        $requestedLoan = $this->getLoanRequest($id);

        $this->load->model('LoanInfo');
        $row = $this->LoanInfo->readLoanInfo();
        $interest = $row->loan_interest;

        $row1 = $this->getLoanRequest($id);
        $duration = $row1->duration;
        $initialAmount = $requestedLoan->amount;
        $dates = date('y-m-d');

        $loanAmount = $this->calculateLoan($initialAmount, $interest, $duration);
        $loanData = array(
            'loan_member' => $requestedLoan->member_id,
            'loan_interest' => $interest,
            'loan_duration' => $duration,
            'loan_amount' => $loanAmount['total'],
            'loan_initial_amount' => $initialAmount,
            'loan_monthly_pay' => $loanAmount['monthly'],
            'loan_status' => '4',
            'loan_issue_date' => $dates
        );
        $this->issueLoan($loanData);
    }

    public function getIssuerDetails($id) {
        $this->db->select('*');
        $this->db->from('member');
        $data = array(
            'member_id' => $id
        );
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result();
    }

}
