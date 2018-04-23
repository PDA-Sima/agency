<?php

class M_Kategorie extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    function get_active_kategorie(){
        $query = $this->db->get('Kategorie');
        return $query -> result();
    }

    function get_kategorie() {
        $query = $this->db->get('kategorie');
        return $query -> result();
    }

    function get_kategor($id){
        $query = $this->db->get_where('kategorie',array('idKategorie' => $id) );
        return $query->result();
    }

    function insert_kategorie($data){
        $this->db->insert('kategorie', $data);
    }

    function post_kategorie(){
        $this->db->insert('kategorie', $this->input->post());
    }

    function delete_kategorie($id){
        $this->db->where('idKategorie', $id);
        $this->db->delete('kategorie');
    }

    function detail_kategorie($id){
        $this->db->where('idKategorie', $id);
    }

    function update_kategorie($id,$data){
        $this->db->where('idKategorie', $id);
        $this->db->update('kategorie',$data);
    }



}
