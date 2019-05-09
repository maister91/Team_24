<?php
/**
 * @class Lessenrooster
 * @brief Controller-klasse voor Lessenrooster
 *
 * Controller-klasse waar de methodes inzitten voor:
 * -Lessenroosters te tonen
 */

/**
 * @property Template $template
 * @property Authex $authex
 * @property Klas_model $klas_model
 * @property Vak_model $vak_model
 * @property Lesmoment_model $lesmoment_model
 * @property Gebruiker_lesmoment_model $gebruiker_lesmoment_model
 */

class Lessenrooster extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('lesmoment_model');
        $this->load->model('vak_model');
        $this->load->model('klas_model');
        $this->load->model('gebruiker_lesmoment_model');
    }

    function index()
    {
        $klasId = $this->input->post('klassen');
        $semesterId = $this->input->post('semester');

        $gebruikerId = $this->authex->getGebruikerInfo()->id;
        $data['feedback'] = '';
        if ($this->input->get('klasId')) {
            $klasId = $this->input->get('klasId');
            $semesterId = $this->input->get('semesterId');
            $this->lesmoment_model->update_klas($this->input->get('klasId'), $gebruikerId);
            $keuzeLesmomenten = $this->lesmoment_model->get_lesmoment_by_klas_en_semester($klasId, $semesterId);
            $this->gebruiker_lesmoment_model->delete_gebruiker_lesmoment_gebuiker($gebruikerId);
            foreach ($keuzeLesmomenten as $lesmoment) {
                $params = [
                    'gebruikerId' => $gebruikerId,
                    'lesmomentId' => $lesmoment['id'],
                    'naam'        => 'Model traject'
                ];
                $this->gebruiker_lesmoment_model->add_gebruiker_lesmoment($params);
            }
            $data['feedback'] = 'keuzeSuccesvol';
        }

        $lesmomenten = $this->lesmoment_model->get_lesmoment_by_klas_en_semester($klasId, $semesterId);
        $rooster = [];
        foreach ($lesmomenten as $lesmoment) {
            $rooster[$lesmoment['lesblok']][$lesmoment['weekdag']] = [
                'lesblok' => $lesmoment['lesblok'],
                'vakNaam' => $this->vak_model->get_vak($lesmoment['vakId'])['naam'],
            ];
        }
        $data['lesmomenten'] = $rooster;
        $data['klasId'] = $klasId;
        $data['semesterId'] = $semesterId;
        $data['klassen'] = $this->klas_model->get_all_klassen();

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
