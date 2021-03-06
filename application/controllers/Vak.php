<?php

class Vak extends CI_Controller
{

    /* @var Vak_model */
    public $Vak_model;

    function __construct()
    {
        parent::__construct();
        $this->load->model('Vak_model');
    }

    /*
     * Listing of vak
     */
    function index()
    {
        $data['vak'] = $this->Vak_model->get_all_vak();

        $data['_view'] = 'vak/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new vak
     */
    function add()
    {
        if (isset($_POST) && count($_POST)>0) {
            $params = [
                'richtingId'   => $this->input->post('richtingId'),
                'naam'         => $this->input->post('naam'),
                'beschrijving' => $this->input->post('beschrijving'),
                'studiepunt'   => $this->input->post('studiepunt'),
                'fase'         => $this->input->post('fase'),
            ];

            $vak_id = $this->Vak_model->add_vak($params);
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
        $data['vak'] = $this->Vak_model->get_vak($id);

        if (isset($data['vak']['id'])) {
            if (isset($_POST) && count($_POST)>0) {
                $params = [
                    'richtingId'   => $this->input->post('richtingId'),
                    'naam'         => $this->input->post('naam'),
                    'beschrijving' => $this->input->post('beschrijving'),
                    'studiepunt'   => $this->input->post('studiepunt'),
                    'fase'         => $this->input->post('fase'),
                ];

                $this->Vak_model->update_vak($id, $params);
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
        $vak = $this->Vak_model->get_vak($id);

        // check if the vak exists before trying to delete it
        if (isset($vak['id'])) {
            $this->Vak_model->delete_vak($id);
            redirect('vak/index');
        } else
            show_error('The vak you are trying to delete does not exist.');
    }

}
