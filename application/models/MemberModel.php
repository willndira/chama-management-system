<?php

class MemberModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('DebitModel');
        $this->load->model('TransactionModel');
        $this->load->model('AccountModel');
    }

    public function addMember() {
        $data = array(
            'firstname' => $this->input->post('firstName'),
            'middlename' => $this->input->post('middleName'),
            'surname' => $this->input->post('lastName'),
            'gender' => $this->input->post('gender'),
            'dob' => $this->input->post('dob'),
            'type' => $this->input->post('type'),
            'nationalId' => $this->input->post('nationalId'),
            'password' => sha1($this->input->post('password'))
        );
        $amount = $this->input->post('amount');
        
        $this->db->insert('member', $data);
        $id = $this->db->insert_id();
        
        
        
        $session_data = $this->session->userdata('logged_in');
        $this->TransactionModel->addMemberTransaction($session_data['member_id'],$id);
        $this->DebitModel->registrationFee($amount ,$id ,$session_data['member_id']);
        $this->AccountModel->createAccount($id);
        
    }

    public function getAllMembers() {
        $query = $this->db->get('Member');
        return $query->result();
    }

    public function searchMember($value){
        $this->db->select("*");
        $this->db->from('member');
        $this->db->like('firstname',$value);
        $this->db->or_like('middlename',$value);
        $this->db->or_like('surname',$value);
        $this->db->or_like('nationalId',$value);
        $query =$this->db->get();
        return $query->result();
    }

    public function getMember($id) {
        $query = $this->db->get_where('Member', array('member_id' => $id));
        return $query->row();
    }

    public function editMember($id, $data) {
        $this->db->where('member_id', $id);
        $this->db->update('member', $data);
    }

    //--------------------------------------------------------------------------

    function login($username, $password) {
        $this->db->select('member_id, firstname,middlename,surname,gender,dob,nationalId,type');
        $this->db->from('member');
        $this->db->where('nationalId', $username);

        $this->db->where('password', sha1($password));
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {

            return $query->result();
        } else {
            return false;
        }
    }

    //--------------------------------------------------------------------------
// Read data from database to show data in admin page
    public function read_user_information($sess_array) {

        $condition = "user_name =" . "'" . $sess_array['username'] . "'";
        $this->db->select('*');
        $this->db->from('member');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    //--------------------------------------------------------------------------
 

    //--------------------------------------------------------------------------
}
