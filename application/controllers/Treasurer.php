<?php

class Treasurer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('DebitModel');
        $this->load->model('LoanModel');
        $this->load->model('CreditModel');
        $this->load->model('TransactionModel');
        $this->load->model('ContributionModel');
        $this->load->model('MemberModel');
    }

    public function index() {
        $this->members();
//        $this->load->view('treasurer/view_header');
//        $this->load->view('treasurer/view_home');
//        $this->load->view('treasurer/view_footer');
    }

    public function members() {
        $this->load->model('MemberModel', "", True);
        $data['members'] = $this->MemberModel->getAllMembers();
        $this->load->view('treasurer/view_header');
        $this->load->view('treasurer/view_members', $data);
        $this->load->view('treasurer/view_footer');
    }

    public function member($id) {
        $this->load->model('MemberModel', "", True);
        $this->load->model('TransactionModel', "", True);
        $type = "Contribution";
        $data = array(
            'user' => $this->MemberModel->getMember($id),
            'contribution' => $this->TransactionModel->getTransaction($id, $type),
            'debit' => $this->DebitModel->getAllMemberDebits($id),
            'loan' => $this->LoanModel->getAllMemberLoan($id)
        );
        //$data['member'] = $this->MemberModel->getMember($id);
        $this->load->view('treasurer/view_header');
        $this->load->view('treasurer/view_member', $data);
        $this->load->view('treasurer/view_footer');
    }

    //--------------------------------------------------------------------------
    public function contributions() {
        $this->load->model('MemberModel', "", True);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('search', 'Serach', 'xss_clean|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->model('MemberModel', "", True);
            $data['members'] = $this->MemberModel->getAllMembers();
            $this->load->view('treasurer/view_header');
            $this->load->view('treasurer/view_contribution', $data);
            $this->load->view('treasurer/view_footer');
        } else {
            $value = $this->input->post('search');
            $data['members'] = $this->MemberModel->searchMember($value);
            $this->load->view('treasurer/view_header');
            $this->load->view('treasurer/view_contribution', $data);
            $this->load->view('treasurer/view_footer');
        }
    }

    public function member_contribution($id) {

        $this->load->model('TransactionModel');
        $this->load->model('ContributionModel');
        $this->load->model('MemberModel');

        $data = array(
            'user' => $this->MemberModel->getMember($id),
            'unpaid_contribution' => $this->ContributionModel->getMemberContributionNotification($id),
            'transaction' => $this->TransactionModel->getTransaction($id, 'Contribution'),
            'contribution' => $this->ContributionModel->getContribution($id),
            'status' => 'contribution',
            'debit' => $this->DebitModel->getAllUnpaidMemberDebits($id)
        );
        $this->load->view('treasurer/view_header');
        $this->load->view('treasurer/view_member_contribution', $data);
        $this->load->view('treasurer/view_footer');
    }

    public function contribution_statements() {

        $this->load->model('MemberModel', "", True);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('search', 'Search', 'xss_clean|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->model('MemberModel', "", True);
            $data['members'] = $this->MemberModel->getAllMembers();
            $this->load->view('treasurer/view_header');
            $this->load->view('treasurer/view_contribution_members', $data);
            $this->load->view('treasurer/view_footer');
        } else {
            $value = $this->input->post('search');
            $data['members'] = $this->MemberModel->searchMember($value);
            $this->load->view('treasurer/view_header');
            $this->load->view('treasurer/view_contribution_members', $data);
            $this->load->view('treasurer/view_footer');
        }
    }

    public function member_contribution_statements($id) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('from', 'From date', 'required||callback_validate_date_from');
        $this->form_validation->set_rules('to', 'To date', 'required|callback_validate_date_to');


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'user' => $this->MemberModel->getMember($id),
                'total' => $this->CreditModel->getTotalMemberCreditTransaction($id),
                'credit' => $this->CreditModel->getMemberCreditTransaction($id)
            );
            $this->load->view('treasurer/view_header');
            $this->load->view('treasurer/view_member_contribution_statements', $data);
            $this->load->view('treasurer/view_footer');
        } else {
            $from = $this->input->post('from');
            $to = $this->input->post('to');
            $data = array(
                'user' => $this->MemberModel->getMember($id),
                'total' => $this->CreditModel->searchTotalMemberCreditTransactionBetween($id, $from, $to),
                'credit' => $this->CreditModel->searchMemberCreditTransactionBetween($id, $from, $to)
            );
            $this->load->view('treasurer/view_header');
            $this->load->view('treasurer/view_member_contribution_statements', $data);
            $this->load->view('treasurer/view_footer');
        }
    }

    public function group_contribution_statements() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('from', 'From date', 'required|callback_validate_date_from');
        $this->form_validation->set_rules('to', 'To date', 'required|callback_validate_date_to');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'total' => $this->CreditModel->getTotalAllCreditTransaction(),
                'credit' => $this->CreditModel->getGroupCreditTransaction()
            );
            $this->load->view('treasurer/view_header');
            $this->load->view('treasurer/view_group_contribution_statements', $data);
            $this->load->view('treasurer/view_footer');
        } else {
            $from = $this->input->post('from');
            $to = $this->input->post('to');
            $data = array(
                'total' => $this->CreditModel->searchTotalGroupCreditTransactionBetween($from, $to),
                'credit' => $this->CreditModel->searchGroupCreditTransactionBetween( $from, $to)
            );
            $this->load->view('treasurer/view_header');
            $this->load->view('treasurer/view_group_contribution_statements', $data);
            $this->load->view('treasurer/view_footer');
        }
    }

    public function contribute_check($id) {

        $res = $this->DebitModel->getDebitRow($id);
        $amount_being_deposited = $this->input->post('amount');
        $amount_in_account = $res->debit_paid_amount;
        $amount_expected_to_be_deposited = $res->debit_expected_amount;
        $amount_due = $amount_expected_to_be_deposited - $amount_in_account;
        $c = $amount_due - $amount_being_deposited;
        if (!($c < 0)) {
            //returns c is greator than 0r equal 0
            return TRUE;
        } else {
            $this->form_validation->set_message('contribute_check', 'The amount you have entered is larger that expected amount');
            return false;
        }
    }

    public function deposit($conId) {
        $id = $this->input->post('id');
        $this->load->model('AccountModel');

        if (isset($id)) {


            $this->load->library('form_validation');

            $this->form_validation->set_rules('amount', 'Amount', 'required|numerical|is_natural');
            $this->form_validation->set_rules('debit_id', 'Amount: ', 'required|callback_contribute_check');

            if ($this->form_validation->run() == FALSE) {
                $this->member_contribution($id);
            } else {
//                
                $debit_id = $this->input->post('debit_id');
                $amount_credited = $this->input->post('amount');
                $this->CreditModel->makeContribution($debit_id, $amount_credited, $id);
                $this->member($id);
            }
        } else {
            redirect('Treasurer/contributions', 'location');
        }
    }

    //--------------------------------------------------------------------------
    /*
      Loan calculator
     */
    public function loan_approval() {
        $this->load->model('LoanModel');
        $data = array(
            'issuer' => 0,
            'requests' => $this->LoanModel->getAllLoanRequest()
        );
        $this->load->view('treasurer/view_header');
        $this->load->view('treasurer/view_loan_approval', $data);
        $this->load->view('treasurer/view_footer');
    }

    public function loan_calculator() {
        $this->load->view('treasurer/view_header');
        $this->load->view('treasurer/view_loan_calculator');
        $this->load->view('treasurer/view_footer');
    }

    public function loan_issue() {
        $this->load->model('LoanModel');
        $data = array(
            'issuer' => 0,
            'requests' => $this->LoanModel->getAllLoanRequest()
        );
        $this->load->view('treasurer/view_header');
        $this->load->view('treasurer/view_loan_issue', $data);
        $this->load->view('treasurer/view_footer');
    }

    public function loan_issued() {
        $this->load->model('LoanModel');
        $data = array(
            'issuer' => 0,
            'requests' => $this->LoanModel->getAllLoanRequest()
        );
        $this->load->view('treasurer/view_header');
        $this->load->view('treasurer/view_loan_issued', $data);
        $this->load->view('treasurer/view_footer');
    }

    public function loan_rejected() {
        $this->load->model('LoanModel');
        $data = array(
            'issuer' => 0,
            'requests' => $this->LoanModel->getAllLoanRequest()
        );
        $this->load->view('treasurer/view_header');
        $this->load->view('treasurer/view_loan_rejected', $data);
        $this->load->view('treasurer/view_footer');
    }

    public function loan_requested() {
        $this->load->model('LoanModel');
        $data = array(
            'issuer' => 0,
            'requests' => $this->LoanModel->getAllLoanRequest()
        );
        $this->load->view('treasurer/view_header');
        $this->load->view('treasurer/view_loan_requested', $data);
        $this->load->view('treasurer/view_footer');
    }

    public function allLoansView() {
        $this->load->model('LoanModel');
        $data = array(
            'total' => $this->LoanModel->getTotalLoans(),
            'loans' => $this->LoanModel->getAllLoans()
        );
        $this->load->view('treasurer/view_header');
        $this->load->view('treasurer/view_loan_members', $data);
        $this->load->view('treasurer/view_footer');
    }

    public function loan_view() {
        $this->load->model('LoanModel');
        $data = array(
            'issuer' => 0,
            'requests' => $this->LoanModel->getAllLoanRequest()
        );
        $this->loan($data);
    }

    public function loan($data) {
        $this->load->view('treasurer/view_header');
        $this->load->view('treasurer/view_loan', $data);
        $this->load->view('treasurer/view_footer');
    }

    public function processLoanRequestAccept($id) {
        $this->load->model('LoanModel');
        $data = array(
            'status' => 1
        );
        $this->LoanModel->acceptLoanRequest($id, $data);
        $this->loan_approval();
    }

    public function processLoanRequestReject($id) {
        $this->load->model('LoanModel');
        $data = array(
            'status' => 3
        );
        $this->LoanModel->rejectLoanRequest($id, $data);
        $this->loan_view();
    }

    public function issueRequestedLoan($id) {

        $this->load->model('LoanModel');
        $session_data = $this->session->userdata('logged_in');
        $data = array(
            'status' => 2,
            'member_issuer_id' => $session_data['member_id']
        );

        $this->LoanModel->issueRequestedLoan($id, $data);
        $this->loan_issued();
    }

    public function payLoan_view() {
        $this->load->model('LoanModel');
        $this->load->helper("url");
        $this->load->library("pagination");

        $config = array();
        $config["base_url"] = base_url("index.php/Treasurer/payLoan_view");
        $config["total_rows"] = $this->LoanModel->getAllUnpaidMemberLoansCount();
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //$offset = $page == 0 ? 0 : ($page - 1) * $config["per_page"];

        $data["results"] = $this->LoanModel->getAllUnpaidMemberLoans($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();


        $this->load->view('treasurer/view_header');
        $this->load->view('treasurer/view_loan_pay', $data);
        $this->load->view('treasurer/view_footer');
    }

    public function payFor($id) {
        $this->load->model('LoanModel');
        $data = array(
            'result' => $this->LoanModel->getAMemberLoan($id)
        );
        $this->load->view('treasurer/view_header');
        $this->load->view('treasurer/view_loan_pay_for', $data);
        $this->load->view('treasurer/view_footer');
    }

    public function loanPay() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('loan_id', 'Loan Id', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required|xss_clean|numerical|is_natural');
        $this->form_validation->set_rules('loan_member', '', 'required|xss_clean');

        $id = $this->input->post('loan_id');

        if ($this->form_validation->run() === false) {
            $this->payFor($id);
        } else {
            $member = $this->input->post('loan_member');
            $amount = $this->input->post('amount');
            $this->load->model('LoanModel');
            $loan = $this->LoanModel->getSpecificMemberLoan($id);
            $dbAmount = $loan->loan_amount;
            $dbAmount -= $amount;
            if ($dbAmount == 0) {
                $data = array(
                    'loan_amount' => $dbAmount,
                    'loan_status' => '5'
                );
                $this->LoanModel->payLoan($data, $member, $id);
                $this->loanMember($member);
            } elseif ($dbAmount < -1) {
                $this->form_validation->set_message('amount', 'The amount you have entered is incorrect');
                $this->payFor($id);
            } else {
                $data = array(
                    'loan_amount' => $dbAmount
                );
                $this->LoanModel->payLoan($data, $member, $id);
                $this->loanMember($member);
            }
        }
    }

    public function loanMember($member_id) {
        $this->load->model('LoanModel');
        $data = array(
            'result' => $this->LoanModel->getLoan($member_id)
        );

        $this->load->view('treasurer/view_header');
        $this->load->view('treasurer/view_loan_member', $data);
        $this->load->view('treasurer/view_footer');
    }

    public function validate_date_from($val) {
        //date being passed
        $parts = explode("/", $this->input->post('from'));
        if (count($parts) < 3) {
            $this->form_validation->set_message('validate_date_from', 'Please insert a valid date ');
            return FALSE;
        }
        //passed date in parts
        $year = $parts[0];
        $month = $parts[1];
        $day = $parts[2];
        //todays date
       
        if (!checkdate($month, $day, $year)) {
            $this->form_validation->set_message('validate_date_from', 'Please insert a valid date ');
            return FALSE;
        }
    }

    public function validate_date_to($val) {
        //date being passed
        $this->validate_date_from($this->input->post('from'));
        $parts = explode("/", $this->input->post('to'));
        if (count($parts) < 3) {
            $this->form_validation->set_message('validate_date_to', 'Please insert a valid date ');
            return FALSE;
        }
        
        $year = $parts[0];
        $month = $parts[1];
        $day = $parts[2];

        if (!checkdate($month, $day, $year)) {
            $this->form_validation->set_message('validate_date_to', 'Please insert a valid date ');
            return FALSE;
        }
        
        $cfrom = new DateTime($this->input->post('from'));
        $cTo = new DateTime($this->input->post('to'));
        if ($cfrom <= $cTo) {
            return TRUE;
        } else {
            $this->form_validation->set_message('validate_date_to', 'From date must be greator than or equal to To\'s date');
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

    //--------------------------------------------------------------------------
}
