<?php

/**
 * @property Template $template
 * @property Richting_model $richting_model
 */

class Richting extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('richting_model');
    }

    /*
     * Listing of richting
     */
    function index()
    {
        $data['richting'] = $this->richting_model->get_all_richting();

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

            $richting_id = $this->richting_model->add_richting($params);
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
        $data['richting'] = $this->richting_model->get_richting($id);

        if (isset($data['richting']['id'])) {
            if (isset($_POST) && count($_POST)>0) {
                $params = [
                    'naam' => $this->input->post('naam'),
                ];

                $this->richting_model->update_richting($id, $params);
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
        $richting = $this->richting_model->get_richting($id);

        // check if the richting exists before trying to delete it
        if (isset($richting['id'])) {
            $this->richting_model->delete_richting($id);
            redirect('richting/index');
        } else
            show_error('The richting you are trying to delete does not exist.');
    }

}
