<?php

class M_Kurzy extends CI_Model {
    public function __construct(){
        parent::__construct();
    }

    function get_kurzy(){
        $query=$this->db->get('kurzy');
        return $query->result();
    }

    function insert_kurz($data){
        $this->db->insert('kurzy', $data);
    }

    function post_kurz(){
        $this->db->insert('kurzy', $this->input->post());
    }



}
