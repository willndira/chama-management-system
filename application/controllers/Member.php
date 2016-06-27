<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Member extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('DebitModel');
        $this->load->model('MemberModel');
        $this->load->model('PasswordModel');
        $this->load->library('session');
    }

    public function index() {

        //($_SESSION['logged_in'] )


        if ($this->session->userdata('logged_in') != NULL) {
            $session_data = $this->session->userdata('logged_in');
            $data['member_id'] = $session_data['member_id'];
            $data['nationalId'] = $session_data['nationalId'];
            $data['firstname'] = $session_data['firstname'];
            $data['middlename'] = $session_data['middlename'];
            $data['surname'] = $session_data['surname'];
            $data['gender'] = $session_data['gender'];
            $data['dob'] = $session_data['dob'];
            $data['nationalId'] = $session_data['nationalId'];
            $data['type'] = $session_data['type'];
            //$this->home($data);
            $this->notification();
        } else {
            //If no session, redirect to login page
            redirect('Site/index', 'refresh');
        }
    }

    public function notification() {

        $session_data = $this->session->userdata('logged_in');
        //$id = $this->session->userdata('member_id');


        $this->load->model('LoanModel');
        $this->load->model('ContributionModel');

        $data = array(
            'loan' => $this->LoanModel->getAMemberLoan($session_data['member_id']),
            'debit' => $this->DebitModel->getAllMemberUnpaidDebits($session_data['member_id']),
            'contribution' => $this->ContributionModel->getMemberContributionNotification($session_data['member_id'])
        );
        //print_r($this->DebitModel->getAllMemberUnpaidDebits($session_data['member_id']));
        //print_r($this->ContributionModel->getMemberContributionNotification($session_data['member_id']));
        $this->load->view('member/view_member_header');
        $this->load->view('member/view_member_notification', $data);
        $this->load->view('member/view_member_footer');
    }

    public function home($data) {
        $this->load->view('member/view_member_header');
        $this->load->view('member/view_member_home', $data);
        $this->load->view('member/view_member_footer');
    }

    public function profile() {
        $session_data = $this->session->userdata('logged_in');
        $this->load->model('MemberModel');
        $id = $session_data['member_id'];


        $id = $this->session->userdata('member_id');
        $data = array(
            'user' => $this->MemberModel->getMember($session_data['member_id']),
            'id' => $id
        );
        $this->load->view('member/view_member_header');
        $this->load->view('member/view_member_profile', $data);
        $this->load->view('member/view_member_footer');
    }

    public function changePassword() {
        $this->load->view('member/view_member_header');
        $this->load->view('member/view_member_change_password');
        $this->load->view('member/view_member_footer');
    }

    public function resetPassword() {
        $this->load->library('form_validation');


        $this->form_validation->set_rules('current', 'Current Password', 'trim|required|callback_checkPassword');
        $this->form_validation->set_rules('new', 'New Password', 'trim|required');
        $this->form_validation->set_rules('confirm', 'Password Confirmation', 'trim|required|matches[new]');


        if ($this->form_validation->run() == TRUE) {
            $session_data = $this->session->userdata('logged_in');
            $this->load->model('PasswordModel');
            $this->PasswordModel->changeOwnPassword($session_data['nationalId'], sha1($this->input->post('new')));
            $this->profile();
        } else {
            $this->changePassword();
        }
    }

    public function checkPassword() {


        $session_data = $this->session->userdata('logged_in');
        $query = $this->PasswordModel->checkPasswordMatch($session_data['nationalId'], $this->input->post('current'));
        if ($query) {
            return TRUE;
        } else {
            $this->form_validation->set_message('checkPassword', ' Password not correct, please try again');
            return FALSE;
        }
    }

    public function contributions() {
        $session_data = $this->session->userdata('logged_in');
        $this->load->model('TransactionModel');
        $this->load->model('ContributionModel');
        $this->load->model('MemberModel');
        //getContributionBetween($first_date, $second_date)

        $this->load->library('form_validation');
        $this->form_validation->set_rules('from', '', 'required');
        $this->form_validation->set_rules('to', '', 'required');

        if ($this->form_validation->run() === TRUE) {

            $data = array(
                'user' => $this->MemberModel->getMember($session_data['member_id']),
                'transaction' => $this->TransactionModel->getTransaction($session_data['member_id'], 'Contribution'),
                'contribution' => $this->ContributionModel->getContributionBetween($this->input->post('from'), $this->input->post('to'), $session_data['member_id']),
                'status' => 'contribution'
            );
            $this->load->view('member/view_member_header');
            $this->load->view('member/view_member_contribution', $data);
            $this->load->view('member/view_member_footer');
        } else {

            $data = array(
                'user' => $this->MemberModel->getMember($session_data['member_id']),
                'transaction' => $this->TransactionModel->getTransaction($session_data['member_id'], 'Contribution'),
                'contribution' => $this->ContributionModel->getContribution($session_data['member_id']),
                'status' => 'contribution'
            );
            $this->load->view('member/view_member_header');
            $this->load->view('member/view_member_contribution', $data);
            $this->load->view('member/view_member_footer');
        }
    }

    public function group_contributions() {
        $session_data = $this->session->userdata('logged_in');
        $this->load->model('TransactionModel');
        $this->load->model('ContributionModel');
        $this->load->model('MemberModel');
        //getContributionBetween($first_date, $second_date)

        $this->load->library('form_validation');
        $this->form_validation->set_rules('from', '', 'required');
        $this->form_validation->set_rules('to', '', 'required');

        if ($this->form_validation->run() === TRUE) {

            $data = array(
                'user' => $this->MemberModel->getMember($session_data['member_id']),
                'transaction' => $this->TransactionModel->getAllContributionTransactionsBetween($this->input->post('from'), $this->input->post('to')),
                'contribution' => $this->ContributionModel->getContributionBetween($this->input->post('from'), $this->input->post('to'), $session_data['member_id']),
                'status' => 'contribution',
                'total' => $this->TransactionModel->getTotalContributionsBetween($this->input->post('from'), $this->input->post('to'))
            );
            $this->load->view('member/view_member_header');
            $this->load->view('member/view_group_contributions', $data);
            $this->load->view('member/view_member_footer');
        } else {

            $data = array(
                'user' => $this->MemberModel->getMember($session_data['member_id']),
                'transaction' => $this->TransactionModel->getAllContributionTransactions(),
                'contribution' => $this->ContributionModel->getAllContributions(),
                'total' => $this->TransactionModel->getTotalContributions()
            );
            $this->load->view('member/view_member_header');
            $this->load->view('member/view_group_contributions', $data);
            $this->load->view('member/view_member_footer');
        }
    }

