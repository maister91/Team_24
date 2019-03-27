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
        $data['trajecten'] = $this->Traject_model->get_all_traject();
        var_dump($trajectId = $this->input->post('keuze'));
        $gebruikerId = $this->authex->getGebruikerInfo()->id;
        var_dump($this->authex->getGebruikerInfo());

        $data['trajecten'] = $this->Traject_model->get_all_traject();


        $data['_view'] = 'traject/index';

        $this->load->view('layouts/main', $data);
    }


    function kiesTraject()
    {
        $data['trajecten'] = $this->Traject_model->get_all_traject();
        $gebruikerId = $this->authex->getGebruikerInfo()->id;
        var_dump($this->authex->getGebruikerInfo());

        if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['knop'])) {
            $knop = $this->input->post("knop");
            if ($knop == "Model traject") {
                $this->Traject_model->update_traject(1, $gebruikerId);
                $data['_view'] = 'model_landing';
                $this->load->view('layouts/main', $data);
            }
            else {
                $this->Traject_model->update_traject(2, $gebruikerId);
                $data['_view'] = 'combi_landing';
                $this->load->view('layouts/main', $data);
            }
        }
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
                    'trajectId' => $this->input->post('trajectId'))
                ;

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
