<?php

class Traject_aanduiden extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Traject_aanduiden_model');
    }

    function index()
    {
        $data['_view'] = 'traject/index';
        $this->load->view('layouts/main', $data);
    }

    function keuzeTraject($id)
    {
        // check if the gebruiker exists before trying to edit it
        $data['gebruiker'] = $this->Gebruiker_model->get_gebruiker($id);

        if(isset($data['gebruiker']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                $params = array(
                    'gebruikertypeId' => $this->input->post('gebruikertypeId'),
                    'trajectId' => $this->input->post('trajectId'),
                );

                $this->Gebruiker_model->update_gebruiker($id,$params);
                redirect('traject_aanduiden');
            }
            else
            {
                $data['_view'] = 'gebruiker/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The gebruiker you are trying to edit does not exist.');
    }
}