<?php



class AjaxModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_data() {
        $type = $this->input->post('type');
        if ($type != 1) {
            return array();
        }
        return array(
            array(
                'name' => 'Abigail',
                'email' => 'ut.sem.Nulla@duinecurna.org',
                'registered_date' => '01/17/2014'
            ),
            array(
                'name' => 'Ralph',
                'email' => 'ultrices.posuere@Sed.org',
                'registered_date' => '10/08/2013'
            ),
        );
    }

}
