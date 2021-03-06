<?php

class Kurzy extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("M_Kurzy");
        $this->load->module('template');
    }

    function display_kurzy(){
        $data['page_header'] = "Kurzy";
        $data['content_view'] ='Kurzy/kurzy_display_v';
        $data['kurzy_table']= $this->create_kurzy_table();
        $this->template->call_admin_template($data);
    }
    function create_kurzy_table(){
        $kurzy_table = "";
        $this->load->library('pagination');
        $kurzy = $this->M_Kurzy->get_kurzy();

        $config['base_url'] = base_url() . "/Admin/Kurzy";
        $config['total_rows'] = count($kurzy);
        $config['per_page'] = 6;

        $this->pagination->initialize($config);
        $kurzy = $this->db->get('kurzy', $config['per_page'], $this->uri->segment(3));


        if(count($kurzy)>0){
            $counter = $this->uri->segment(3);
            foreach ($kurzy->result() as $key => $value) {
              $meno =$this->create_lektori_tabulka($value->idLektora);
              $kateg =$this->zobraz_kategorie($value->idKategorie);
              $counter = $counter + 1;
              $kurzy_table .= "<tr>";
              $kurzy_table .= "<td td class='ID'>{$counter}</td>";
              $kurzy_table .= "<td td class='Nazov'>{$value->Nazov}</td>";
              $kurzy_table .= "<td td class='Popis'>{$value->Popis}</td>";
              $kurzy_table .= "<td td class='Lektor'>{$meno}</td>";
              $kurzy_table .= "<td td class='Kategoria'>{$kateg}</td>";
              $kurzy_table .= "<td td class='MiestoKonania'>{$value->MiestoKonania}</td>";
              $kurzy_table .= "<td td class='Zaciatok'>".date("Y-m-d",strtotime($value->Zaciatok))."</td>";
              $kurzy_table .= "<td td class='Koniec'>".date("Y-m-d",strtotime($value->Koniec))."</td>";
              $kurzy_table .= "<td td class='UrcenePreFirmy'>{$value->UrcenePreFirmy}</td>";
              $kurzy_table .= "<td>
               <a href='" . base_url() . "Kurzy/detail_kurzy/{$value->idKurzu}'>
                    <button type = \"button\" class = \"btn btn-default btn-xs btn-fill\">
                        <span class = \"glyphicon glyphicon-search\"></span>
                    </button>
                 </a>
                  
                 <a href='" . base_url() . "Kurzy/edit_kurzy/{$value->idKurzu}'>
                    <button type = \"button\" class = \"btn btn-info btn-xs btn-fill\">
                        <span class = \"glyphicon glyphicon-pencil\"></span>
                    </button>
                 </a>
                 
                 <a href='" . base_url() . "Kurzy/delete_kurzy/{$value->idKurzu}'>
                    <button type = \"button\" class = \"btn btn-danger btn-xs btn-fill\">
                        <span class = \"glyphicon glyphicon-remove\"></span>
                    </button>
                 </a>
            </td>";
            $kurzy_table .= "</tr>";
          }
        }
        return $kurzy_table;
    }

    function addKurz(){
        $data['page_header'] = "Pridať kurz";
        $data['content_view'] ='Kurzy/add_kurz_v';
        $data['lektors'] = $this->create_lectors_select();
        $data['kategors'] = $this->create_kategorie_select();
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

    function create_kategorie_select(){
        $this->load->model('Kategorie/M_Kategorie');
        $kategors = $this->M_Kategorie->get_active_kategorie();
        $options = "";
        if(count($kategors)){
            foreach ($kategors as $key => $value){
                $options .= "<option value = '{$value->idKategorie}'>{$value->Kategoria}</option>";
            }
        }
        return $options;
    }

    function zobraz_kategorie($id){
        $this->load->model('Kategorie/M_Kategorie');
        $kategorie = $this->M_Kategorie->get_kategor($id);
        $kateg = $kategorie['0']->Kategoria;
        return $kateg;
    }

    function detail_kurzy() {
        $id = $this->uri->segment(3);
        $kurzy = $this->M_Kurzy->get_kurzs($id);
        foreach ($kurzy as $key => $value) {
            $data['page_header'] = "Detail kurzu";
            $data['content_view'] = 'Kurzy/detail_kurz_v';
            $data['Nazov'] = $kurzy['0']->Nazov;
            $data['Popis'] = $kurzy['0']->Popis;
            $data['meno'] = $this->create_lektori_tabulka($value->idLektora);
            $data['kateg'] = $this->zobraz_kategorie($value->idKategorie);
            $data['MiestoKonania'] = $kurzy['0']->MiestoKonania;
            $data['Zaciatok'] = $kurzy['0']->Zaciatok;
            $data['Koniec'] = $kurzy['0']->Koniec;
            $data['UrcenePreFirmy'] = $kurzy['0']->UrcenePreFirmy;
            $data['id'] = $id;
            $this->template->call_admin_template($data);
        }
     }

    function edit_kurzy()
    {
        $id = $this->uri->segment(3);
        $kurzy = $this->M_Kurzy->get_kurzs($id);
        $data['lektors'] = $this->create_lectors_select();
        $data['kategors'] = $this->create_kategorie_select();
        $data['page_header'] = "Upraviť kurz";
        $data['content_view'] = 'Kurzy/edit_kurzy_v';
        $data['Nazov'] = $kurzy['0']->Nazov;
        $data['Popis'] = $kurzy['0']->Popis;
        $data['idLektora']=$kurzy['0']->idLektora;
        $data['idKategorie']=$kurzy['0']->idKategorie;
        $data['MiestoKonania'] = $kurzy['0']->MiestoKonania;
        $data['Zaciatok'] = $kurzy['0']->Zaciatok;
        $data['Koniec'] = $kurzy['0']->Koniec;
        $data['UrcenePreFirmy'] = $kurzy['0']->UrcenePreFirmy;
        $data['id'] = $id;
        $this->template->call_admin_template($data);
    }

    function post_edit_kurzy()
    {
        $id = $this->input->post('ID');
        $data = array(
            'Nazov' => $this->input->post('Nazov'),
            'Popis' => $this->input->post('Popis'),
            'idLektora' => $this->input->post('idLektora'),
            'idKategorie' => $this->input->post('idKategorie'),
            'MiestoKonania' => $this->input->post('MiestoKonania'),
            'Zaciatok' => $this->input->post('Zaciatok'),
            'Koniec' => $this->input->post('Koniec'),
            'UrcenePreFirmy' => $this->input->post('UrcenePreFirmy'),
        );
        $this->M_Kurzy->update_kurzy($id, $data);
        redirect(base_url() . "Admin/Kurzy");
    }

    function delete_kurzy()
    {
        $id = $this->uri->segment(3);
        $kurzy = $this->M_Kurzy->get_kurzs($id);
        foreach ($kurzy as $key => $value) {
            $data['page_header'] = "Vymazať kurz";
            $data['content_view'] = 'Kurzy/delete_kurzy_v';
            $data['Nazov'] = $kurzy['0']->Nazov;
            $data['Popis'] = $kurzy['0']->Popis;
            $data['meno'] = $this->create_lektori_tabulka($value->idLektora);
            $data['kateg'] = $this->zobraz_kategorie($value->idKategorie);
            $data['MiestoKonania'] = $kurzy['0']->MiestoKonania;
            $data['Zaciatok'] = $kurzy['0']->Zaciatok;
            $data['Koniec'] = $kurzy['0']->Koniec;
            $data['UrcenePreFirmy'] = $kurzy['0']->UrcenePreFirmy;
            $data['id'] = $id;
            $this->template->call_admin_template($data);
        }
    }

    function post_delete_kurzy()
    {
        $id = $this->input->post('ID');
        $this->M_Kurzy->delete_kurzy($id);
        redirect(base_url() . "Admin/Kurzy");
    }
}
