<?php

class Ucastnici extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("M_Ucastnici");
        $this->load->module('template');
    }

    /*Zobrazenie ucastnikov*/
    function display_ucastnici(){
        $data['page_header'] = "Účastníci";
        $data['description'] = "(účastníci kurzov)";
        $data['content_view'] ='Ucastnici/ucastnici_display_v';
        $data['ucastnici_table']= $this->create_ucastnici_table();
        $this->template->call_admin_template($data);
    }

    function addUcastnik(){
        $data['ucastnici'] = $this->create_ucastnici_select();
        $data['page_header'] = "Pridať účastníka";
        $data['description'] = "(vloženie nového účastníka)";
        $data['content_view'] ='Ucastnici/add_ucastnik_v';
        $this->template->call_admin_template($data);
    }

    function create_ucastnici_table(){
        $ucastnici = $this->M_Ucastnici->get_ucastnici();
        $ucastnici_table = "";

        foreach ($ucastnici as $key => $value){
            $ucastnici_table .= "<tr>";
            $ucastnici_table .= "<td>{$value->idUcastnika}</td>";
            $ucastnici_table .= "<td>{$value->Meno}</td>";
            $ucastnici_table .= "<td>{$value->Priezvisko}</td>";
            $ucastnici_table .= "<td>{$value->Adresa}</td>";
            $ucastnici_table .= "<td>{$value->Email}</td>";
            $ucastnici_table .= "<td>{$value->Telefon}</td>";
            $ucastnici_table .= "<td>
                <a href='".base_url()."Ucastnici/detail_ucastnik/{$value->idUcastnika}'>Detail</a>
                |
                <a href='".base_url()."Ucastnici/edit_ucastnik/{$value->idUcastnika}'>Upraviť</a>
                |
                <a href='".base_url()."Ucastnici/delete_ucastnik/{$value->idUcastnika}'>Zmazať</a>
            </td>";
            $ucastnici_table .= "</tr>";
        }
        return $ucastnici_table;
    }
}