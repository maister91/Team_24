<?php

/**
 * @class Lessenrooster
 * @brief Controller-klasse voor Lesssenrooster
 *
 * Controller-klasse met alle methodes voor de lessenroosters
 */
class Lessenrooster extends CI_Controller
{
    /* @var Lesmoment_model */
    public $Lesmoment_model;
    /* @var Vak_model */
    public $vak_model;
    /* @var Klas_model */
    public $klas_model;

    /**
     * Lessenrooster constructor.
     */

    function __construct()
    {
        parent::__construct();
        $this->load->model('Lesmoment_model');
        $this->load->model('vak_model');
        $this->load->model('klas_model');
    }

    /**
     * Geeft het lessenrooster weer
     *
     * @see authex::getGebruikerInfo()
     * @see Lesmoment_model::update_klas()
     * @see Lesmoment_model::get_lesmoment_by_klas_en_semester()
     * @see Vak_model::get_vak()
     * @see Klas_model::get_all_klas()
     * @see lessenrooster.php
     */

    function index()
    {
        $klasId = $this->input->post('klassen');
        $semesterId = $this->input->post('semester');
        $gebruikerId = $this->authex->getGebruikerInfo()->id;
        $data['feedback'] = '';
        if ($this->input->get('klasId')) {
            $this->Lesmoment_model->update_klas($this->input->get('klasId'), $gebruikerId);
            $klasId = $this->input->get('klasId');
            $semesterId = $this->input->get('semesterId');
            $data['feedback'] = 'keuzeSuccesvol';
        }
        $lesmomenten = $this->Lesmoment_model->get_lesmoment_by_klas_en_semester($klasId, $semesterId);
        $rooster = [];
        foreach ($lesmomenten as $lesmoment) {
            $rooster[$lesmoment['lesblok']][$lesmoment['weekdag']] = [
                'lesblok' => $lesmoment['lesblok'],
                'vakNaam' => $this->Vak_model->get_vak($lesmoment['vakId'])['naam'],
            ];
        }
        $data['lesmomenten'] = $rooster;
        $data['klasId'] = $klasId;
        $data['semesterId'] = $semesterId;
        $data['klassen'] = $this->Klas_model->get_all_klas();
        $data['titel'] = '';
        $data['ontwikkelaar'] = 'Melih Doksanbir';
        $data['tester'] = 'Thomas Dergent';
        $data['_view'] = 'lessenrooster';
        $partials = ['hoofding' => 'main_header',
            'inhoud' => 'lessenrooster',
            'voetnoot' => 'main_footer'];
        $this->template->load('main_master', $partials, $data);
    }
}