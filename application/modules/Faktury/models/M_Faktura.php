<?php

class M_Faktura extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    function get_active_faktury(){
        $query = $this->db->get('Faktury');
        return $query -> result();
    }

    function get_faktury(){
        $query=$this->db->get('faktury');
        return $query->result();
    }

    function get_fakturys($id){
        $query = $this->db->get_where('faktury',array('idFaktury' => $id) );
        return $query->result();
    }

    function insert_faktury($data){
        $this->db->insert('faktury', $data);
    }

    function post_faktury(){
        $this->db->insert('faktury', $this->input->post());
    }

    function delete_faktury($id){
        $this->db->where('idFaktury', $id);
        $this->db->delete('faktury');
    }

    function detail_faktury($id){
        $this->db->where('idFaktury', $id);
    }

    function update_faktury($id,$data){
        $this->db->where('idFaktury', $id);
        $this->db->update('faktury',$data);
    }
}