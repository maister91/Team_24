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
        $klasid=$this->input->post('klassen');
        $semesterid=$this->input->post('semester');
        var_dump($klasid);

        var_dump($gebruiker = $this->authex->getGebruikerInfo());
        echo $gebruiker->id;

        if(array_key_exists('klaskeuze',$_POST)){
            $this->Lesmoment_model->update_klas($klasid, $gebruiker->id);
        }

        $lesmomenten = $this->Lesmoment_model->get_lesmoment_by_klas_en_semester($klasid, $semesterid);
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
