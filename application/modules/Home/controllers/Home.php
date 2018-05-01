<?php

class Home extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model("M_Home");

    }

    function  home_template($data = NULL)
    {
        $this -> load -> view('home_v', $data);
    }
}