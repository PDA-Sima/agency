<?php

class Dochadzka extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("M_Dochadzka");
    }

    function display_dochadzka(){
        $data['page_header'] = "Dochádzka";
        $data['description'] = "(hodiny kurzov)";
        $data['content_view'] ='Dochadzka/display_dochadzka_v';
        $data['dochadzka_table']= $this->create_dochadzka_table();
        $this->template->call_admin_template($data);
    }

    function addDochadzka(){
        $data['dochadzka'] = $this->create_dochadzka_select();
        $data['page_header'] = "Pridať dochádzku na hodine";
        $data['description'] = "(vloženie novej dochádzky)";
        $data['content_view'] ='Dochadzka/add_dochadzka_v';
        $this->template->call_admin_template($data);
    }

    function create_dochadzka_table(){
        $dochadzka = $this->M_Dochadzka->get_dochadzka();
        $dochadzka_table = "";

        foreach ($dochadzka as $key => $value){
            $dochadzka_table .= "<tr>";
            $dochadzka_table .= "<td>{$value->id}</td>";
            $dochadzka_table .= "<td>{$value->idKurzu}</td>";
            $dochadzka_table .= "<td>{$value->idUcastnika}</td>";
            $dochadzka_table .= "<td>".date("d-m-Y",strtotime($value->Datum))."</td>";
            $dochadzka_table .= "<td>{$value->Zaciatok}</td>";
            $dochadzka_table .= "<td>{$value->Koniec}</td>";
            $dochadzka_table .= "<td>
                <a href='".base_url()."Dochadzka/edit_dochadzka/{$value->id}'>Upraviť</a>
                |
                <a href='".base_url()."Dochadzka/delete_dochadzka/{$value->id}'>Zmazať</a>
            </td>";
            $dochadzka_table .= "</tr>";
        }
        return $dochadzka_table;
    }
}