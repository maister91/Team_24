<?php


/**
 * @property Template $template
 * @property Authex $authex
 * @property Klas_model $klas_model
 */
class Klas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('klas_model');
    }

    /*
     * Listing of klas
     */
    function index()
    {
        $data['titel'] = '';

        $ingelogd = $this->authex->getGebruikerInfo();
        if ($ingelogd == null) {
            redirect('gebruiker/index');
        } else {
            switch ($ingelogd->gebruikertypeId) {
                case 3 || 4:
                    $data['titel'] = 'Klasindeling aanpassen';
                    $data['ontwikkelaar'] = 'War Op de Beeck';
                    $data['tester'] = 'Simon Smedts';
                    $data['klassen'] = $this->klas_model->get_all_klas();

                    $partials = ['hoofding' => 'main_header',
                        'inhoud' => 'klas/index',
                        'voetnoot' => 'main_footer'];
                    $this->template->load('main_master', $partials, $data);
                    break;
                case 1 || 2: // gewone geregistreerde gebruiker
                    redirect('gebruiker/meldAf');
                    break;
            }
        };
    }

    /**
     * Geeft de klasindeling weer
     *
     * @see authex::getGebruikerInfo()
     * @see Gebruiker::index()
     * @see klas_model::get_klas_gebruiker()
     * @see klas/edit.php
     * @see Gebruiker::meldAf()
     */
    function klasindeling()
    {
        $ingelogd = $this->authex->getGebruikerInfo();
        if ($ingelogd == null) {
            redirect('gebruiker/index');
        } else {
            switch ($ingelogd->gebruikertypeId) {
                case 3 || 4:
                    $klasId = $this->input->post('klassen');

                    $data['klasId'] = $klasId;
                    $data['titel'] = 'Klasindeling aanpassen';
                    $data['ontwikkelaar'] = 'War Op de Beeck';
                    $data['tester'] = 'Simon Smedts';
                    $data['klassen'] = $this->klas_model->get_klas_gebruiker();

                    $partials = ['hoofding' => 'main_header',
                        'inhoud' => 'klas/edit',
                        'voetnoot' => 'main_footer'];
                    $this->template->load('main_master', $partials, $data);
                    break;
                case 1 || 2: // gewone geregistreerde gebruiker
                    redirect('gebruiker/meldAf');
                    break;
            }
        };
    }

    /**
     * De index beheren
     *
     * @see klas_model::get_klassen()
     * @see klas/beheren.php
     */
    function index_beheren()
    {
        $data['ontwikkelaar'] = 'Thomas Dergent';
        $data['tester'] = 'Melih Doksanbir';
        $data['titel'] = 'Klassen beheren';
        $data['klassen'] = $this->klas_model->get_klassen();
        $partials = ['hoofding' => 'main_header',
            'inhoud' => 'klas/beheren',
            'voetnoot' => 'main_footer'];
        $this->template->load('main_master', $partials, $data);
    }

    /**
     * De index aanpasssen
     * @see klas_model::get_all_klas()
     * @see klas/aanpassen.php
     */

    function index_aanpassen()
    {
        $data['titel'] = 'Klassen toevoegen';
        $data['klas'] = $this->klas_model->get_all_klas();
        $partials = ['hoofding' => 'main_header',
            'inhoud' => 'klas/aanpassen',
            'voetnoot' => 'main_footer'];
        $this->template->load('main_master', $partials, $data);
    }

    /**
     * Haal lege klas op
     * @return stdClass
     */

    function getEmptyKlas()
    {
        $klas = new stdClass();

        $klas->id = 0;
        $klas->naam = '';
        $klas->maxAantal = 0;

        return $klas;
    }

    /**
     * Maak een nieuwe klas
     *
     * @see Klas::getEmptyKlas()
     * @see klas/klas_form.php
     */

    public function maakNieuwe()
    {
        $data['ontwikkelaar'] = 'Thomas Dergent';
        $data['tester'] = 'Melih Doksanbir';
        $data['klas'] = $this->getEmptyKlas();
        $data['titel'] = 'Klas toevoegen';

        $partials = ['hoofding' => 'main_header',
            'inhoud' => 'klas/klas_form',
            'voetnoot' => 'main_footer'];
        $this->template->load('main_master', $partials, $data);
    }

    /**
     * Wijzig een klas
     *
     * @param $id Het id van de klas die wordt gewijzigd
     *
     * @see Klas::$klas_model
     * @see klas_model::get_klas()
     * @see Klas::klas_form
     */

    public function wijzig($id)
    {
        $data['ontwikkelaar'] = 'Thomas Dergent';
        $data['tester'] = 'Melih Doksanbir';
        $this->load->model('klas_model');
        $data['klas'] = $this->klas_model->get_klas($id);
        $data['titel'] = 'Klas wijzigen';

        //var_dump($data['klas']);


        $partials = ['hoofding' => 'main_header',
            'inhoud' => 'klas/klas_form',
            'voetnoot' => 'main_footer'];
        $this->template->load('main_master', $partials, $data);
    }

    /**
     * Een klas verwijderen
     *
     * @param $id Het id van de klas dat wordt verwijderd
     *
     * @see Klas::$klas_model
     * @see klas_model::delete_klas()
     * @see Klas::index_beheren()
     */
    public function schrap($id)
    {
        $this->load->model('klas_model');
        $data['klas'] = $this->klas_model->delete_klas($id);

        redirect('/klas/index_beheren');
    }

    /**
     * Het registreren van een klas
     *
     * @see klas_model::insert()
     * @see klas_model::update_klas()
     * @see Klas::index_beheren()
     */

    public function registreer()
    {
        $id = $this->input->post('id');

        $klas = new stdClass();
        $klas->id = $id;
        $klas->naam = $this->input->post('naam');
        $klas->maxAantal = $this->input->post('maxAantal');

        $this->load->model('klas_model');

        if ($id == 0) {
            $this->klas_model->insert($klas);
        } else {
            $this->klas_model->update_klas($klas);
        }

        redirect('/Klas/index_beheren');
    }


}
