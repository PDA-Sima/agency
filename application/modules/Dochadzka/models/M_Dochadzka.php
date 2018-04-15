<?php

class M_Dochadzka extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    function get_dochadzka(){
        $query=$this->db->get('hodinykurzu');
        return $query->result();
    }
}