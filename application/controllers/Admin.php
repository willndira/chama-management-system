<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('MemberModel', "", True);
    }

    public function index() {
        $this->members();
    }

    //--------------------------------------------------------------------------


    public function members() {
        
        $this->load->model('MemberModel', "", True);
        $data['members'] = $this->MemberModel->getAllMembers();
        $this->load->view('admin/view_admin_header');
        $this->load->view('admin/view_admin_members', $data);
        $this->load->view('admin/view_admin_footer');
    }

    public function members_search() {
        $this->load->model('MemberModel', "", True);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('search', 'Search', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->members();
        } else {
            $value = $this->input->post('search');
            $data['members'] = $this->MemberModel->searchMember($value);
            $this->load->view('admin/view_admin_header');
            $this->load->view('admin/view_admin_members_search', $data);
            $this->load->view('admin/view_admin_footer');
        }
    }

    public function fine() {
        $this->load->model('MemberModel', "", True);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('search', 'Search', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['members'] = $this->MemberModel->getAllMembers();
            $this->load->view('admin/view_admin_header');
            $this->load->view('admin/view_admin_fine', $data);
            $this->load->view('admin/view_admin_footer');
        } else {
            $value = $this->input->post('search');
            $data['members'] = $this->MemberModel->searchMember($value);
            $this->load->view('admin/view_admin_header');
            $this->load->view('admin/view_admin_fine', $data);
            $this->load->view('admin/view_admin_footer');
        }
    }

    public function fine_select($id) {
        $data['user'] = $this->MemberModel->getMember($id);
        $this->load->view('admin/view_admin_header');
        $this->load->view('admin/view_admin_fine_member', $data);
        $this->load->view('admin/view_admin_footer');
    }

    public function fine_submit() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('member_id', 'Amount', 'required|xss_clean|integer');
        $this->form_validation->set_rules('amount', 'Amount', 'required|xss_clean|integer|callback_check_currency');
        $this->form_validation->set_rules('date', 'Date', 'required|callback_validate_date');
        if ($this->form_validation->run() == FALSE) {
            $this->fine_select($this->input->post('member_id'));
        } else {
            $value = $this->input->post('amount');
            $this->DebitModel->setFine($this->input->post('date'), $value, $this->input->post('member_id'));
            $this->fine_statements();
        }
    }

    public function check_currency($amount) {
        if (preg_match("/^-?[0-9]+(?:\.[0-9]{1,2})?$/", $this->input->post('amount'))) {
            return TRUE;
        } else {
            $this->form_validation->set_message('check_currency', 'Please enter a valid amount');
            return false;
        }
    }

    public function fine_statements() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('search', 'Search', 'xss_clean|required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'debit' => $this->DebitModel->getAllUnpaidFines()
            );
            $this->load->view('admin/view_admin_header');
            $this->load->view('admin/view_admin_fine_statements', $data);
            $this->load->view('admin/view_admin_footer');
        } else {
            $value = $this->input->post('search');
            $data['debit'] = $this->DebitModel->searchMemberGetAllUnpaidFines($value);
            $this->load->view('admin/view_admin_header');
            $this->load->view('admin/view_admin_fine_statements', $data);
            $this->load->view('admin/view_admin_footer');
        }
    }

    public function member($id) {
        $this->load->model('MemberModel', "", True);
        $this->load->model('TransactionModel', "", True);
        $type = "Contribution";
        $data = array(
            'member' => $this->MemberModel->getMember($id),
            'contribution' => $this->TransactionModel->getTransaction($id, $type)
        );

        //$data['member'] = $this->MemberModel->getMember($id);
        $this->load->view('admin/view_admin_header');
        $this->load->view('admin/view_admin_member', $data);
        $this->load->view('admin/view_admin_footer');
    }

    //--------------------------------------------------------------------------
    public function addMemberView() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->view('admin/view_admin_header');
        $this->load->view('admin/view_admin_addMember');
        $this->load->view('admin/view_admin_footer');
    }

    public function addMbr() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('firstName', 'FirstName', 'required');
        $this->form_validation->set_rules('middleName', 'MiddleName', 'required');
        $this->form_validation->set_rules('lastName', 'LastName', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required|xss_clean|numerical');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('dob', 'DateOfBirth', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('nationalId', 'NationalId', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password_conf', 'Password confirmation', 'required');
        if ($this->form_validation->run() == TRUE) {
            $this->load->model('MemberModel');
            $this->MemberModel->addMember();
            $this->members();
        } else {
            $this->addMemberView();
        }
    }

    public function editMember($id) {
        $this->load->model('MemberModel', "", TRUE);
        unset($data);
        $data['member'] = $this->MemberModel->getMember($id);
        $this->load->view('admin/view_admin_header');
        $this->load->view('admin/view_admin_editMember', $data);
        $this->load->view('admin/view_admin_footer');
    }

    public function editMemberDetails() {
        $data = array(
            'firstname' => $this->input->post('firstName'),
            'middlename' => $this->input->post('middleName'),
            'surname' => $this->input->post('surName'),
            'gender' => $this->input->post('gender'),
            'dob' => $this->input->post('dob'),
            'nationalId' => $this->input->post('nationalId'),
            'type' => $this->input->post('type')
        );
        $this->load->model('MemberModel');
        $id = $this->input->post('member_id');
        $this->MemberModel->editMember($id, $data);
        $this->editMember($id);
    }

    public function resetPasswordView() {
        $this->load->model('PasswordModel');
        $data = array('password' => $this->PasswordModel->getUnchangedPassword());
        $this->load->view('admin/view_admin_header');
        $this->load->view('admin/view_admin_passwordRequest', $data);
        $this->load->view('admin/view_admin_footer');
    }

    public function resetPassword() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nationalId', '', 'required|xss_clean');

        $this->form_validation->set_rules('pass', 'Password', 'trim|required');
        $this->form_validation->set_rules('pass2', 'Password Confirmation', 'trim|required|matches[pass]');


        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'password' => sha1($this->input->post('pass'))
            );
            $this->load->model('PasswordModel');
            $this->PasswordModel->changePassword($data);
            $this->resetPasswordView();
        } else {
            $this->resetPasswordView();
        }
    }

    //----------------------------------------------------------------------
    //----------------------------------------------------------------------
    public function setDeposit() {
        $this->load->view('admin/view_admin_header');
        $this->load->view('admin/view_admin_setDeposit');
        $this->load->view('admin/view_admin_footer');
    }

    public function insertDepositInfo() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('', '', 'required|xss_clean');

        if ($this->form_validation->run() == TRUE) {
            
        } else {
            $this->setDeposit();
        }
    }

    //-----------------------------------------------------------------------

    public function updateContributeView() {
        $this->load->view('admin/view_admin_header');
        $this->load->view('admin/view_admin_setContribution');
        $this->load->view('admin/view_admin_footer');
    }

    public function updateContribute() {
        $this->load->model('ContributionModel');
        $this->ContributionModel->remindContribution();
    }

    public function deposit_view() {
        $this->load->model('MemberModel', "", True);
        $data['members'] = $this->MemberModel->getAllMembers();
        $this->load->view('admin/view_admin_header');
        $this->load->view('admin/view_admin_deposit', $data);
        $this->load->view('admin/view_admin_footer');
    }

    public function groupDeposit() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('from', 'From date', 'required');
        $this->form_validation->set_rules('to', 'To date', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->model('ContributionModel');
            $data = array(
                'total' => $this->ContributionModel->getTotalContributions(),
                'allContribution' => $this->ContributionModel->getAllContributions()
            );
            $this->load->view('admin/view_admin_header');
            $this->load->view('admin/view_admin_group_deposit', $data);
            $this->load->view('admin/view_admin_footer');
        } else {
            $from = $this->input->post('from');
            $to = $this->input->post('to');
            $this->load->model('ContributionModel');
            $data = array(
                'total' => $this->ContributionModel->getTotalContributionBetween($from, $to),
                'allContribution' => $this->ContributionModel->getAllContributionsBetween($from, $to)
            );
            $this->load->view('admin/view_admin_header');
            $this->load->view('admin/view_admin_group_deposit', $data);
            $this->load->view('admin/view_admin_footer');
        }
    }

    public function pendingDeposit() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('from', 'From date', 'required');
        $this->form_validation->set_rules('to', 'To date', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->model('ContributionModel');
            $data = array(
                'total' => $this->ContributionModel->getTotalPendingContributions(),
                'allContribution' => $this->ContributionModel->getAllPendingContribution()
            );
            $this->load->view('admin/view_admin_header');
            $this->load->view('admin/view_admin_pending_deposit', $data);
            $this->load->view('admin/view_admin_footer');
        } else {
            $from = $this->input->post('from');
            $to = $this->input->post('to');
            $this->load->model('ContributionModel');
            $data = array(
                'total' => $this->ContributionModel->getTotalContributionBetween($from, $to),
                'allContribution' => $this->ContributionModel->getAllPendingContributionBetween($from, $to)
            );
            $this->load->view('admin/view_admin_header');
            $this->load->view('admin/view_admin_pending_deposit', $data);
            $this->load->view('admin/view_admin_footer');
        }
    }

    public function depositAccount($id) {
        $this->load->model('TransactionModel');
        $this->load->model('ContributionModel');
        $this->load->model('MemberModel');

        $data = array(
            'user' => $this->MemberModel->getMember($id),
            'transaction' => $this->TransactionModel->getTransaction($id, 'Contribution'),
            'contribution' => $this->ContributionModel->getContribution($id)
        );
        $this->load->view('admin/view_admin_header');
        $this->load->view('admin/view_admin_deposit_member_deposit', $data);
        $this->load->view('admin/view_admin_footer');
    }

    public function deposit() {
        $id = $this->input->post('id');
        $this->load->model('AccountModel');
        if (isset($id)) {
            $this->load->model('ContributionModel');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('amount', 'Amount', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->depositAccount($id);
            } else {
                $amount = $this->input->post('amount');
                $status = "paid";
                $this->ContributionModel->contribute($amount, $status, $id);
                $this->member($id);
            }
        } else {
            redirect('Admin/members', 'location');
        }
    }

    //--------------------------------------------------------------------------
    public function accounts() {
        $this->load->view('admin/view_admin_header');
        $this->load->view('admin/view_admin_loan');
        $this->load->view('admin/view_admin_footer');
    }

    //--------------------------------------------------------------------------

    public function page() {
        $data = array(
            'loanInfo' => $this->LoanInfo->readLoanInfo()
        );
        return $data;
    }

    public function loan() {
        $this->load->model('LoanModel');
        $data = array(
            'total' => $this->LoanModel->getTotalLoans(),
            'loans' => $this->LoanModel->getAllLoans()
        );
        $this->load->view('admin/view_admin_header');
        $this->load->view('admin/view_admin_loan_members', $data);
        $this->load->view('admin/view_admin_footer');
    }

    public function loan_info() {
        $this->load->model('LoanInfo', '', true);
        $data = array(
            'loan_info' => $this->LoanInfo->readLoanInfo()
        );
        $this->load->view('admin/view_admin_header');
        $this->load->view('admin/view_admin_loan_info', $data);
        $this->load->view('admin/view_admin_footer');
    }

    public function loan_info_add() {
        $this->load->view('admin/view_admin_header');
        $this->load->view('admin/view_admin_loan_info_add');
        $this->load->view('admin/view_admin_footer');
    }

    public function loan_info_edit() {
        $this->load->model('LoanInfo', '', TRUE);
        $data = array(
            'loan_info' => $this->LoanInfo->readLoanInfo()
        );
        $this->load->view('admin/view_admin_header');
        $this->load->view('admin/view_admin_loan_info_edit', $data);
        $this->load->view('admin/view_admin_footer');
    }

    public function editLoanInfo() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('interest', 'Interest', 'xss_clean|required');
        $this->form_validation->set_rules('min', 'Minimum', 'xss_clean|required');
        $this->form_validation->set_rules('max', 'Maximum', 'xss_clean|required');
        $this->form_validation->set_rules('status', 'Status', 'xss_clean|required');

        if ($this->form_validation->run() == FALSE) {
            $this->loan_info_edit();
        } else {
            $this->load->model('LoanInfo');
            $loan_id = $this->input->post('loan_id');
            $data = array(
                'loan_interest' => $this->input->post('interest'),
                'loan_min' => $this->input->post('min'),
                'loan_max' => $this->input->post('max'),
                'loan_issue_status' => $this->input->post('status')
            );
            $this->LoanInfo->updateLoanInfo($loan_id, $data);
            $this->loan_info();
        }
    }

    public function addLoanInfo() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('interest', 'Interest', 'xss_clean|required');
        $this->form_validation->set_rules('min', 'Minimum', 'xss_clean|required');
        $this->form_validation->set_rules('max', 'Maximum', 'xss_clean|required');
        $this->form_validation->set_rules('status', 'Status', 'xss_clean|required');

        if ($this->form_validation->run() == TRUE && $this->loan_check_info() == TRUE) {
            $this->load->model('LoanInfo');
            $data = array(
                'loan_interest' => $this->input->post('interest'),
                'loan_min' => $this->input->post('min'),
                'loan_max' => $this->input->post('max'),
                'loan_issue_status' => $this->input->post('status')
            );
            $this->LoanInfo->createLoanInfo($data);
            $this->loan_info();
        } else {

            $this->loan_info_add();
        }
    }

    public function loan_check_info() {
        $this->load->model('LoanInfo');
        $test = $this->LoanInfo->checkLoanInfoNo();
        if ($test) {
            return TRUE;
        } else {
            $this->form_validation->set_message('loan_info', 'Loan information already exists.You can only edit');
            return FALSE;
        }
    }

    public function loan_view($data) {
        $this->load->view('admin/view_admin_header');
        $this->load->view('admin/view_admin_loan', $data);
        $this->load->view('admin/view_admin_footer');
    }

    //--------------------------------------------------------------------------
    public function schedule_view() {

        $this->load->model('Schedule');
        $data = array(
            'events' => $this->Schedule->getAllSchedule()
        );

        $this->load->view('admin/view_admin_header');
        $this->load->view('admin/view_admin_addEvent', $data);
        $this->load->view('admin/view_admin_footer');
    }

    public function add_schedule() {
        $this->load->model('Schedule');
        $this->load->model('DebitModel');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('date', 'Date ', 'required|xss_clean|callback_validate_date');
        $this->form_validation->set_rules('reg[date]', 'Date ', 'regex_match[(0[1-9]|1[0-9]|2[0-9]|3(0|1))-(0[1-9]|1[0-2])-\d{4}]');
        $this->form_validation->set_rules('amount', 'Amount ', 'required|xss_clean|numeric|is_natural');
        if ($this->form_validation->run() == FALSE) {
            $this->schedule_view();
        } else {
            $due = $this->input->post('date');
            $amount = $this->input->post('amount');
            $this->DebitModel->setDebitDate($due, $amount);
            $this->schedule_view();
        }
    }

    public function deleteSchedule($id) {
        $this->load->model('Schedule');
        $this->Schedule->deleteSchedule($id);
        $this->schedule_view();
    }

    public function validate_date($val) {
        //date being passed
        $parts = explode("/", $this->input->post('date'));
        if (count($parts) < 3) {
            $this->form_validation->set_message('validate_date', 'Please insert a valid date ');
            return FALSE;
        }

        $year = $parts[0];
        $month = $parts[1];
        $day = $parts[2];
        //todays date
        $d = date('d');
        $m = date('m');
        $y = date('Y');

        $x = $day . "/" . $month . "/" . $year;


        if (!checkdate($month, $day, $year)) {
            $this->form_validation->set_message('validate_date', 'Please insert a valid date ');
            return FALSE;
        }


        if (($day >= $d) && ($month >= $m) && ($year >= $y)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('validate_date', 'Date must be greator than or equal to todays date');
            return FALSE;
        }
    }

    function checkDateFormat($date) {

        if (preg_match("/[0-31]{2}\/[0-12]{2}\/[0-9]{4}/", $date)) {
            if (checkdate(substr($date, 3, 2), substr($date, 0, 2), substr($date, 6, 4))) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
