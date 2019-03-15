<?php

class Traject extends CI_Controller
{

    /* @var Traject_model */
    public $Traject_model;

    function __construct()
    {
        parent::__construct();
        $this->load->model('Traject_model');
    }

    /*
     * Listing of traject
     */
    function index()
    {
        $data['traject'] = $this->Traject_model->get_all_traject();

        $data['_view'] = 'traject/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new traject
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
