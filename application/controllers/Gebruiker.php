<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @class Gebruiker
 * @brief Controller-klasse voor Gebruiker
 *
 * Controller-klasse met alle methodes voor de gebruikers
 */

class Gebruiker extends CI_Controller
{

    /* @var Gebruiker_model */
    public $Gebruiker_model;

    /**
     * Gebruiker constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
    }

    /**
     * Toont de login pagina van de gebruiker
     *
     * @see authex::getGebruikerInfo()
     *
     * @see gebruiker/index.php
     * @see Traject::index
     * @see Gebruikertype::docent
     * @see Gebruikertype::isp
     * @see Gebruikertype::opleidingmanager
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

    /**
     * Toont de index pagina van de simulatie
     *
     * @see gebruiker/simulatie.php
     */
    function index_simulatie()
    {
        $data['ontwikkelaar'] = 'War Op de Beeck';
        $data['tester'] = 'Simon Smedts';
        $data['titel'] = 'Studietraject simuleren';
        $partials = ['hoofding' => 'main_header',
            'inhoud' => 'gebruiker/simulatie',
            'voetnoot' => 'main_footer'];

        $this->template->load('main_master', $partials, $data);
    }

    /**
     * Toont de index pagina van de klaskeuze
     *
     * @see gebruiker/klaskeuze.php
     */
    function index_klaskeuze()
    {
        $data['ontwikkelaar'] = 'War Op de Beeck';
        $data['tester'] = 'Simon Smedts';
        $data['titel'] = 'Klaskeuze';
        $partials = ['hoofding' => 'main_header',
            'inhoud' => 'gebruiker/klaskeuze',
            'voetnoot' => 'main_footer'];

        $this->template->load('main_master', $partials, $data);
    }

    /**
     * Controleert of het paswoord overeenkomt met de email
     *
     * @see authex::meldAan()
     * @see Gebruiker::index()
     * @see Gebruiker::toonFout
     */
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

    /**
     * Meldt de gebruiker af
     *
     * @see authex::meldAf()
     * @see Gebruiker::index
     */
    public
    function meldAf()
    {
        $this->authex->meldAf();
        redirect('gebruiker/index');
    }

    /**
     * Toont een fout als er iets misloopt bij het aanmelden
     *
     * @see authex::getGebruikerInfo()
     * @see gebruiker/fout_aanmelden.php
     */
    public
    function toonFout()
    {
        $data['ontwikkelaar'] = 'War Op de Beeck';
        $data['tester'] = 'Simon Smedts';
        $data['titel'] = 'Fout';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();

        $partials = ['hoofding' => 'main_header',
            'menu' => 'main_menu',
            'inhoud' => 'gebruiker/fout_aanmelden',
            'voetnoot' => 'main_footer'];

        $this->template->load('main_master', $partials, $data);
    }

    /**
     * Voegt een gebruiker toe aan de database
     *
     * @see Gebruiker_model::add_gebruiker()
     * @see Gebruiker::index
     * @see gebruiker/add.php
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

    /**
     * Past de gegevens van een gebruiker met een bepaalde id aan
     *
     * @param $id de id van de gebruiker die aangepast wordt
     * @see Gebruiker_model::get()
     * @see Gebruiker_model::update_gebruiker()
     * @see Gebruiker::index
     * @see gebruiker/edit.php
     *
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


    /**
     * Verwijdert een gebruiker met de opgegeven id
     *
     * @param $id de id van de gebruiekr die verwijdert wordt
     * @see Gebruiker_model::get()
     * @see Gebruiker_model::delete_gebruiker()
     * @see Gebruiker::index
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

    /**
     * Haalt de gegevens van de klas op met opgegeven id
     *
     * @param $klasid de id van de klas die opgehaald wordt
     * @see klas/index.php
     */
    public
    function haalKlasIdOp($klasid)
    {
        $watDoen = $this->input->get('watDoen');
        if ($watDoen == 'klasid') {
            $data['klasid'] = $klasid;
        }

        $this->load->view("klas/index");
    }
}


