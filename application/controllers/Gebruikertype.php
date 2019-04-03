<?php

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

    /*
     * Adding a new gebruikertype
     */
    function add()
    {
        if (isset($_POST) && count($_POST)>0) {
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
            if (isset($_POST) && count($_POST)>0) {
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
