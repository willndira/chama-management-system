<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Test extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index() {
        $this->load->view('test/test');
        
    }
    public function user_data_submit() {
        $data = array(
            'username'=>  $this->input->post('name'),
            'password'=>  $this->input->post('password')
        );
        $data_pass = array(
            'username'=>  $this->input->post('name'),
            'password'=>  $this->input->post('password')
        );
        
        $this->load->model('TestModel',"",TRUE);
        $this->TestModel->enter($data_pass);
        echo json_encode($data_pass);
    }
    
    public function login(){
        $this->load->view('test/login');
    }
    
    public function register(){
        $this->load->view('test/view_test_header');
        $this->load->view('test/register');
        $this->load->view('test/view_test_footer');
    }

}
