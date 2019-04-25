<?php
/**
 * @class Export_klas_model
 * @brief Model-klasse voor klassen te exporteren
 *
 * Model-klasse die alle methodes bevat voor de klassen te exporteren
 *
 */

class Export_klas_model extends CI_Model
{
    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('klas_model');
        $this->load->model('vak_model');
        $this->load->model('richting_model');
    }

    /**
     * Haalt alle klassen op uit de tabel Klas
     * @return $lesmomenten
     */


    function get_all_lesmoment()
    {
        $this->db->order_by('klasId', 'asc');
        $query = $this->db->get('lesmoment');
        $lesmomenten = $query->result();

        foreach ($lesmomenten as $lesmoment){
            $lesmoment->klas = $this->klas_model->get_klas($lesmoment->klasId);
            $lesmoment->vak = $this->vak_model->get_vak($lesmoment->vakId);
        }
        return $lesmomenten;
    }
}
