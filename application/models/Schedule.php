<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Schedule extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insertSchedule($data) {

        $this->db->insert('schedule', $data);
    }

    public function insertDebit($data) {
        $this->db->insert('schedule', $data);
        return $this->db->insert_id();
    }

    public function getAllSchedule() {
        $this->db->order_by('schedule_date', 'DESC');
        $query = $this->db->get('schedule');
        return $query->result();
    }

    public function deleteSchedule($id) {
        $this->db->where('schedule_id', $id);
        $this->db->delete('schedule');
        $this->db->where('debit_schedule_id', $id);
        $this->db->delete('debit');
    }

}
