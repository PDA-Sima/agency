<?php

class Admin extends MY_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->module(['kurzy']);
        $this->load->module(['lektori']);
        $this->load->module(['ucastnici']);
        $this->load->module(['Dochadzka']);
        $this->load->module(['faktury']);
    }

    function index(){
        $this->template->call_admin_template();
    }
    /*Kurzy*/
    function kurzy(){
        $this->kurzy->display_kurzy();
    }
    function addKurz(){
        $this->kurzy->addKurz();
    }


    /*Lektori*/
    function lektori(){
        $this->lektori->display_lektori();
    }

    function addLektor(){
        $this->lektori->addLektor();
    }

    function postLektor(){
        $this->lektori->postLektor();
    }

    function delete_lektor(){
        $this->lektori->delete_lektor();
    }

    function detail_lektor(){
        $this->lektori->detail_lektor();
    }

    function edit_lektor(){
        $this->lektori->edit_lektor();
    }


    /*Ucastnici*/
    function ucastnici(){
        $this->ucastnici->display_ucastnici();
    }
    function addUcastnik(){
        $this->ucastnici->addUcastnik();
    }

    /*Dochádzka*/
    function dochadzka(){
        $this->dochadzka->display_dochadzka();
    }
    function addDochadzka(){
        $this->dochadzka->addDochadzka();
    }

    /*Faktury*/
    function faktury(){
        $this->faktury->display_faktury();
    }
    function addFaktura(){
        $this->faktury->addFaktura();
    }

}