<?php

class Admin extends MY_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->module(['kurzy']);
        $this->load->module(['kategorie']);
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

    /*Kategorie*/
    function kategorie(){
        $this->kategorie->display_kategorie();
    }

    function addKategorie(){
        $this->kategorie->addKategorie();
    }

    function postKategorie(){
        $this->kategorie->postKategorie();
    }

    function delete_kategorie(){
        $this->kategorie->delete_kategorie();
    }

    function detail_kategorie(){
        $this->kategorie->detail_kategorie();
    }

    function edit_kategorie(){
        $this->kategorie->edit_kategorie();
    }


    /*Ucastnici*/
    function ucastnici(){
        $this->ucastnici->display_ucastnici();
    }
    function addUcastnik(){
        $this->ucastnici->addUcastnik();
    }
    function postUcastnik(){
        $this->ucastnici->postUcastnik();
    }

    function delete_ucastnici(){
        $this->ucastnici->delete_ucastnici();
    }

    function detail_ucastnici(){
        $this->ucastnici->detail_ucastnici();
    }

    function edit_ucastnici(){
        $this->ucastnici->edit_ucastnici();
    }

    /*Dochádzka*/
    function dochadzka(){
        $this->dochadzka->display_dochadzka();
    }
    function addDochadzka(){
        $this->dochadzka->addDochadzka();
    }

    function post_dochadzka(){
        $this->dochadzka->postdochadzka();
    }

    function delete_dochadzka(){
        $this->dochadzka->delete_dochadzka();
    }

    function detail_dochadzka(){
        $this->dochadzka->detail_dochadzka();
    }

    function edit_dochadzka(){
        $this->dochadzka->edit_dochadzka();
    }

    /*Faktury*/
    function faktury(){
        $this->faktury->display_faktury();
    }
    function addFaktura(){
        $this->faktury->addFaktura();
    }

}