//-----------------------------------------------------------------------------



    public function loan_calculator() {
        $this->load->view('member/view_member_header');
        $this->load->view('member/view_member_loan_calculator');
        $this->load->view('member/view_member_footer');
    }

    public function take_loan() {
        $this->load->model('LoanInfo');
        $data = array(
            'loan_interest' => $this->LoanInfo->readLoanInfo(),
            'availability' => $this->LoanInfo->availabilityOfLoan()
        );
        $this->load->view('member/view_member_header');
        $this->load->view('member/view_member_loan_take', $data);
        $this->load->view('member/view_member_footer');
    }

    public function loan_Statements() {
        $session_data = $this->session->userdata('logged_in');
        $member = $session_data['member_id'];
        $this->load->model('LoanModel');
        $data = array(
            'loan' => $this->LoanModel->getAllMemberLoan($member)
        );

        $this->load->view('member/view_member_header');
        $this->load->view('member/view_member_loan_statements', $data);
        $this->load->view('member/view_member_footer');
    }

    public function loan_request_statements() {
        $this->load->model('LoanModel');
        $session_data = $this->session->userdata('logged_in');
        $member = $session_data['member_id'];
        $data = array(
            'requests' => $this->LoanModel->getAllMemberLoanRequests($member)
        );
        $this->load->view('member/view_member_header');
        $this->load->view('member/view_member_loan_request_statement', $data);
        $this->load->view('member/view_member_footer');
    }

    public function takeLoan() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('amount', 'Amount', 'xss_clean|required|is_natural|numerical');
        $this->form_validation->set_rules('months', 'Months', 'xss_clean|required');
        $this->form_validation->set_rules('memberId', '', 'xss_clean|required|callback_check_loan');

        if ($this->form_validation->run() == TRUE) {
            $amount = $this->input->post('amount');
            $months = $this->input->post('months');
            $session_data = $this->session->userdata('logged_in');
            $member = $session_data['member_id'];
            $issuer = '';
            $this->load->model('LoanModel');
            $this->LoanModel->takeLoan($member, $issuer, $amount, $months);

            $this->loan_request_statements();
        } else {
            $this->take_loan();
            //redirect('Member/loan_view', 'reflesh');
        }
    }

    public function check_loan($member_id) {
        $this->load->model('LoanModel');
        $this->load->model('LoanInfo');

        $status = $this->LoanInfo->readLoanInfo()->loan_issue_status;
        $result = $this->LoanModel->getAMemberLoan($member_id);
        $test = ($status == 0) ? FALSE : TRUE;

        if (!$result) {
            if ($test == 0) {
                $this->form_validation->set_message('check_loan', 'Sorry loan issue has been terminated, Please try again later');
                return FALSE;
            } else {
                return TRUE;
            }
        } else {

            $this->form_validation->set_message('check_loan', 'Sorry you cannot  take a loan, Please try again later');
            return FALSE;
        }
    }

    //-------------------------------------------------------------------------
}
