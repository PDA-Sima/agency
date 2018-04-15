<?php

class M_Faktura extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    function get_faktury(){
        $query=$this->db->get('faktury');
        return $query->result();
    }
}