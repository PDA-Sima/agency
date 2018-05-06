<?php

class M_Dochadzka extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    function get_active_dochadzka(){
        $query = $this->db->get('HodinyKurzu');
        return $query -> result();
    }

    function get_dochadzka(){
        $query=$this->db->get('hodinykurzu');
        return $query->result();
    }

    function get_dochadzkas($id){
        $query = $this->db->get_where('hodinykurzu',array('idHodiny' => $id) );
        return $query->result();
    }

    function insert_dochadzka($data){
        $this->db->insert('hodinykurzu', $data);
    }

    function post_dochadzka(){
        $this->db->insert('hodinykurzu', $this->input->post());
    }

    function delete_dochadzka($id){
        $this->db->where('idHodiny', $id);
        $this->db->delete('hodinykurzu');
    }

    function detail_dochadzka($id){
        $this->db->where('idHodiny', $id);
    }

    function update_dochadzka($id,$data){
        $this->db->where('idHodiny', $id);
        $this->db->update('hodinykurzu',$data);
    }

    function get_data_graf3(){
        $query =$this->db->query("SELECT hodinykurzu.Datum, COUNT(ucastnici.Meno) AS Pocet_ziakov FROM `hodinykurzu` INNER JOIN ucastnici ON ucastnici.idUcastnika=hodinykurzu.idUcastnika GROUP BY Datum");
        return $query->result();
    }

    function get_data_graf4(){
        $query =$this->db->query("SELECT ucastnici.Meno AS Meno, COUNT(DISTINCT(kurzy.Nazov)) AS Pocet FROM hodinykurzu INNER JOIN ucastnici ON ucastnici.idUcastnika=hodinykurzu.idUcastnika INNER JOIN kurzy
                                  ON kurzy.idKurzu=hodinykurzu.idKurzu GROUP BY ucastnici.Meno ORDER BY Pocet DESC LIMIT 4");
        return $query->result();
    }
}