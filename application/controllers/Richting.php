<?php

/**
 * @class Richting
 * @brief Controller-klasse voor Richting
 *
 * Controller-klasse met alle methodes voor de richtingen
 */

class Richting extends CI_Controller
{

    /* @var Richting_model */
    public $Richting_model;

    /**
     * Richting constructor.
     */

    function __construct()
    {
        parent::__construct();
        $this->load->model('Richting_model');
    }


    /**
     * Geeft een lijst weer met alle richtingen
     *
     * @see Richting_model::get_all_richting()
     * @see richting/index.php
     */

    function index()
    {
        $data['richting'] = $this->Richting_model->get_all_richting();

        $data['_view'] = 'richting/index';
        $this->load->view('layouts/main', $data);
    }

    /**
     * Voegt een nieuwe richting toe
     *
     * @see Richting_model::add_richting()
     * @see richting/index.php
     * @see richting/add.php
     */

    function add()
    {
        if (isset($_POST) && count($_POST)>0) {
            $params = [
                'naam' => $this->input->post('naam'),
            ];

            $richting_id = $this->Richting_model->add_richting($params);
            redirect('richting/index');
        } else {
            $data['_view'] = 'richting/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a richting
     */

    /**
     * Een richting wijzigen
     *
     * @param $id Het id van de richting die getoond wordt
     * @see Richting_model::get_richting()
     * @see Richting_model::update_richting()
     * @see richting/index.php
     * @see richting/edit.php
     */

    function edit($id)
    {
        // check if the richting exists before trying to edit it
        $data['richting'] = $this->Richting_model->get_richting($id);

        if (isset($data['richting']['id'])) {
            if (isset($_POST) && count($_POST)>0) {
                $params = [
                    'naam' => $this->input->post('naam'),
                ];

                $this->Richting_model->update_richting($id, $params);
                redirect('richting/index');
            } else {
                $data['_view'] = 'richting/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The richting you are trying to edit does not exist.');
    }

    /*
     * Deleting richting
     */

    /**
     * Verwijdert een richting
     *
     * @param $id Het id van de richting die wordt verwijderd
     * @see Richting_model::get_richting()
     * @see Richting_model::delete_richting()
     * @see richting/index.php
     */

    function remove($id)
    {
        $richting = $this->Richting_model->get_richting($id);

        // check if the richting exists before trying to delete it
        if (isset($richting['id'])) {
            $this->Richting_model->delete_richting($id);
            redirect('richting/index');
        } else
            show_error('The richting you are trying to delete does not exist.');
    }

}
