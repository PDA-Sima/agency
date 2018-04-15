<?php

class Kurzy extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("M_Kurzy");
        $this->load->module('template');
    }

    function display_kurzy(){
        $data['page_header'] = "Kurzy";
        $data['description'] = "(správa kurzov)";
        $data['content_view'] ='Kurzy/kurzy_display_v';
        $data['kurzy_table']= $this->create_kurzy_table();
        $this->template->call_admin_template($data);
    }
    function create_kurzy_table(){
        $kurzy = $this->M_Kurzy->get_kurzy();
        $kurzy_table = "";

        if(count($kurzy)>0){
            $counter =1;
            foreach ($kurzy as $key => $value){
              $meno =$this->create_lektori_tabulka($value->idLektora);
              $kurzy_table .= "<tr>";
              $kurzy_table .= "<td>{$counter}</td>";
              $kurzy_table .= "<td>{$value->Nazov}</td>";
              $kurzy_table .= "<td>{$value->Popis}</td>";
              $kurzy_table .= "<td>{$meno}</td>";
              $kurzy_table .= "<td>{$value->Kategoria}</td>";
              $kurzy_table .= "<td>{$value->MiestoKonania}</td>";
              $kurzy_table .= "<td>".date("d-m-Y",strtotime($value->Zaciatok))."</td>";
              $kurzy_table .= "<td>".date("d-m-Y",strtotime($value->Koniec))."</td>";
              $kurzy_table .= "<td>{$value->UrcenePreFirmy}</td>";
              $kurzy_table .= "<td>
                <a href='".base_url()."Kurzy/view_kurz/{$value->idKurzu}'>Detail</a>
                |
                <a href='".base_url()."Kurzy/edit_kurz/{$value->idKurzu}'>Upraviť</a>
                |
                <a href='".base_url()."Kurzy/delete_kurz/{$value->idKurzu}'>Zmazať</a>
            </td>";
            $kurzy_table .= "</tr>";
          }
        }
        return $kurzy_table;
    }

    function addKurz(){
        $data['page_header'] = "Pridať kurz";
        $data['description'] = "(vloženie nového kurzu)";
        $data['content_view'] ='Kurzy/add_kurz_v';
        $data['lektors'] = $this->create_lectors_select();
        $this->template->call_admin_template($data);
    }

    function post_kurz(){
        $this->M_Kurzy->post_kurz();
        redirect(base_url() . 'Admin/Kurzy');
    }

    function create_lectors_select(){
        $this->load->model('Lektori/M_Lektori');
        $lektors = $this->M_Lektori->get_active_lectors();
        $options = "";
        if(count($lektors)){
            foreach ($lektors as $key => $value){
                $options .= "<option value = '{$value->idLektora}'>{$value->Lektor}</option>";
            }
        }
        return $options;
    }

    function create_lektori_tabulka($id){
        $this->load->model('Lektori/M_Lektori');
        $lektori = $this->M_Lektori->get_lektors($id);
        $meno = $lektori['0']->Lektor;
        return $meno;
    }

}
