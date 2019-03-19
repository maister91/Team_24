<?php

class Lessenrooster extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data['_view'] = 'lessenrooster';
        $this->load->view('layouts/main', $data);
    }
}
