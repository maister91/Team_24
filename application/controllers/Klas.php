<?php

class Klas extends CI_Controller
{

    /* @var Klas_model */
    public $Klas_model;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Klas_model');
    }

    /*
     * Listing of klas
     */
    function index()
    {
        $data['klas'] = $this->Klas_model->get_all_klas();

        $data['_view'] = 'klas/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new klas
     */
    function add()
    {
        if (isset($_POST) && count($_POST)>0) {
            $params = [
                'naam'      => $this->input->post('naam'),
                'maxAantal' => $this->input->post('maxAantal'),
            ];

            $klas_id = $this->Klas_model->add_klas($params);
            redirect('klas/index');
        } else {
            $data['_view'] = 'klas/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a klas
     */
    function edit($id)
    {
        // check if the klas exists before trying to edit it
        $data['Klas'] = $this->Klas_model->get_klas($id);

        if (isset($data['Klas']['id'])) {
            if (isset($_POST) && count($_POST)>0) {
                $params = [
                    'naam'      => $this->input->post('naam'),
                    'maxAantal' => $this->input->post('maxAantal'),
                ];

                $this->Klas_model->update_klas($id, $params);
                redirect('klas/index');
            } else {
                $data['_view'] = 'klas/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The klas you are trying to edit does not exist.');
    }

    /*
     * Deleting klas
     */
    function remove($id)
    {
        $klas = $this->Klas_model->get_klas($id);

        // check if the klas exists before trying to delete it
        if (isset($klas['id'])) {
            $this->Klas_model->delete_klas($id);
            redirect('klas/index');
        } else
            show_error('The klas you are trying to delete does not exist.');
    }

}
