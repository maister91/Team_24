<?php

/**
 * @class Gebruikertype
 * @brief Controller-klasse voor Gebruikertype
 *
 * Controller-klasse met alle methodes voor de gebruikertype
 */

class Gebruikertype extends CI_Controller
{

    /* @var Gebruikertype_model */
    public $Gebruikertype_model;

    /**
     * Gebruikertype constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('Gebruikertype_model');
    }

    /**
     * toont de index pagina van gebruikertype
     *
     * @see Gebruikertype_model::get_all_gebruikertype()
     * @see gebruikertype/index.php
     */
    function index()
    {
        $data['gebruikertype'] = $this->Gebruikertype_model->get_all_gebruikertype();

        $data['_view'] = 'gebruikertype/index';
        $this->load->view('layouts/main', $data);
    }

    /**
     * toont de index pagina van de docent
     *
     * @see authex::getGebruikerInfo()
     * @see Gebruikertype_model::get_all_gebruikertype()
     * @see docent_landing.php
     *
     */
    function docent()
    {
        $ingelogd = $this->authex->getGebruikerInfo();
        if ($ingelogd == null) {
            redirect('gebruiker/index');
        } else {
            switch ($ingelogd->gebruikertypeId) {
                case 2:
                    $data['titel'] = '';
                    $data['ontwikkelaar'] = 'Simon Smedts';
                    $data['tester'] = 'War Op de Beeck';
                    $data['gebruikertype'] = $this->Gebruikertype_model->get_all_gebruikertype();

                    $partials = ['hoofding' => 'main_header',
                        'inhoud' => 'docent_landing',
                        'voetnoot' => 'main_footer'];

                    $this->template->load('main_master', $partials, $data);
                    break;
                case 1 || 3 || 4: // gewone geregistreerde gebruiker
                    redirect('gebruiker/meldAf');
                    break;
            }
        };
    }

    /**
     * toont de index pagina van de isp-verantwoordelijke
     *
     * @see authex::getGebruikerInfo()
     * @see Gebruikertype_model::get_all_gebruikertype()
     * @see Gebruiker::index()
     * @see isp_landing.php
     *
     */
    function isp()
    {
        $ingelogd = $this->authex->getGebruikerInfo();
        if ($ingelogd == null) {
            redirect('gebruiker/index');
        } else {
            switch ($ingelogd->gebruikertypeId) {
                case 3:
                    $data['titel'] = '';
                    $data['ontwikkelaar'] = 'Melih Doksanbir';
                    $data['tester'] = 'War Op de Beeck';
                    $data['gebruikertype'] = $this->Gebruikertype_model->get_all_gebruikertype();

                    $partials = ['hoofding' => 'main_header',
                        'inhoud' => 'isp_landing',
                        'voetnoot' => 'main_footer'];

                    $this->template->load('main_master', $partials, $data);
                    break;
                case 1 || 2 || 4: // gewone geregistreerde gebruiker
                    redirect('gebruiker/meldAf');
                    break;
            }
        };
    }

    /**
     * toont de index pagina van de opleidingsmanager
     *
     * @see authex::getGebruikerInfo()
     * @see Gebruikertype_model::get_all_gebruikertype()
     * @see opleidingmanager.php
     *
     */
    function opleidingmanager()
    {
        $ingelogd = $this->authex->getGebruikerInfo();
        if ($ingelogd == null) {
            redirect('gebruiker/index');
        } else {
            switch ($ingelogd->gebruikertypeId) {
                case 4:
                    $data['titel'] = '';
                    $data['ontwikkelaar'] = 'War Op de Beeck';
                    $data['tester'] = 'Simon Smedts';
                    $data['gebruikertype'] = $this->Gebruikertype_model->get_all_gebruikertype();

                    $partials = ['hoofding' => 'main_header',
                        'inhoud' => 'opleidingmanager',
                        'voetnoot' => 'main_footer'];

                    $this->template->load('main_master', $partials, $data);
                    break;
                case 1 || 2 || 3: // gewone geregistreerde gebruiker
                    redirect('gebruiker/meldAf');
                    break;
            }
        };
    }

    /**
     * voegt een gebruikerstype toe aan de databank
     *
     * @see Gebruikertype_model::add_gebruikertype()
     * @see gebruikertype/add.php
     */
    function add()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $params = [
                'beschrijving' => $this->input->post('beschrijving'),
            ];

            $gebruikertype_id = $this->Gebruikertype_model->add_gebruikertype($params);
            redirect('gebruikertype/index');
        } else {
            $data['_view'] = 'gebruikertype/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /**
     * Wijzigt een bestaande gebruikerstype
     *
     * @param $id de id van het gebruikerstype die gewijzigd wordt
     * @see Gebruikertype_model::get_gebruikertype()
     * @see Gebruikertype_model::update_gebruikertype()
     * @see Gebruikertype::index()
     * @see gebruikertype/edit.php

     */
    function edit($id)
    {
        // check if the gebruikertype exists before trying to edit it
        $data['gebruikertype'] = $this->Gebruikertype_model->get_gebruikertype($id);

        if (isset($data['gebruikertype']['id'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = [
                    'beschrijving' => $this->input->post('beschrijving'),
                ];

                $this->Gebruikertype_model->update_gebruikertype($id, $params);
                redirect('gebruikertype/index');
            } else {
                $data['_view'] = 'gebruikertype/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The gebruikertype you are trying to edit does not exist.');
    }

    /**
     * Verwijdert een bestaande gebruikerstype
     *
     * @param $id de id van het gebruikerstype die verwijdert wordt
     * @see Gebruikertype_model::get_gebruikertype()
     * @see Gebruikertype_model::delete_gebruikertype()
     * @see Gebruikertype::index()
     */
    function remove($id)
    {
        $gebruikertype = $this->Gebruikertype_model->get_gebruikertype($id);

        // check if the gebruikertype exists before trying to delete it
        if (isset($gebruikertype['id'])) {
            $this->Gebruikertype_model->delete_gebruikertype($id);
            redirect('gebruikertype/index');
        } else
            show_error('The gebruikertype you are trying to delete does not exist.');
    }

}
