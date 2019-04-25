<?php

/**
 * @class Traject
 * @brief Controller-klasse voor Traject
 *
 * Controller-klasse met alle methodes voor de trajecten
 */
class Traject extends CI_Controller
{

    /* @var Traject_model */
    public $Traject_model;

    /**
     * Traject constructor.
     */

    function __construct()
    {
        parent::__construct();
        $this->load->model('Traject_model');
    }

    /*
     * Listing of traject
     */

    /**
     * Toont lijst met alle trajecten
     * @see Traject_model::get_all_traject()
     * @see traject/index.php
     */

    function index()
    {
        $data['titel'] = '';
        $data['ontwikkelaar'] = 'Simon Smedts';
        $data['tester'] = 'Melih Doksanbir';
        $data['trajecten'] = $this->Traject_model->get_all_traject();

        $partials = ['hoofding' => 'main_header',
            'inhoud' => 'traject/index',
            'voetnoot' => 'main_footer'];

        $this->template->load('main_master', $partials, $data);
    }


    /**
     * Maken van keuze traject
     * @see Traject_model::get_all_traject()
     * @see authex::getGebruikerInfo()
     * @see Traject_model::update_traject()
     * @see model_landing.php
     * @see combi_landing.php
     *
     */

    function kiesTraject()
    {
        $data['trajecten'] = $this->Traject_model->get_all_traject();
        $gebruikerId = $this->authex->getGebruikerInfo()->id;

        if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['knop'])) {
            $knop = $this->input->post("knop");
            if ($knop == "Model traject") {
                $this->Traject_model->update_traject(1, $gebruikerId);
                $data['titel'] = 'Model student landing page';
                $partials = ['hoofding' => 'main_header',
                    'inhoud' => 'model_landing',
                    'voetnoot' => 'main_footer'];

                $this->template->load('main_master', $partials, $data);
            }
            else if ($knop == "Combi traject"){
                $this->Traject_model->update_traject(2, $gebruikerId);
                $data['titel'] = 'Combi student landing page';
                $partials = ['hoofding' => 'main_header',
                    'inhoud' => 'combi_landing',
                    'voetnoot' => 'main_footer'];

                $this->template->load('main_master', $partials, $data);
            }
        }
    }

    /**
     * Maken van keuze traject
     * @param $id Het id van de gebruiker die een traject gaat kiezen
     * @see Gebruiker_model::getGebruiker()
     * @see Gebruiker_model::update_gebruiker()
     * @see Traject::trajectaanduiden
     * @see gebruiker/edit.php
     */

    function keuzeTraject($id)
    {
        // check if the gebruiker exists before trying to edit it
        $data['gebruiker'] = $this->Gebruiker_model->get_gebruiker($id);

        if(isset($data['gebruiker']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                $params = array(
                    'gebruikertypeId' => $this->input->post('gebruikertypeId'),
                    'trajectId' => $this->input->post('trajectId'))
                ;

                $this->Gebruiker_model->update_gebruiker($id,$params);
                redirect('traject_aanduiden');
            }
            else
            {
                $data['_view'] = 'gebruiker/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The gebruiker you are trying to edit does not exist.');
    }

    /**
     * Voegt een nieuw traject toe
     *
     * @see Traject_model::add_traject()
     * @see Traject::index()
     * @see traject/add.php
     */

    function add()
    {
        if (isset($_POST) && count($_POST)>0) {
            $params = [
                'naam'         => $this->input->post('naam'),
                'beschrijving' => $this->input->post('beschrijving'),
            ];

            $traject_id = $this->Traject_model->add_traject($params);
            redirect('traject/index');
        } else {
            $data['_view'] = 'traject/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a traject
     */

    /**
     * Het wijzigen van een traject
     *
     * @param $id Het id van het huidige traject
     * @see Traject_model::get_traject()
     * @see Traject_model::update_traject()
     * @see Traject::index()
     * @see traject/edit.php
     */

    function edit($id)
    {
        // check if the traject exists before trying to edit it
        $data['traject'] = $this->Traject_model->get_traject($id);

        if (isset($data['traject']['id'])) {
            if (isset($_POST) && count($_POST)>0) {
                $params = [
                    'naam'         => $this->input->post('naam'),
                    'beschrijving' => $this->input->post('beschrijving'),
                ];

                $this->Traject_model->update_traject($id, $params);
                redirect('traject/index');
            } else {
                $data['_view'] = 'traject/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The traject you are trying to edit does not exist.');
    }

    /*
     * Deleting traject
     */

    /**
     * Het verwijderen van een traject
     *
     * @param $id Het id van het traject dat wordt verwijderd
     * @see Traject_model::get_traject()
     * @see Traject_model::delete_traject()
     * @see Traject::index()
     */

    function remove($id)
    {
        $traject = $this->Traject_model->get_traject($id);

        // check if the traject exists before trying to delete it
        if (isset($traject['id'])) {
            $this->Traject_model->delete_traject($id);
            redirect('traject/index');
        } else
            show_error('The traject you are trying to delete does not exist.');
    }

}
