<?php

class Kategorie extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("M_Kategorie");
        $this->load->module('template');
    }

    /*Vytvorenie tabulky a zobrazenie*/
    function display_kategorie()
    {
        $data['page_header'] = "Kategórie kurzov";
        $data['content_view'] = 'Kategorie/kategorie_display_v';
        $data['kategorie_table'] = $this->zobrazenie_kategorie();
        $this->template->call_admin_template($data);
    }

    function zobrazenie_kategorie()
    {
        $kategorie_table = "";
        $this->load->library('pagination');
        $kategorie = $this->M_Kategorie->get_kategorie();

        $config['base_url'] = base_url() . "/Admin/Kategorie";
        $config['total_rows'] = count($kategorie);
        $config['per_page'] = 6;

        $this->pagination->initialize($config);
        $kategorie = $this->db->get('kategorie', $config['per_page'], $this->uri->segment(3));


        if (count($kategorie) > 0) {
            $counter = $this->uri->segment(3);
            foreach ($kategorie->result() as $key => $value) {
                $counter = $counter + 1;
                $kategorie_table .= "<tr>";
                $kategorie_table .= "<td class='ID'>{$counter}</td>";
                $kategorie_table .= "<td class='Kategoria'>{$value->Kategoria}</td>";
                $kategorie_table .= "<td>
                 <a href='" . base_url() . "Kategorie/detail_kategorie/{$value->idKategorie}'>
                    <button type = \"button\" class = \"btn btn-default btn-xs btn-fill\">
                        <span class = \"glyphicon glyphicon-search\"></span>
                    </button>
                 </a>
                  
                 <a href='" . base_url() . "Kategorie/edit_kategorie/{$value->idKategorie}'>
                    <button type = \"button\" class = \"btn btn-info btn-xs btn-fill\">
                        <span class = \"glyphicon glyphicon-pencil\"></span>
                    </button>
                 </a>
                 
                 <a href='" . base_url() . "Admin/delete_kategorie/{$value->idKategorie}'>
                    <button type = \"button\" class = \"btn btn-danger btn-xs btn-fill\">
                        <span class = \"glyphicon glyphicon-remove\"></span>
                    </button>
                 </a>
             </td>";
                $kategorie_table .= "</tr>";
            }
        }
        return $kategorie_table;
    }


    function addKategorie()
    {
        $data['page_header'] = "Pridať kategóriu";
        $data['content_view'] = 'Kategorie/add_kategorie_v';
        $this->template->call_admin_template($data);
    }

    function post_kategorie()
    {
        $this->M_Kategorie->post_kategorie();
        redirect(base_url() . 'Admin/Kategorie');
    }

    function postKategorie()
    {
        $udaje = array(
            'Kategoria' => 'Kategoria'
        );
        $this->db->insert('kategorie', $udaje);
    }

    function delete_kategorie()
    {
        $id = $this->uri->segment(3);
        $kategorie = $this->M_Kategorie->get_kategorie($id);
        $data['page_header'] = "Vymazať kategóriu";
        $data['content_view'] = 'Kategorie/delete_kategorie_v';
        $data['Kategoria'] = $kategorie['0']->Kategoria;
        $data['id'] = $id;
        $this->template->call_admin_template($data);
    }

    function post_delete_kategorie()
    {
        $id = $this->input->post('ID');
        $this->M_Kategorie->delete_kategorie($id);
        redirect(base_url() . "Admin/Kategorie");
    }

    function detail_kategorie()
    {
        $id = $this->uri->segment(3);
        $kategorie = $this->M_Kategorie->get_kategorie($id);
        $data['page_header'] = "Detail kategórie";
        $data['content_view'] = 'Kategorie/detail_kategorie_v';
        $data['Kategoria'] = $kategorie['0']->Kategoria;
        $data['id'] = $id;
        $this->template->call_admin_template($data);
    }

    function edit_kategorie()
    {
        $id = $this->uri->segment(3);
        $kategorie = $this->M_Kategorie->get_kategor($id);
        $data['page_header'] = "Upraviť kategóriu";
        $data['content_view'] = 'Kategorie/edit_kategorie_v';
        $data['Kategoria'] = $kategorie['0']->Kategoria;
        $data['id'] = $id;
        $this->template->call_admin_template($data);
    }

    function post_edit_kategorie()
    {
        $id = $this->input->post('ID');
        $data = array('Kategoria' => $this->input->post('Kategoria'));
        $this->M_Kategorie->update_kategorie($id, $data);
        redirect(base_url() . "Admin/Kategorie");
    }
}
