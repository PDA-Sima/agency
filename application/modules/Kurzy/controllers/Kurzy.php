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

        $config['base_url'] = base_url() . "/Admin/Lektori";
        $config['total_rows'] = count($kurzy);
        $config['per_page'] = 6;

        $this->pagination->initialize($config);
        $kurzy = $this->db->get('kurzy', $config['per_page'], $this->uri->segment(3));


        if(count($kurzy)>0){
            $counter = $this->uri->segment(3);
            foreach ($kurzy->result() as $key => $value) {
              $meno =$this->create_lektori_tabulka($value->idLektora);
              $kateg =$this->zobraz_kategorie($value->idKategorie);
              $kurzy_table .= "<tr>";
              $kurzy_table .= "<td>{$counter}</td>";
              $kurzy_table .= "<td>{$value->Nazov}</td>";
              $kurzy_table .= "<td>{$value->Popis}</td>";
              $kurzy_table .= "<td>{$meno}</td>";
              $kurzy_table .= "<td>{$kateg}</td>";
              $kurzy_table .= "<td>{$value->MiestoKonania}</td>";
              $kurzy_table .= "<td>".date("d-m-Y",strtotime($value->Zaciatok))."</td>";
              $kurzy_table .= "<td>".date("d-m-Y",strtotime($value->Koniec))."</td>";
              $kurzy_table .= "<td>{$value->UrcenePreFirmy}</td>";
              $kurzy_table .= "<td>
               <a href='" . base_url() . "Kurzy/detail_kurzy/{$value->idKurzu}'>
                    <button type = \"button\" class = \"btn btn-default btn-xs\">
                        <span class = \"glyphicon glyphicon-search\"></span>
                    </button>
                 </a>
                  
                 <a href='" . base_url() . "Kurzy/edit_kurzy/{$value->idKurzu}'>
                    <button type = \"button\" class = \"btn btn-info btn-xs\">
                        <span class = \"glyphicon glyphicon-pencil\"></span>
                    </button>
                 </a>
                 
                 <a href='" . base_url() . "Kurzy/delete_kurzy/{$value->idKurzu}'>
                    <button type = \"button\" class = \"btn btn-danger btn-xs\">
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
        $data['description'] = "(vloženie nového kurzu)";
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

    function detail_kurzy()
    {
        $id = $this->uri->segment(3);
        $kurzy = $this->M_Kurzy->get_kurzs($id);
        $data['page_header'] = "Detail kurzu";
        $data['content_view'] = 'Kurzy/detail_kurzu_v';
        $data['meno'] = $kurzy['0']->Kurz;
        $data['id'] = $id;
        $this->template->call_admin_template($data);
    }

}
