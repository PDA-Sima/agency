<?php

class M_Ucastnici extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    function get_ucastnici(){
        $query=$this->db->get('ucastnici');
        return $query->result();
    }
}