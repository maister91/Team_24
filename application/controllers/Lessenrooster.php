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
        $klasId     = $this->input->post('klassen');
        $semesterId = $this->input->post('semester');

        $gebruikerId = $this->authex->getGebruikerInfo()->id;
        $data['feedback'] = '';
        if ($this->input->get('klasId')) {
            $this->Lesmoment_model->update_klas($this->input->get('klasId'), $gebruikerId);
            $klasId = $this->input->get('klasId');
            $semesterId = $this->input->get('semesterId');
            $data['feedback']    = 'keuzeSuccesvol';
        }

        $lesmomenten = $this->Lesmoment_model->get_lesmoment_by_klas_en_semester($klasId, $semesterId);
        $rooster     = [];
        foreach ($lesmomenten as $lesmoment) {
            $rooster[$lesmoment['lesblok']][$lesmoment['weekdag']] = [
                'lesblok' => $lesmoment['lesblok'],
                'vakNaam' => $this->vak_model->get_vak($lesmoment['vakId'])['naam'],
            ];
        }
        $data['lesmomenten'] = $rooster;
        $data['klasId'] = $klasId;
        $data['semesterId'] = $semesterId;
        $data['klassen']     = $this->klas_model->get_all_klassen();
        $data['_view']       = 'lessenrooster';
        $this->load->view('layouts/main', $data);

    }
}
