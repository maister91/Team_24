<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 */

/**
 * @property Template $template
 * @property  Authex $authex
 */
class Gebruiker extends CI_Controller
{

    /* @var Gebruiker_model */
    public $Gebruiker_model;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
    }

    /*
     * Listing of gebruiker
     */
    function index()
    {
        $inhoud = null;
        $ingelogd = $this->authex->getGebruikerInfo();
        if ($ingelogd == null) {
            $inhoud = "gebruiker/index";
        } else {
            switch ($ingelogd->gebruikertypeId) {
                case 1: // gewone geregistreerde gebruiker
                    redirect('traject/index');
                    break;
                case 2: // administrator
                    redirect('gebruikertype/docent');
                    break;
                case 3:
                    redirect('gebruikertype/isp');
                    break;
                case 4:
                    redirect('gebruikertype/opleidingmanager');
                    break;
            }
        };
        $data['titel'] = '';
        $data['ontwikkelaar'] = 'War Op de Beeck';
        $data['tester'] = 'Simon Smedts';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();

        $partials = ['hoofding' => 'main_header',
            'inhoud' => $inhoud,
            'voetnoot' => 'main_footer'];

        $this->template->load('main_master', $partials, $data);
    }

    function index_simulatie(){
            $data['titel'] = 'Studietraject simuleren';
            $partials = ['hoofding' => 'main_header',
                'inhoud' => 'gebruiker/simulatie',
                'voetnoot' => 'main_footer'];

            $this->template->load('main_master', $partials, $data);
    }

    function index_klaskeuze(){
            $data['titel'] = 'Klaskeuze';
            $partials = ['hoofding' => 'main_header',
                'inhoud' => 'gebruiker/klaskeuze',
                'voetnoot' => 'main_footer'];

            $this->template->load('main_master', $partials, $data);
    }

    public
    function controleerAanmelden()
    {
        $email = $this->input->post('email');
        $paswoord = $this->input->post('paswoord');

        if ($this->authex->meldAan($email, $paswoord)) {
            redirect('gebruiker/index');
        } else {
            redirect('gebruiker/toonFout');
        }
    }

    public
    function meldAf()
    {
        $this->authex->meldAf();
        redirect('gebruiker/index');
    }

    public
    function toonFout()
    {
        $data['titel'] = 'Fout';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();

        $partials = ['hoofding' => 'main_header',
            'menu' => 'main_menu',
            'inhoud' => 'gebruiker/fout_aanmelden',
            'voetnoot' => 'main_footer'];

        $this->template->load('main_master', $partials, $data);
    }

    /*
     * Adding a new gebruiker
     */
    function add()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $params = [
                'gebruikertypeId' => $this->input->post('gebruikertypeId'),
                'klasId' => $this->input->post('klasId'),
                'trajectId' => $this->input->post('trajectId'),
                'afspraakId' => $this->input->post('afspraakId'),
                'voornaam' => $this->input->post('voornaam'),
                'achternaam' => $this->input->post('achternaam'),
                'email' => $this->input->post('email'),
                'passwoord' => $this->input->post('passwoord'),
            ];

            $gebruiker_id = $this->Gebruiker_model->add_gebruiker($params);
            redirect('gebruiker/index');
        } else {
            $data['_view'] = 'gebruiker/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a gebruiker
     */
    function edit($id)
    {
        // check if the gebruiker exists before trying to edit it
        $data['gebruiker'] = $this->Gebruiker_model->get($id);

        if (isset($data['gebruiker']['id'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = [
                    'gebruikertypeId' => $this->input->post('gebruikertypeId'),
                    'klasId' => $this->input->post('klasId'),
                    'trajectId' => $this->input->post('trajectId'),
                    'afspraakId' => $this->input->post('afspraakId'),
                    'voornaam' => $this->input->post('voornaam'),
                    'achternaam' => $this->input->post('achternaam'),
                    'email' => $this->input->post('email'),
                    'passwoord' => $this->input->post('passwoord'),
                ];

                $this->Gebruiker_model->update_gebruiker($id, $params);
                redirect('gebruiker/index');
            } else {
                $data['_view'] = 'gebruiker/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The gebruiker you are trying to edit does not exist.');
    }

    /*
     * Deleting gebruiker
     */
    function remove($id)
    {
        $gebruiker = $this->Gebruiker_model->get($id);

        // check if the gebruiker exists before trying to delete it
        if (isset($gebruiker['id'])) {
            $this->Gebruiker_model->delete_gebruiker($id);
            redirect('gebruiker/index');
        } else
            show_error('The gebruiker you are trying to delete does not exist.');
    }

    public
    function haalKlasIdOp($klasid)
    {
        $watDoen = $this->input->get('watDoen');
        if ($watDoen == 'klasid') {
            $data['klasid'] = $klasid;
        }

        $this->load->view("klas/index");
    }

    public
    function maakGebruiker()
    {
        $gebruiker = new stdClass();
        $gebruiker->voornaam = "Simon";
        $gebruiker->achternaam = "Smedts";
        $gebruiker->email = "r0695798@student.thomasmore.be";
        $gebruiker->paswoord = password_hash("r0695798", PASSWORD_DEFAULT);
        $gebruiker->gebruikertypeId = 1;
        $this->db->insert('gebruiker', $gebruiker);
        return $this->db->insert_id();
    }
}


