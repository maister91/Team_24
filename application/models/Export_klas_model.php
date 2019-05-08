<?php
/**
 * @class Klas_model
 * @brief Model-klasse voor klassen
 *
 * Model-klasse die alle methodes bevat voor de klassen
 *
 */

/**
 * @property Klas_model $klas_model
 * @property Vak_model $vak_model
 * @property Richting_model $richting_model
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
     * Haalt alle lesmomenten op en joint klas en vak
     * @return $lesmomenten
     */


    function get_all_lesmoment($aantal, $startrij)
    {
        $this->db->order_by('klasId', 'asc');
        $query = $this->db->get('lesmoment', $aantal, $startrij);
        $lesmomenten = $query->result();

        foreach ($lesmomenten as $lesmoment){
            $lesmoment->klas = $this->klas_model->get_klas_by_lesmoment($lesmoment->klasId);
            $lesmoment->vak = $this->vak_model->get_vak_by_lesmoment($lesmoment->vakId);
        }

        return $lesmomenten;
    }

    function get_all_lesmoment_for_export()
    {
        $this->db->order_by('klasId', 'asc');
        $query = $this->db->get('lesmoment');
        $lesmomenten = $query->result();

        foreach ($lesmomenten as $lesmoment){
            $lesmoment->klas = $this->klas_model->get_klas_by_lesmoment($lesmoment->klasId);
            $lesmoment->vak = $this->vak_model->get_vak_by_lesmoment($lesmoment->vakId);
        }

        return $lesmomenten;
    }

    function getCountAll()
    {
        return $this->db->count_all('lesmoment');
    }
}
