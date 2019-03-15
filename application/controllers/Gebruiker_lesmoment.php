<?php


class Gebruiker_lesmoment extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Gebruiker_lesmoment_model');
    }
}
