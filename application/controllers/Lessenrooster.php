<?php

class Lessenrooster extends CI_Controller
{

    /* @var Lesmoment_model */
    public $Lesmoment_model;

    /* @var Vak_model */
    public $vak_model;

    /* @var Klas_model */
    public $klas_model;

    function __construct()
    {
        parent::__construct();
        $this->load->model('Lesmoment_model');
        $this->load->model('vak_model');
        $this->load->model('klas_model');
    }

    function index()
    {
        $lesmomenten = $this->Lesmoment_model->get_lesmoment_by_klas_en_semester(1164, 1);
        $rooster = [];
        foreach ($lesmomenten as $lesmoment) {
            $rooster[$lesmoment['lesblok']][$lesmoment['weekdag']] = [
                'lesblok' => $lesmoment['lesblok'],
                'vakNaam' => $this->vak_model->get_vak($lesmoment['vakId'])['naam'],
            ];
        }
        $data['lesmomenten'] = $rooster;
        $data['klassen'] = $this->klas_model->get_all_klas();
        $data['_view'] = 'lessenrooster';
        $this->load->view('layouts/main', $data);

    }
}
