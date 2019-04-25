<?php

/**
 * @class Gebruikeradmin
 * @brief Controller-klasse voor Gebruikeradmin
 *
 * Controller-klasse met alle methodes voor de gebruikeradmin
 */

class Gebruikeradmin extends CI_Controller{
    /**
     * Gebruikeradmin constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('Gebruiker_model');
    }


    /**
     * toont de indexpagina van de admin gebruiker
     *
     * @see Gebruiker_model::get_all_gebruikerby_type()
     * @see gebruikeradmin/index.php
     */
    function index()
    {
        $data['gebruikers'] = $this->Gebruiker_model->get_all_gebruikerby_type();
        $data['_view'] = 'gebruikeradmin/index';
        $this->load->view('layouts/main',$data);
    }

    /**
     * voegt een nieuwe admin gebruiker toe (aan de databank)
     *
     * @see Gebruiker_model::add_gebruiker()
     * @see Gebruikertype_model::get_all_gebruikertype()
     * @see Klas_model::get_all_klassen()
     * @see Traject_model::get_all_traject()
     * @see Afspraak_model::get_all_afspraak()
     * @see Gebruikeradmin::index
     * @see gebruikeradmin/add.php
     */
    function add()
    {
        $hash = password_hash($this->input->post('paswoord'), PASSWORD_DEFAULT);
        if(isset($_POST) && count($_POST) > 0)
        {
            $params = array(
                'gebruikertypeId' => $this->input->post('gebruikertypeId'),
                'klasId' => $this->input->post('klasId'),
                'trajectId' => $this->input->post('trajectId'),
                'afspraakId' => $this->input->post('afspraakId'),
                'voornaam' => $this->input->post('voornaam'),
                'achternaam' => $this->input->post('achternaam'),
                'email' => $this->input->post('email'),
                'paswoord' => $hash,
            );
            $gebruiker_id = $this->Gebruiker_model->add_gebruiker($params);
            redirect('gebruikeradmin/index');
        }
        else
        {
            $this->load->model('Gebruikertype_model');
            $data['all_gebruikertype'] = $this->Gebruikertype_model->get_all_gebruikertype();
            $this->load->model('Klas_model');
            $data['all_klassen'] = $this->Klas_model->get_all_klassen();
            $this->load->model('Traject_model');
            $data['all_traject'] = $this->Traject_model->get_all_traject();
            $this->load->model('Afspraak_model');
            $data['all_afspraak'] = $this->Afspraak_model->get_all_afspraak();
            $data['_view'] = 'gebruikeradmin/add';
            $this->load->view('layouts/main',$data);
        }
    }

    /**
     * Wijzigt de gegevens van admin gebruiker
     *
     * @param $id de id van de admin die gewijzigd moet worden
     * @see Gebruiker_model::getGebruiker()
     * @see Gebruikertype_model::get_all_gebruikertype()
     * @see Klas_model::get_all_klassen()
     * @see Traject_model::get_all_traject()
     * @see Afspraak_model::get_all_afspraak()
     * @see gebruikeradmin/index.php
     * @see gebruikeradmin/edit.php
     *
     */
    function edit($id)
    {
        // check if the gebruiker exists before trying to edit it
        $data['gebruiker'] = $this->Gebruiker_model->get_gebruiker($id);
        if(isset($data['gebruiker']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                $params = array(
                    'gebruikertypeId' => $this->input->post('gebruikertypeId'),
                    'klasId' => $this->input->post('klasId'),
                    'trajectId' => $this->input->post('trajectId'),
                    'afspraakId' => $this->input->post('afspraakId'),
                    'voornaam' => $this->input->post('voornaam'),
                    'achternaam' => $this->input->post('achternaam'),
                    'email' => $this->input->post('email'),
                    'paswoord' => $this->input->post('paswoord'),
                );
                $this->Gebruiker_model->update_gebruiker($id,$params);
                redirect('gebruikeradmin/index');
            }
            else
            {
                $this->load->model('Gebruikertype_model');
                $data['all_gebruikertype'] = $this->Gebruikertype_model->get_all_gebruikertype();
                $this->load->model('Klas_model');
                $data['all_klassen'] = $this->Klas_model->get_all_klassen();
                $this->load->model('Traject_model');
                $data['all_traject'] = $this->Traject_model->get_all_traject();
                $this->load->model('Afspraak_model');
                $data['all_afspraak'] = $this->Afspraak_model->get_all_afspraak();
                $data['_view'] = 'gebruikeradmin/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The gebruiker you are trying to edit does not exist.');
    }

    /**
     * Verwijdert een admin gebruiker
     *
     * @param $id de id van de admin gebruiker die verwijdert wordt
     * @see Gebruiker_model::getGebruiker()
     * @see Gebruiker_model::delete_gebruiker()
     * @see gebruikeradmin::index()
     */
    function remove($id)
    {
        $gebruiker = $this->Gebruiker_model->get_gebruiker($id);
        // check if the gebruiker exists before trying to delete it
        if(isset($gebruiker['id']))
        {
            $this->Gebruiker_model->delete_gebruiker($id);
            redirect('gebruikeradmin/index');
        }
        else
            show_error('The gebruiker you are trying to delete does not exist.');
    }
}