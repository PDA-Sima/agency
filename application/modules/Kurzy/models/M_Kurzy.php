<?php

class M_Kurzy extends CI_Model {
    public function __construct(){
        parent::__construct();
    }

    function get_active_kurzy(){
        $query = $this->db->get('Kurzy');
        return $query -> result();
    }

    function get_kurzy(){
        $query=$this->db->get('kurzy');
        return $query->result();
    }

    function get_kurzs($id){
        $query = $this->db->get_where('kurzy',array('idKurzu' => $id) );
        return $query->result();
    }

    function insert_kurz($data){
        $this->db->insert('kurzy', $data);
    }

    function post_kurz(){
        $this->db->insert('kurzy', $this->input->post());
    }

    function delete_kurzy($id){
        $this->db->where('idKurzu', $id);
        $this->db->delete('kurzy');
    }

    function detail_kurzy($id){
        $this->db->where('idKurzu', $id);
    }

    function update_kurzy($id,$data){
        $this->db->where('idKurzu', $id);
        $this->db->update('kurzy',$data);
    }

    function get_data_graf2(){
        $query =$this->db->query("SELECT lektori.Lektor AS Lektori,COUNT(kurzy.Nazov) AS Pocet_kurzov FROM kurzy INNER JOIN lektori ON kurzy.idLektora=lektori.idLektora GROUP BY lektori.Lektor");
        return $query->result();
    }
}
