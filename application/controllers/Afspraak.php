<?php

/**
 * @class Afspraak
 * @brief Controller-klasse voor afspraken
 *
 * Controller-klasse met alle methodes die gebruikt worden voor afspraken
 */
class Afspraak extends CI_Controller
{
    /* @var Afspraak_model */
    public $Afspraak_model;

    function __construct()
    {
        parent::__construct();
        $this->load->model('Afspraak_model');
    }

    /**
     * Toont de index pagina van afspraken
     *
     * @see Afspraak_model::get_all_afspraak()
     * @see afspraak/index.php
     */
    function index()
    {
        $data['afspraak'] = $this->Afspraak_model->get_all_afspraak();

        $data['_view'] = 'afspraak/index';
        $this->load->view('layouts/main', $data);
    }

    /**
     * Voegt een afspraak toe
     *
     * @see Afspraak_model::add_afspraak()
     * @see afspraak/index.php
     * @see afpraak/add.php
     */
    function add()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $params = [
                'studentId' => $this->input->post('studentId'),
                'docentId' => $this->input->post('docentId'),
                'lokaalId' => $this->input->post('lokaalId'),
                'tijdslot' => $this->input->post('tijdslot'),
            ];

            $afspraak_id = $this->Afspraak_model->add_afspraak($params);
            redirect('afspraak/index');
        } else {
            $data['_view'] = 'afspraak/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /**
     * Wijzigt de gegevens van een afspraak
     *
     * @param $id id van de afspraak
     * @see Afspraak_model::get_afspraak()
     * @see Afspraak_model::update_afspraak()
     * @see afspraak/index.php
     * @see afspraak/edit.php
     */
    function edit($id)
    {
        // check if the afspraak exists before trying to edit it
        $data['afspraak'] = $this->Afspraak_model->get_afspraak($id);

        if (isset($data['afspraak']['id'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = [
                    'studentId' => $this->input->post('studentId'),
                    'docentId' => $this->input->post('docentId'),
                    'lokaalId' => $this->input->post('lokaalId'),
                    'tijdslot' => $this->input->post('tijdslot'),
                ];

                $this->Afspraak_model->update_afspraak($id, $params);
                redirect('afspraak/index');
            } else {
                $data['_view'] = 'afspraak/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The afspraak you are trying to edit does not exist.');
    }

    /**
     * Verwijdert een afspraak met de opgegeven id
     * @param $id de id van de afspraak
     *
     * @see Afspraak_model::get_afspraak()
     * @see Afspraak_model::delete_afspraak()
     * @see afspraak/index.php
     */
    function remove($id)
    {
        $afspraak = $this->Afspraak_model->get_afspraak($id);

        // check if the afspraak exists before trying to delete it
        if (isset($afspraak['id'])) {
            $this->Afspraak_model->delete_afspraak($id);
            redirect('afspraak/index');
        } else
            show_error('The afspraak you are trying to delete does not exist.');
    }

    public function registreer()
    {
        $id = $this->input->post('id');

        $afspraak = new stdClass();
        $afspraak->id = $id;
        $afspraak->studentId = $this->input->post('studentId');
        $afspraak->docentId = $this->input->post('docentId');
        $afspraak->lokaalId = $this->input->post('lokaalId');
        $afspraak->tijdslot = $this->input->post('tijdslot');

        $this->load->model('Afspraak_model');

        redirect('/Klas/index_beheren');
    }
}