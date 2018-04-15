<?php

class M_Lektori extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    function get_active_lectors(){
        $query = $this->db->get('Lektori');
        return $query -> result();
    }

    function get_lektori() {
        $query = $this->db->get('lektori');
        return $query -> result();
    }

    function get_lektors($id){
        $query = $this->db->get_where('lektori',array('idLektora' => $id) );
        return $query->result();
    }

    function insert_lektor($data){
        $this->db->insert('lektori', $data);
    }

    function post_lektor(){
        $this->db->insert('lektori', $this->input->post());
    }

    function delete_lektor($id){
        $this->db->where('idLektora', $id);
        $this->db->delete('lektori');
    }

    function detail_lektor($id){
        $this->db->where('idLektora', $id);
    }

    function update_lektor($id,$data){
        $this->db->where('idLektora', $id);
        $this->db->update('lektori',$data);
    }



}
