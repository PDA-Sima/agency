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
        $data['content_view'] ='Ucastnici/ucastnici_display_v';
        $data['ucastnici_table']= $this->zobrazenie_ucastnikov();
        $this->template->call_admin_template($data);
    }

    function zobrazenie_ucastnikov(){
        $ucastnici_table = "";
        $this->load->library('pagination');
        $ucastnici = $this->M_Ucastnici->get_ucastnici();

        $config['base_url'] = base_url() . "/Admin/Ucastnici";
        $config['total_rows'] = count($ucastnici);
        $config['per_page'] = 6;

        $this->pagination->initialize($config);
        $ucastnici = $this->db->get('ucastnici', $config['per_page'], $this->uri->segment(3));

        if (count($ucastnici) > 0) {
            $counter = $this->uri->segment(3);
            foreach ($ucastnici->result() as $key => $value) {
                $counter = $counter + 1;
            $ucastnici_table .= "<tr>";
            $ucastnici_table .= "<td class='ID'>{$counter}</td>";
            $ucastnici_table .= "<td class='Meno'>{$value->Meno}</td>";
            $ucastnici_table .= "<td class='Priezvisko'>{$value->Priezvisko}</td>";
            $ucastnici_table .= "<td class='Adresa'>{$value->Adresa}</td>";
            $ucastnici_table .= "<td class='Email'>{$value->Email}</td>";
            $ucastnici_table .= "<td class='Telefon'>{$value->Telefon}</td>";
            $ucastnici_table .= "<td>
            <a href='" . base_url() . "Ucastnici/detail_ucastnik/{$value->idUcastnika}'>
                    <button type = \"button\" class = \"btn btn-default btn-xs\">
                        <span class = \"glyphicon glyphicon-search\"></span>
                    </button>
                 </a>

                 <a href='" . base_url() . "Ucastnici/edit_ucastnik/{$value->idUcastnika}'>
                    <button type = \"button\" class = \"btn btn-info btn-xs\">
                        <span class = \"glyphicon glyphicon-pencil\"></span>
                    </button>
                 </a>

                 <a href='" . base_url() . "Ucastnici/delete_ucastnik/{$value->idUcastnika}'>
                    <button type = \"button\" class = \"btn btn-danger btn-xs\">
                        <span class = \"glyphicon glyphicon-remove\"></span>
                    </button>
                 </a>
             </td>";
            $ucastnici_table .= "</tr>";
            }
        }
        return $ucastnici_table;
    }

    function addUcastnik()
    {
        $data['page_header'] = "Pridať účastníka";
        $data['content_view'] = 'Ucastnici/add_ucastnik_v';
        $this->template->call_admin_template($data);
    }

    function post_ucastnik()
    {
        $this->M_Ucastnici->post_ucastnici();
        redirect(base_url() . 'Admin/Ucastnici');
    }

    function postUcastnik()
    {
        $udaje = array(
            'Meno' => 'Meno',
            'Priezvisko' => 'Priezvisko',
            'Adresa' => 'Adresa',
            'Email' => 'Email',
            'Telefon' => 'Telefon'
        );
        $this->db->insert('ucastnici', $udaje);
    }


    function delete_ucastnik()
    {
        $id = $this->uri->segment(3);
        $ucastnici = $this->M_Ucastnici->get_ucastnic($id);
        $data['page_header'] = "Vymaž lektora";
        $data['content_view'] = 'Ucastnici/delete_ucastnik_v';
        $data['meno'] = $ucastnici['0']->Meno;
        $data['priezvisko'] = $ucastnici['0']->Priezvisko;
        $data['adresa'] = $ucastnici['0']->Adresa;
        $data['email'] = $ucastnici['0']->Email;
        $data['telefon'] = $ucastnici['0']->Telefon;
        $data['id'] = $id;
        $this->template->call_admin_template($data);
    }

    function post_delete_ucastnik()
    {
        $id = $this->input->post('ID');
        $this->M_Ucastnici->delete_ucastnici($id);
        redirect(base_url() . "Admin/Ucastnici");
    }

    function detail_ucastnik()
    {
        $id = $this->uri->segment(3);
        $ucastnici = $this->M_Ucastnici->get_ucastnic($id);
        $data['page_header'] = "Detail účastníka kurzu";
        $data['content_view'] = 'Ucastnici/detail_ucastnik_v';
        $data['meno'] = $ucastnici['0']->Meno;
        $data['priezvisko'] = $ucastnici['0']->Priezvisko;
        $data['adresa'] = $ucastnici['0']->Adresa;
        $data['email'] = $ucastnici['0']->Email;
        $data['telefon'] = $ucastnici['0']->Telefon;
        $data['id'] = $id;
        $this->template->call_admin_template($data);
    }

    function edit_ucastnik()
    {
        $id = $this->uri->segment(3);
        $ucastnici = $this->M_Ucastnici->get_ucastnic($id);
        $data['page_header'] = "Upraviť účastníka";
        $data['content_view'] = 'Ucastnici/edit_ucastnik_v';
        $data['Meno'] = $ucastnici['0']->Meno;
        $data['Priezvisko'] = $ucastnici['0']->Priezvisko;
        $data['Adresa'] = $ucastnici['0']->Adresa;
        $data['Email'] = $ucastnici['0']->Email;
        $data['Telefon'] = $ucastnici['0']->Telefon;
        $data['id'] = $id;
        $this->template->call_admin_template($data);
    }

    function post_edit_ucastnik()
    {
        $id = $this->input->post('ID');
        $data = array(
            'Meno' => $this->input->post('Meno'),
            'Priezvisko' => $this->input->post('Priezvisko'),
            'Adresa' => $this->input->post('Adresa'),
            'Email' => $this->input->post('Email'),
            'Telefon' => $this->input->post('Telefon')
        );
        $this->M_Ucastnici->update_ucastnici($id, $data);
        redirect(base_url() . "Admin/Ucastnici");
    }
}