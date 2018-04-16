<?php

class M_Ucastnici extends CI_Model{

    public function __construct(){
        parent::__construct();
    }
    function get_active_ucastnici(){
        $query = $this->db->get('Lektori');
        return $query -> result();
    }

    function get_ucastnici(){
        $query=$this->db->get('ucastnici');
        return $query->result();
    }
    function get_ucastnic($id){
        $query = $this->db->get_where('ucastnici',array('idUcastnika' => $id) );
        return $query->result();
    }

    function insert_ucstnici($data){
        $this->db->insert('ucastnici', $data);
    }

    function post_ucastnici(){
        $this->db->insert('ucastnici', $this->input->post());
    }

    function delete_ucastnici($id){
        $this->db->where('idUcastnika', $id);
        $this->db->delete('ucastnici');
    }

    function detail_ucastnici($id){
        $this->db->where('idUcastnika', $id);
    }

    function update_ucastnici($id,$data){
        $this->db->where('idUcastnika', $id);
        $this->db->update('ucastnici',$data);
    }
}