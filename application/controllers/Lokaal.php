<?php

/**
 * @class Lokaal
 * @brief Controller-klasse voor Lokaal
 *
 * Controller-klasse met alle methodes voor de lokalen
 */

class Lokaal extends CI_Controller
{

    /* @var Lokaal_model */
    public $Lokaal_model;

    /**
     * Lokaal constructor.
     */

    function __construct()
    {
        parent::__construct();
        $this->load->model('Lokaal_model');
    }

    /**
     * Toont een lijst met de lokalen
     *
     * @see Lokaal_model::get_all_lokaal()
     * @ see lokaal/index.php
     */

    function index()
    {
        $data['lokaal'] = $this->Lokaal_model->get_all_lokaal();

        $data['_view'] = 'lokaal/index';
        $this->load->view('layouts/main', $data);
    }

    /**
     * Voegt een nieuw lokaal toe
     *
     * @see Lokaal_model::add_lokaal()
     * @see lokaal/index.php
     * @see lokaal/add.php
     */

    function add()
    {
        if (isset($_POST) && count($_POST)>0) {
            $params = [
                'naam' => $this->input->post('naam'),
            ];

            $lokaal_id = $this->Lokaal_model->add_lokaal($params);
            redirect('lokaal/index');
        } else {
            $data['_view'] = 'lokaal/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a lokaal
     */

    /**
     * Wijzigt een lokaal
     *
     * @param $id Het id van het lokaal dat wordt gewijzigd
     *
     * @see Lokaal_model::get_lokaal()
     * @see Lokaal_model::update_lokaal()
     * @see lokaal/idnex.php
     * @see lokaal/edit.php
     */

    function edit($id)
    {
        // check if the lokaal exists before trying to edit it
        $data['lokaal'] = $this->Lokaal_model->get_lokaal($id);

        if (isset($data['lokaal']['id'])) {
            if (isset($_POST) && count($_POST)>0) {
                $params = [
                    'naam' => $this->input->post('naam'),
                ];

                $this->Lokaal_model->update_lokaal($id, $params);
                redirect('lokaal/index');
            } else {
                $data['_view'] = 'lokaal/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The lokaal you are trying to edit does not exist.');
    }

    /*
     * Deleting lokaal
     */

    /**
     * Verwijderd een lokaal
     *
     * @param $id Het id van het lokaal dat verwijderd wordt
     *
     * @see Lokaal_model::get_lokaal()
     * @see Lokaal_model::delete_lokaal()
     * @see lokaal/index.php
     */
    
    function remove($id)
    {
        $lokaal = $this->Lokaal_model->get_lokaal($id);

        // check if the lokaal exists before trying to delete it
        if (isset($lokaal['id'])) {
            $this->Lokaal_model->delete_lokaal($id);
            redirect('lokaal/index');
        } else
            show_error('The lokaal you are trying to delete does not exist.');
    }

}
