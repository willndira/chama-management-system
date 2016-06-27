<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PasswordModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insertRequest($data) {
        $this->db->insert('reset_password', $data);
    }

    public function checkPasswordMatch($nationalId, $pass1) {
        $pass2 = sha1($pass1);
        $this->db->where('nationalId ', $nationalId);
        $this->db->where('password ', $pass2);
        $query = $this->db->get('member');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function changeOwnPassword($nationalId, $password) {

        $this->db->where('nationalId', $nationalId);
        $data = array('password'=> $password);
        $this->db->update('member', $data);
        
    }

    public function checkNationalId($nationalId) {
        $this->db->where('nationalId ', $nationalId);
        $query = $this->db->get('member');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getUnchangedPassword() {
        $this->db->where('status ', 0);
        $this->db->join('member', 'reset_password.nationalId = member.nationalId');
        $query = $this->db->get('reset_password');
        return $query->result();
    }

    public function changePassword($data) {
        $nationalId = $this->input->post('nationalId');
        $this->db->where('nationalId', $nationalId);
        $this->db->update('member', $data);
        $this->changeStatus($nationalId);
    }

    public function changeStatus($nationalId) {
        $this->db->where('nationalId', $nationalId);
        $this->db->update('reset_password', array('status' => TRUE));
    }

}
