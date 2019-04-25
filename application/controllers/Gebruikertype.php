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

    function __construct()
    {
        parent::__construct();
        $this->load->model('Gebruikertype_model');
    }

    /*
     * Listing of gebruikertype
     */
    function index()
    {
        $data['gebruikertype'] = $this->Gebruikertype_model->get_all_gebruikertype();

        $data['_view'] = 'gebruikertype/index';
        $this->load->view('layouts/main', $data);
    }

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

    /*
     * Adding a new gebruikertype
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

    /*
     * Editing a gebruikertype
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

    /*
     * Deleting gebruikertype
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
