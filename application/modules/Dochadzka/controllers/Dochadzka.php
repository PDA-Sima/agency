<?php

class Dochadzka extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("M_Dochadzka");
        $this->load->module('template');
    }

    function display_dochadzka(){
        $data['page_header'] = "Dochádzka";
        $data['content_view'] ='Dochadzka/display_dochadzka_v';
        $data['dochadzka_table']= $this->create_dochadzka_table();
        $this->template->call_admin_template($data);
    }

    function create_dochadzka_table(){
        $dochadzka_table = "";
        $this->load->library('pagination');
        $hodinykurzu = $this->M_Dochadzka->get_dochadzka();

        $config['base_url'] = base_url() . "/Admin/Dochadzka";
        $config['total_rows'] = count($hodinykurzu);
        $config['per_page'] = 6;

        $this->pagination->initialize($config);
        $hodinykurzu = $this->db->get('hodinykurzu', $config['per_page'], $this->uri->segment(3));

        if(count($hodinykurzu)>0){
        $counter = $this->uri->segment(3);
        foreach ($hodinykurzu->result() as $key => $value) {
                $ucastnik =$this->create_ucastnici_tabulka($value->idUcastnika);
                $kurz=$this->zobraz_kurz($value->idKurzu);
                $counter = $counter + 1;
                $dochadzka_table .= "<tr>";
                $dochadzka_table .= "<td td class='ID'>{$counter}</td>";
                $dochadzka_table .= "<td td class='Ucastnik'>{$ucastnik}</td>";
                $dochadzka_table .= "<td td class='Kurz'>{$kurz}</td>";
                $dochadzka_table .= "<td td class='Datum'>" . date("d-m-Y", strtotime($value->Datum)) . "</td>";
                $dochadzka_table .= "<td td class='Zaciatok'>{$value->Zaciatok}</td>";
                $dochadzka_table .= "<td td class='Koniec'>{$value->Koniec}</td>";
                $dochadzka_table .= "<td>
                <a href='" . base_url() . "Dochadzka/detail_dochadzka/{$value->idHodiny}'>
                    <button type = \"button\" class = \"btn btn-default btn-xs btn-fill\">
                        <span class = \"glyphicon glyphicon-search\"></span>
                    </button>
                 </a>
                  
                 <a href='" . base_url() . "Dochadzka/edit_dochadzka/{$value->idHodiny}'>
                    <button type = \"button\" class = \"btn btn-info btn-xs btn-fill\">
                        <span class = \"glyphicon glyphicon-pencil\"></span>
                    </button>
                 </a>
                 
                 <a href='" . base_url() . "Dochadzka/delete_dochadzka/{$value->idHodiny}'>
                    <button type = \"button\" class = \"btn btn-danger btn-xs btn-fill\">
                        <span class = \"glyphicon glyphicon-remove\"></span>
                    </button>
                 </a>
            </td>";
                $dochadzka_table .= "</tr>";
            }
            return $dochadzka_table;
            }
        }

        function addDochadzka(){
            $data['page_header'] = "Pridať dochádzku";
            $data['content_view'] ='Dochadzka/add_dochadzka_v';
            $data['ucastnicis'] = $this->create_ucastnici_select();
            $data['kurzys'] = $this->create_kurzy_select();
            $this->template->call_admin_template($data);
        }

        function post_dochadzka(){
            $this->M_Dochadzka->post_dochadzka();
            redirect(base_url() . 'Admin/Dochadzka');
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

    function detail_dochadzka() {
        $id = $this->uri->segment(3);
        $hodinykurzu = $this->M_Dochadzka->get_dochadzkas($id);
        foreach ($hodinykurzu as $key => $value) {
            $data['page_header'] = "Detail hodiny";
            $data['content_view'] = 'Dochadzka/detail_dochadzka_v';
            $data['ucastnik'] = $this->create_ucastnici_tabulka($value->idUcastnika);
            $data['kurz'] = $this->zobraz_kurz($value->idKurzu);
            $data['Datum'] = $hodinykurzu['0']->Datum;
            $data['Zaciatok'] = $hodinykurzu['0']->Zaciatok;
            $data['Koniec'] = $hodinykurzu['0']->Koniec;
            $data['id'] = $id;
            $this->template->call_admin_template($data);
        }
    }

    function edit_dochadzka()
    {
        $id = $this->uri->segment(3);
        $hodinykurzu = $this->M_Dochadzka->get_dochadzkas($id);
        $data['ucastnicis'] = $this->create_ucastnici_select();
        $data['kurzys'] = $this->create_kurzy_select();
        $data['page_header'] = "Upraviť hodinu";
        $data['content_view'] = 'Dochadzka/edit_dochadzka_v';
        $data['idUcastnika'] = $hodinykurzu['0']->idUcastnika;
        $data['idKurzu'] = $hodinykurzu['0']->idKurzu;
        $data['Datum'] = $hodinykurzu['0']->Datum;
        $data['Zaciatok'] = $hodinykurzu['0']->Zaciatok;
        $data['Koniec'] = $hodinykurzu['0']->Koniec;
        $data['id'] = $id;
        $this->template->call_admin_template($data);
    }

    function post_edit_dochadzka()
    {
        $id = $this->input->post('ID');
        $data = array(
            'idUcastnika' => $this->input->post('idUcastnika'),
            'idKurzu' => $this->input->post('idKurzu'),
            'Datum' => $this->input->post('Datum'),
            'Zaciatok' => $this->input->post('Zaciatok'),
            'Koniec' => $this->input->post('Koniec'),
        );
        $this->M_Dochadzka->update_dochadzka($id, $data);
        redirect(base_url() . "Admin/Dochadzka");
    }

    function delete_dochadzka()
    {
        $id = $this->uri->segment(3);
        $hodinykurzu = $this->M_Dochadzka->get_dochadzkas($id);
        foreach ($hodinykurzu as $key => $value) {
            $data['page_header'] = "Vymazať dochádzku";
            $data['content_view'] = 'Dochadzka/delete_dochadzka_v';
            $data['ucastnik'] = $this->create_ucastnici_tabulka($value->idUcastnika);
            $data['kurz'] = $this->zobraz_kurz($value->idKurzu);
            $data['Datum'] = $hodinykurzu['0']->Datum;
            $data['Zaciatok'] = $hodinykurzu['0']->Zaciatok;
            $data['Koniec'] = $hodinykurzu['0']->Koniec;
            $data['id'] = $id;
            $this->template->call_admin_template($data);
        }
    }

    function post_delete_dochadzka()
    {
        $id = $this->input->post('ID');
        $this->M_Dochadzka->delete_dochadzka($id);
        redirect(base_url() . "Admin/Dochadzka");
    }
}