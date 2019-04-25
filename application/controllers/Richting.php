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

    function __construct()
    {
        parent::__construct();
        $this->load->model('Richting_model');
    }

    /*
     * Listing of richting
     */
    function index()
    {
        $data['richting'] = $this->Richting_model->get_all_richting();

        $data['_view'] = 'richting/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new richting
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
