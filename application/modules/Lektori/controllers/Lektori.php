<?php

class Lektori extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("M_Lektori");
        $this->load->module('template');
    }

    /*Vytvorenie tabulky a zobrazenie*/
    function display_lektori()
    {
        $data['page_header'] = "Lektori";
        $data['content_view'] = 'Lektori/lektori_display_v';
        $data['lektori_table'] = $this->zobrazenie_lektorov();
        $this->template->call_admin_template($data);
    }

    function zobrazenie_lektorov()
    {
        $lektori_table = "";
        $this->load->library('pagination');
        $lektori = $this->M_Lektori->get_lektori();

        $config['base_url'] = base_url() . "/Admin/Lektori";
        $config['total_rows'] = count($lektori);
        $config['per_page'] = 6;

        $this->pagination->initialize($config);
        $lektori = $this->db->get('lektori', $config['per_page'], $this->uri->segment(3));


        if (count($lektori) > 0) {
            $counter = $this->uri->segment(3);
            foreach ($lektori->result() as $key => $value) {
                $counter = $counter + 1;
                $lektori_table .= "<tr>";
                $lektori_table .= "<td class='ID'>{$counter}</td>";
                $lektori_table .= "<td class='Lektori'>{$value->Lektor}</td>";
                $lektori_table .= "<td>
                 <a href='" . base_url() . "Admin/detail_lektor/{$value->idLektora}'>
                    <button type = \"button\" class = \"btn btn-default btn-xs\">
                        <span class = \"glyphicon glyphicon-search\"></span>
                    </button>
                 </a>
                  
                 <a href='" . base_url() . "Lektori/edit_lektor/{$value->idLektora}'>
                    <button type = \"button\" class = \"btn btn-info btn-xs\">
                        <span class = \"glyphicon glyphicon-pencil\"></span>
                    </button>
                 </a>
                 
                 <a href='" . base_url() . "Admin/delete_lektor/{$value->idLektora}'>
                    <button type = \"button\" class = \"btn btn-danger btn-xs\">
                        <span class = \"glyphicon glyphicon-remove\"></span>
                    </button>
                 </a>
             </td>";
                $lektori_table .= "</tr>";
            }
        }
        return $lektori_table;
    }


    /*pridanie lektora*/
    function addLektor()
    {
        $data['page_header'] = "Pridať lektora";
        $data['content_view'] = 'Lektori/add_lektor_v';
        $this->template->call_admin_template($data);
    }

    function post_lektor()
    {
        $this->M_Lektori->post_lektor();
        redirect(base_url() . 'Admin/Lektori');
    }

    function postLektor()
    {
        $udaje = array(
            'Lektor' => 'Meno_lektora'
        );
        $this->db->insert('lektori', $udaje);
    }

    /*Odstranenie lektora*/
    function delete_lektor()
    {
        $id = $this->uri->segment(3);
        $lektori = $this->M_Lektori->get_lektors($id);
        $data['page_header'] = "Vymaž lektora";
        $data['content_view'] = 'Lektori/delete_lektor_v';
        $data['Lektor'] = $lektori['0']->Lektor;
        $data['id'] = $id;
        $this->template->call_admin_template($data);
    }

    function post_delete_lektor()
    {
        $id = $this->input->post('ID');
        $this->M_Lektori->delete_lektor($id);
        redirect(base_url() . "Admin/Lektori");
    }

    /*Detail lektora*/
    function detail_lektor()
    {
        $id = $this->uri->segment(3);
        $lektori = $this->M_Lektori->get_lektors($id);
        $data['page_header'] = "Detail lektora";
        $data['content_view'] = 'Lektori/detail_lektor_v';
        $data['meno'] = $lektori['0']->Lektor;
        $data['id'] = $id;
        $this->template->call_admin_template($data);
    }

    /*Edit lektora*/
    function edit_lektor()
    {
        $id = $this->uri->segment(3);
        $lektori = $this->M_Lektori->get_lektors($id);
        $data['page_header'] = "Uprav lektora";
        $data['content_view'] = 'Lektori/edit_lektor_v';
        $data['Lektor'] = $lektori['0']->Lektor;
        $data['id'] = $id;
        $this->template->call_admin_template($data);
    }

    function post_edit_lektor()
    {
        $id = $this->input->post('ID');
        $data = array('Lektor' => $this->input->post('Lektor'));
        $this->M_Lektori->update_lektor($id, $data);
        redirect(base_url() . "Admin/Lektori");
    }
}
