<?php

/**
 * @property Template $template
 * @property Vak_model $vak_model
 */

class Vak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('vak_model');
    }

    /*
     * Listing of vak
     */
    function index()
    {
        $data['vak'] = $this->vak_model->get_all_vak();

        $data['_view'] = 'vak/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new vak
     */
    function add()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $params = [
                'richtingId' => $this->input->post('richtingId'),
                'naam' => $this->input->post('naam'),
                'beschrijving' => $this->input->post('beschrijving'),
                'studiepunt' => $this->input->post('studiepunt'),
                'fase' => $this->input->post('fase'),
            ];

            $vak_id = $this->vak_model->add_vak($params);
            redirect('vak/index');
        } else {
            $data['_view'] = 'vak/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a vak
     */
    function edit($id)
    {
        // check if the vak exists before trying to edit it
        $data['vak'] = $this->vak_model->get_vak($id);

        if (isset($data['vak']['id'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = [
                    'richtingId' => $this->input->post('richtingId'),
                    'naam' => $this->input->post('naam'),
                    'beschrijving' => $this->input->post('beschrijving'),
                    'studiepunt' => $this->input->post('studiepunt'),
                    'fase' => $this->input->post('fase'),
                ];

                $this->vak_model->update_vak($id, $params);
                redirect('vak/index');
            } else {
                $data['_view'] = 'vak/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The vak you are trying to edit does not exist.');
    }

    /*
     * Deleting vak
     */
    function remove($id)
    {
        $vak = $this->vak_model->get_vak($id);

        // check if the vak exists before trying to delete it
        if (isset($vak['id'])) {
            $this->vak_model->delete_vak($id);
            redirect('vak/index');
        } else
            show_error('The vak you are trying to delete does not exist.');
    }

}
