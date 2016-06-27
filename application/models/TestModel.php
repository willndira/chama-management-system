<?php



class TestModel extends CI_Model{
    
    public function enter($data) {
        $this->db->insert('test',$data);
    }
}