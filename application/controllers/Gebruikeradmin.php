<?php

/**
 * @property Template $template
 * @property Gebruiker_model $gebruiker_model
 * @property Afspraak_model $afspraak_model
 * @property Klas_model $klas_model
 * @property Traject_model $traject_model
 * @property Gebruikertype_model $gebruikertype_model
 */
class Gebruikeradmin extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('gebruiker_model');
    }

    /*
     * Listing of gebruikers
     */
    function index()
    {

        $data['gebruikers'] = $this->gebruiker_model->get_all_gebruikerby_type();

        $data['_view'] = 'gebruikeradmin/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new gebruiker
     */
    function add()
    {
        $hash = password_hash($this->input->post('paswoord'), PASSWORD_DEFAULT);
        if(isset($_POST) && count($_POST) > 0)
        {
            $params = array(
                'gebruikertypeId' => $this->input->post('gebruikertypeId'),
                'klasId' => $this->input->post('klasId'),
                'trajectId' => $this->input->post('trajectId'),
                'afspraakId' => $this->input->post('afspraakId'),
                'voornaam' => $this->input->post('voornaam'),
                'achternaam' => $this->input->post('achternaam'),
                'email' => $this->input->post('email'),
                'paswoord' => $hash,
            );

            $gebruiker_id = $this->gebruiker_model->add_gebruiker($params);
            redirect('gebruikeradmin/index');
        }
        else
        {
            $this->load->model('Gebruikertype_model');
            $data['all_gebruikertype'] = $this->gebruikertype_model->get_all_gebruikertype();

            $this->load->model('Klas_model');
            $data['all_klassen'] = $this->klas_model->get_all_klassen();

            $this->load->model('Traject_model');
            $data['all_traject'] = $this->traject_model->get_all_traject();

            $this->load->model('Afspraak_model');
            $data['all_afspraak'] = $this->afspraak_model->get_all_afspraak();

            $data['_view'] = 'gebruikeradmin/add';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Editing a gebruiker
     */
    function edit($id)
    {
        // check if the gebruiker exists before trying to edit it
        $data['gebruiker'] = $this->gebruiker_model->get_gebruiker($id);

        if(isset($data['gebruiker']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                $params = array(
                    'gebruikertypeId' => $this->input->post('gebruikertypeId'),
                    'klasId' => $this->input->post('klasId'),
                    'trajectId' => $this->input->post('trajectId'),
                    'afspraakId' => $this->input->post('afspraakId'),
                    'voornaam' => $this->input->post('voornaam'),
                    'achternaam' => $this->input->post('achternaam'),
                    'email' => $this->input->post('email'),
                    'paswoord' => $this->input->post('paswoord'),
                );

                $this->gebruiker_model->update_gebruiker($id,$params);
                redirect('gebruikeradmin/index');
            }
            else
            {
                $this->load->model('Gebruikertype_model');
                $data['all_gebruikertype'] = $this->gebruikertype_model->get_all_gebruikertype();

                $this->load->model('Klas_model');
                $data['all_klassen'] = $this->klas_model->get_all_klassen();

                $this->load->model('Traject_model');
                $data['all_traject'] = $this->traject_model->get_all_traject();

                $this->load->model('Afspraak_model');
                $data['all_afspraak'] = $this->afspraak_model->get_all_afspraak();

                $data['_view'] = 'gebruikeradmin/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The gebruiker you are trying to edit does not exist.');
    }

    /*
     * Deleting gebruiker
     */
    function remove($id)
    {
        $gebruiker = $this->gebruiker_model->get_gebruiker($id);

        // check if the gebruiker exists before trying to delete it
        if(isset($gebruiker['id']))
        {
            $this->gebruiker_model->delete_gebruiker($id);
            redirect('gebruikeradmin/index');
        }
        else
            show_error('The gebruiker you are trying to delete does not exist.');
    }

}
