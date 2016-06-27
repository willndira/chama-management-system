<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Site extends CI_Controller {

    public function construct() {
        parent::__construct();
        $this->load->model('MemberModel', '', TRUE);
    }

//----------------------------------------------------------------------------
    function index() {
        $this->load->helper(array('form'));
        if ($this->session->userdata('logged_in')) {
            redirect('member', 'refresh');
        } else {
            //If no session, redirect to login page
            $this->login_view();
        }
    }

    public function verifyLogin() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

        if ($this->form_validation->run() == FALSE) {
            $this->login_view();
        } else {
            redirect('member', 'refresh');
        }
    }

    public function check_database($password) {
        $this->load->model('MemberModel', '', TRUE);
        $username = $this->input->post('username');
        $result = $this->MemberModel->login($username, $password);

        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'member_id' => $row->member_id,
                    'nationalId' => $row->nationalId,
                    'firstname' => $row->firstname,
                    'middlename' => $row->middlename,
                    'surname' => $row->surname,
                    'gender' => $row->gender,
                    'dob' => $row->dob,
                    'nationalId' => $row->nationalId,
                    'type' => $row->type
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid Username or password');
            return FALSE;
        }
    }

    public function login_view() {
        $this->load->view('view_header');
        $this->load->view('view_login');
        $this->load->view('view_footer');
    }

//--------------------------------------------------------------------------


    public function home() {
        
    }

    public function reset_account() {
        $this->load->view('view_header');
        $this->load->view('reset_account');
        $this->load->view('view_footer');
    }

    public function changePassword() {
        $this->load->model('PasswordModel');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nationalId', 'National Id: ', 'trim|required|callback_checkNationalId');
        if ($this->form_validation->run() == TRUE) {
            $id = $this->input->post('nationalId');
            $data = array(
                'nationalId' => $id
            );
            $this->PasswordModel->insertRequest($data);
            $this->login_view();
        } else {
            $this->reset_account();
        }
    }

    public function checkNationalId($nationalId) {
        $this->load->model('PasswordModel');
        //$result = $this->PasswordModel->checkNationalId($nationalId);
        $result = $this->PasswordModel->checkNationalId(29285559);
        if ($result) {
            return TRUE;
        } else {
            $this->load->library('form_validation');
            $this->form_validation->set_message('checkNationalId','Sorry user does not exists');
            return FALSE;
        }
    }

//----------------------------------------------------------------------------
    public function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        session_destroy();
        redirect('Site/login_view');
    }

//---------------------------------------------------------------------------
}
