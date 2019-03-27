<?php

class Traject_aanduiden extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Traject_aanduiden_model');
    }

    function index()
    {
        $data['_view'] = 'traject/index';
        $this->load->view('layouts/main', $data);
    }


}