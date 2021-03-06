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
        $data['graf2nazov'] = $this->graf_druhy_nazov();
        $data['graf2hodnoty'] =$this->graf_druhy_hodnoty();
        $data['graf3nazov'] = $this->graf_treti_nazov();
        $data['graf3hodnoty'] =$this->graf_treti_hodnoty();
        $data['graf4nazov'] = $this->graf_stvrty_nazov();
        $data['graf4hodnoty'] =$this->graf_stvrty_hodnoty();
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

    function graf_druhy_nazov(){
        $this->load->model('Kurzy/M_Kurzy');
        $data =$this->M_Kurzy->get_data_graf2();
        $options="" ;
        $counter =0;
        $counters= count($data);
        if(count($data)) {
            foreach ($data as $key => $value) {
                $counter = $counter + 1;
                if ($counter == $counters) {
                    $options .= "\"$value->Lektori\"";
                } else {
                    $options .= "\"$value->Lektori\",";
                }}}
        return $options;
    }
    function graf_druhy_hodnoty(){
        $this->load->model('Kurzy/M_Kurzy');
        $data =$this->M_Kurzy->get_data_graf2();
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

    function graf_treti_nazov(){
        $this->load->model('Dochadzka/M_Dochadzka');
        $data =$this->M_Dochadzka->get_data_graf3();
        $options="" ;
        $counter =0;
        $counters= count($data);
        if(count($data)) {
            foreach ($data as $key => $value) {
                $counter = $counter + 1;
                if ($counter == $counters) {
                    $options .= "\"$value->Datum\"";
                } else {
                    $options .= "\"$value->Datum\",";
                }}}
        return $options;
    }
    function graf_treti_hodnoty(){
        $this->load->model('Dochadzka/M_Dochadzka');
        $data =$this->M_Dochadzka->get_data_graf3();
        $options="" ;
        $counter =0;
        $counters= count($data);
        if(count($data)) {
            foreach ($data as $key => $value) {
                $counter = $counter + 1;
                if ($counter == $counters) {
                    $options .= " $value->Pocet_ziakov";
                } else {
                    $options .= " $value->Pocet_ziakov,";
                }}}
        return $options;
    }

    function graf_stvrty_nazov(){
        $this->load->model('Dochadzka/M_Dochadzka');
        $data =$this->M_Dochadzka->get_data_graf4();
        $options="" ;
        $counter =0;
        $counters= count($data);
        if(count($data)) {
            foreach ($data as $key => $value) {
                $counter = $counter + 1;
                if ($counter == $counters) {
                    $options .= "\"$value->Meno\"";
                } else {
                    $options .= "\"$value->Meno\",";
                }}}
        return $options;
    }
    function graf_stvrty_hodnoty(){
        $this->load->model('Dochadzka/M_Dochadzka');
        $data =$this->M_Dochadzka->get_data_graf4();
        $options="" ;
        $counter =0;
        $counters= count($data);
        if(count($data)) {
            foreach ($data as $key => $value) {
                $counter = $counter + 1;
                if ($counter == $counters) {
                    $options .= " $value->Pocet";
                } else {
                    $options .= " $value->Pocet,";
                }}}
        return $options;
    }

}