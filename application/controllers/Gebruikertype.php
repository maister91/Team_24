<?php
/**
 * @class Gebruikertype
 * @brief Controller-klasse voor Gebruikertypes
 *
 * Controller-klasse waar de methodes inzitten voor:
 * -Na het inloggen de gebruiker naar de juiste pagina door te sturen
 */

/**
 * @property Template $template
 * @property Gebruikertype_model $gebruikertype_model
 */

class Gebruikertype extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('gebruikertype_model');
    }

    /*
     * Listing of gebruikertype
     */
    function index()
    {
        $data['gebruikertype'] = $this->gebruikertype_model->get_all_gebruikertype();

        $data['_view'] = 'gebruikertype/index';
        $this->load->view('layouts/main', $data);
    }

    function docent()
    {
        $data['gebruikertype'] = $this->gebruikertype_model->get_all_gebruikertype();

        $data['_view'] = 'docent_landing';
        $this->load->view('layouts/main', $data);
    }

    function isp()
    {
        $data['gebruikertype'] = $this->gebruikertype_model->get_all_gebruikertype();

        $data['_view'] = 'isp_landing';
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

            $gebruikertype_id = $this->gebruikertype_model->add_gebruikertype($params);
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
        $data['gebruikertype'] = $this->gebruikertype_model->get_gebruikertype($id);

        if (isset($data['gebruikertype']['id'])) {
            if (isset($_POST) && count($_POST)>0) {
                $params = [
                    'beschrijving' => $this->input->post('beschrijving'),
                ];

                $this->gebruikertype_model->update_gebruikertype($id, $params);
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
        $gebruikertype = $this->gebruikertype_model->get_gebruikertype($id);

        // check if the gebruikertype exists before trying to delete it
        if (isset($gebruikertype['id'])) {
            $this->gebruikertype_model->delete_gebruikertype($id);
            redirect('gebruikertype/index');
        } else
            show_error('The gebruikertype you are trying to delete does not exist.');
    }

}
