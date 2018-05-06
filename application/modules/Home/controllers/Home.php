<?php

class Home extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("M_Home");
        $this->load->module('template');
    }

    function call_home(){
        $data['page_header'] = "Domov";
        $data['content_view'] = 'Home/home_v';
        $data['graf1nazov'] = $this->graf_jeden_nazov();
        $data['graf1hodnoty'] =$this->graf_jeden_hodnoty();
        $this->template->call_admin_template($data);
    }

    function graf_jeden_nazov(){
        $this->load->model('Kategorie/M_Kategorie');
        $data =$this->M_Kategorie->get_data_graf1();
        $options="" ;
        $counter =0;
        $counters= count($data);
        if(count($data)) {
            foreach ($data as $key => $value) {
                $counter = $counter + 1;
                if ($counter == $counters) {
                    $options .= "\"$value->Kategorie\"";
                } else {
                    $options .= "\"$value->Kategorie\",";
                }}}
        return $options;
    }
    function graf_jeden_hodnoty(){
        $this->load->model('Kategorie/M_Kategorie');
        $data =$this->M_Kategorie->get_data_graf1();
        $options="" ;
        $counter =0;
        $counters= count($data);
        if(count($data)) {
            foreach ($data as $key => $value) {
                $counter = $counter + 1;
                if ($counter == $counters) {
                    $options .= " $value->Pocet_kurzov";
                } else {
                    $options .= " $value->Pocet_kurzov,";
                }}}
        return $options;
    }
}