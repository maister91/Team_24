<?php

class Afspraak extends CI_Controller
{
    /* @var Afspraak_model */
    public $Afspraak_model;

    function __construct()
    {
        parent::__construct();
        $this->load->model('Afspraak_model');
    }

    /*
     * Listing of afspraak
     */
    function index()
    {
        $data['afspraak'] = $this->Afspraak_model->get_all_afspraak();

        $data['_view'] = 'afspraak/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new afspraak
     */
    function add()
    {
        if (isset($_POST) && count($_POST)>0) {
            $params = [
                'studentId' => $this->input->post('studentId'),
                'docentId'  => $this->input->post('docentId'),
                'lokaalId'  => $this->input->post('lokaalId'),
                'tijdslot'  => $this->input->post('tijdslot'),
            ];

            $afspraak_id = $this->Afspraak_model->add_afspraak($params);
            redirect('afspraak/index');
        } else {
            $data['_view'] = 'afspraak/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a afspraak
     */
    function edit($id)
    {
        // check if the afspraak exists before trying to edit it
        $data['afspraak'] = $this->Afspraak_model->get_afspraak($id);

        if (isset($data['afspraak']['id'])) {
            if (isset($_POST) && count($_POST)>0) {
                $params = [
                    'studentId' => $this->input->post('studentId'),
                    'docentId'  => $this->input->post('docentId'),
                    'lokaalId'  => $this->input->post('lokaalId'),
                    'tijdslot'  => $this->input->post('tijdslot'),
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

    /*
     * Deleting afspraak
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

    /* gebruiken voor afpraak maken joinen

     * Haalt een klas op uit de tabel Klas
     * @param $id de id van de klas
     * @return klas

    function get_klas()
    {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('klas');
        $klassen = $query->result();

        foreach($klassen as $klas){
            $klas->gebruiker = $this->gebruiker_model->get_all_gebruiker($klas->id);
        }

        return $klassen;
        */
    }

}

