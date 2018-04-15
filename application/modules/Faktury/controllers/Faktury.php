<?php

class Faktury extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("M_Faktura");
    }

    function display_faktury(){
        $data['page_header'] = "Faktúry";
        $data['description'] = "(databáza faktúr)";
        $data['content_view'] ='Faktury/display_faktury_v';
        $data['faktury_table']= $this->create_faktury_table();
        $this->template->call_admin_template($data);
    }

    function addFaktura(){
        $data['faktury'] = $this->create_faktury_select();
        $data['page_header'] = "Pridať faktúru";
        $data['description'] = "(vloženie novej faktúry)";
        $data['content_view'] ='Faktury/add_faktura_v';
        $this->template->call_admin_template($data);
    }

    function create_faktury_table(){
        $faktury = $this->M_Faktura->get_faktury();
        $faktury_table = "";

        foreach ($faktury as $key => $value){
            $faktury_table .= "<tr>";
            $faktury_table .= "<td>{$value->idFaktury}</td>";
            $faktury_table .= "<td>{$value->NazovFirmy}</td>";
            $faktury_table .= "<td>{$value->AdresaFirmy}</td>";
            $faktury_table .= "<td>{$value->IdUcastnika}</td>";
            $faktury_table .= "<td>{$value->IdKurzu}</td>";
            $faktury_table .= "<td>{$value->PocetHodin}</td>";
            $faktury_table .= "<td>{$value->CenaHodiny}</td>";
            $faktury_table .= "<td>{$value->CelkovaSuma}</td>";
            $faktury_table .= "<td>{$value->Zaplatena}</td>";
            $faktury_table .= "<td>
                <a href='".base_url()."Faktury/edit_faktura/{$value->idFaktury}'>Upraviť</a>
                |
                <a href='".base_url()."Faktury/delete_faktura/{$value->idFaktury}'>Zmazať</a>
            </td>";
            $faktury_table .= "</tr>";
        }
        return $faktury_table;
    }
}