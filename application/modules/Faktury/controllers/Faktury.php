<?php

class Faktury extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("M_Faktura");
        $this->load->module('template');
    }

    function display_faktury(){
        $data['page_header'] = "Faktúry";
        $data['content_view'] ='Faktury/display_faktury_v';
        $data['faktury_table']= $this->create_faktury_table();
        $this->template->call_admin_template($data);
    }

    function create_faktury_table(){
        $faktury_table = "";
        $this->load->library('pagination');
        $faktury = $this->M_Faktura->get_faktury();

        $config['base_url'] = base_url() . "/Admin/Faktury";
        $config['total_rows'] = count($faktury);
        $config['per_page'] = 6;

        $this->pagination->initialize($config);
        $faktury = $this->db->get('faktury', $config['per_page'], $this->uri->segment(3));

        if(count($faktury)>0){
            $counter = $this->uri->segment(3);
            foreach ($faktury->result() as $key => $value) {
                $ucastnik =$this->create_ucastnici_tabulka($value->idUcastnika);
                $kurz=$this->zobraz_kurz($value->idKurzu);
                $counter = $counter + 1;
                $faktury_table .= "<tr>";
                $faktury_table .= "<td>{$counter}</td>";
                $faktury_table .= "<td>{$value->Firma}</td>";
                $faktury_table .= "<td>{$value->ICO}</td>";
                $faktury_table .= "<td>{$value->DIC}</td>";
                $faktury_table .= "<td>{$value->IC_DPH}</td>";
                $faktury_table .= "<td>{$value->AdresaFirmy}</td>";
                $faktury_table .= "<td>{$ucastnik}</td>";
                $faktury_table .= "<td>{$kurz}</td>";
                $faktury_table .= "<td>{$value->PocetHodin}</td>";
                $faktury_table .= "<td>{$value->CenaHodiny}</td>";
                $faktury_table .= "<td>{$value->CelkovaSuma}</td>";
                $faktury_table .= "<td>{$value->Zaplatena}</td>";
                $faktury_table .= "<td>
                 <a href='" . base_url() . "Faktury/detail_faktury/{$value->idFaktury}'>
                    <button type = \"button\" class = \"btn btn-default btn-xs\">
                        <span class = \"glyphicon glyphicon-search\"></span>
                    </button>
                 </a>
                  
                 <a href='" . base_url() . "Faktury/edit_faktury/{$value->idFaktury}'>
                    <button type = \"button\" class = \"btn btn-info btn-xs\">
                        <span class = \"glyphicon glyphicon-pencil\"></span>
                    </button>
                 </a>
                 
                 <a href='" . base_url() . "Faktury/delete_faktury/{$value->idFaktury}'>
                    <button type = \"button\" class = \"btn btn-danger btn-xs\">
                        <span class = \"glyphicon glyphicon-remove\"></span>
                    </button>
                 </a>
            </td>";
            $faktury_table .= "</tr>";
            }
        }
        return $faktury_table;
    }

    function addFaktura(){
        $data['page_header'] = "Pridať faktúru";
        $data['content_view'] ='Faktury/add_faktura_v';
        $data['ucastnicis'] = $this->create_ucastnici_select();
        $data['kurzys'] = $this->create_kurzy_select();
        $this->template->call_admin_template($data);
    }

    function post_faktury(){
        $this->M_Faktura->post_faktury();
        redirect(base_url() . 'Admin/Faktury');
    }

    function create_ucastnici_select(){
        $this->load->model('Ucastnici/M_Ucastnici');
        $ucastnicis = $this->M_Ucastnici->get_active_ucastnici();
        $options = "";
        if(count($ucastnicis)){
            foreach ($ucastnicis as $key => $value){
                $options .= "<option value = '{$value->idUcastnika}'>{$value->Meno}</option>";
            }
        }
        return $options;
    }

    function create_ucastnici_tabulka($id){
        $this->load->model('Ucastnici/M_Ucastnici');
        $ucastnici = $this->M_Ucastnici->get_ucastnicis($id);
        $ucastnik = $ucastnici['0']->Meno;
        return $ucastnik;
    }

    function create_kurzy_select(){
        $this->load->model('Kurzy/M_Kurzy');
        $kurzys = $this->M_Kurzy->get_active_kurzy();
        $options = "";
        if(count($kurzys)){
            foreach ($kurzys as $key => $value){
                $options .= "<option value = '{$value->idKurzu}'>{$value->Nazov}</option>";
            }
        }
        return $options;
    }

    function zobraz_kurz($id)
    {
        $this->load->model('Kurzy/M_Kurzy');
        $kurzy = $this->M_Kurzy->get_kurzs($id);
        $kurz = $kurzy['0']->Nazov;
        return $kurz;
    }

    function detail_faktury() {
        $id = $this->uri->segment(3);
        $faktury = $this->M_Faktura->get_fakturys($id);
        foreach ($faktury as $key => $value) {
            $data['page_header'] = "Detail hodiny";
            $data['content_view'] = 'Faktury/detail_faktury_v';
            $data['Firma'] = $faktury['0']->Firma;
            $data['ICO'] = $faktury['0']->ICO;
            $data['DIC'] = $faktury['0']->DIC;
            $data['IC_DPH'] = $faktury['0']->IC_DPH;
            $data['AdresaFirmy'] = $faktury['0']->AdresaFirmy;
            $data['ucastnik'] = $this->create_ucastnici_tabulka($value->idUcastnika);
            $data['kurz'] = $this->zobraz_kurz($value->idKurzu);
            $data['PocetHodin'] = $faktury['0']->PocetHodin;
            $data['CenaHodiny'] = $faktury['0']->CenaHodiny;
            $data['CelkovaSuma'] = $faktury['0']->CelkovaSuma;
            $data['Zaplatena'] = $faktury['0']->Zaplatena;
            $data['id'] = $id;
            $this->template->call_admin_template($data);
        }
    }

    function edit_faktury()
    {
        $id = $this->uri->segment(3);
        $faktury = $this->M_Faktura->get_fakturys($id);
        $data['ucastnicis'] = $this->create_ucastnici_select();
        $data['kurzys'] = $this->create_kurzy_select();
        $data['page_header'] = "Upraviť faktúru";
        $data['content_view'] = 'Faktury/edit_faktury_v';
        $data['Firma'] = $faktury['0']->Firma;
        $data['ICO'] = $faktury['0']->ICO;
        $data['DIC'] = $faktury['0']->DIC;
        $data['IC_DPH'] = $faktury['0']->IC_DPH;
        $data['AdresaFirmy'] = $faktury['0']->AdresaFirmy;
        $data['idUcastnika'] = $faktury['0']->idUcastnika;
        $data['idKurzu'] = $faktury['0']->idKurzu;
        $data['PocetHodin'] = $faktury['0']->PocetHodin;
        $data['CenaHodiny'] = $faktury['0']->CenaHodiny;
        $data['CelkovaSuma'] = $faktury['0']->CelkovaSuma;
        $data['Zaplatena'] = $faktury['0']->Zaplatena;
        $data['id'] = $id;
        $this->template->call_admin_template($data);
    }

    function post_edit_faktury()
    {
        $id = $this->input->post('ID');
        $data = array(
            'Firma' => $this->input->post('Firma'),
            'ICO' => $this->input->post('ICO'),
            'DIC' => $this->input->post('DIC'),
            'IC_DPH' => $this->input->post('IC_DPH'),
            'AdresaFirmy' => $this->input->post('AdresaFirmy'),
            'idUcastnika' => $this->input->post('idUcastnika'),
            'idKurzu' => $this->input->post('idKurzu'),
            'PocetHodin' => $this->input->post('PocetHodin'),
            'CenaHodiny' => $this->input->post('CenaHodiny'),
            'CelkovaSuma' => $this->input->post('CelkovaSuma'),
            'Zaplatena' => $this->input->post('Zaplatena'),

        );
        $this->M_Faktura->update_faktury($id, $data);
        redirect(base_url() . "Admin/Faktury");
    }

    function delete_faktury()
    {
        $id = $this->uri->segment(3);
        $faktury = $this->M_Faktura->get_fakturys($id);
        foreach ($faktury as $key => $value) {
            $data['page_header'] = "Vymazať faktúru";
            $data['content_view'] = 'Faktury/delete_faktury_v';
            $data['Firma'] = $faktury['0']->Firma;
            $data['ICO'] = $faktury['0']->ICO;
            $data['DIC'] = $faktury['0']->DIC;
            $data['IC_DPH'] = $faktury['0']->IC_DPH;
            $data['AdresaFirmy'] = $faktury['0']->AdresaFirmy;
            $data['ucastnik'] = $this->create_ucastnici_tabulka($value->idUcastnika);
            $data['kurz'] = $this->zobraz_kurz($value->idKurzu);
            $data['PocetHodin'] = $faktury['0']->PocetHodin;
            $data['CenaHodiny'] = $faktury['0']->CenaHodiny;
            $data['CelkovaSuma'] = $faktury['0']->CelkovaSuma;
            $data['Zaplatena'] = $faktury['0']->Zaplatena;
            $data['id'] = $id;
            $this->template->call_admin_template($data);
        }
    }

    function post_delete_faktury()
    {
        $id = $this->input->post('ID');
        $this->M_Faktura->delete_faktury($id);
        redirect(base_url() . "Admin/Faktury");
    }
}