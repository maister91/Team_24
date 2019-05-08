<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2/05/2019
 * Time: 15:36
 */

class Gebruikeradmin_model extends CI_Model
{
    public function __construct()
    {
        /**
         * Constructor
         */
        parent::__construct();
        $this->load->model('klas_model');
        $this->load->model('gebruikertype_model');
        $this->load->model('traject_model');
    }

    /**
     * Haalt alle studenten op uit de tabel Gebruiker gesorteerd op gebruikerstype
     * @return Alle gebruikers gesorteerd op gebruikerstype
     */
    function get_all_studenten()
    {
        $this->db->order_by('gebruikertypeId', 'asc');
        $this->db->where('gebruikertypeId <=', 2);
        $query = $this->db->get('gebruiker');
        $studenten = $query->result();

        foreach ($studenten as $student) {
            if ($student->klasId != null)
            {
                $student->klas = $this->klas_model->get_klas($student->klasId);
            }
            else {
                $student->klas = null;
            }

            if ($student->gebruikertypeId != null)
            {
                $student->gebruikertype = $this->gebruikertype_model->get_gebruikertype_object($student->gebruikertypeId);
            }
            else {
                $student->gebruikertype = null;
            }

            if ($student->trajectId != null)
            {
                $student->traject = $this->traject_model->get($student->trajectId);
            }
            else {
                $student->traject = null;
            }


        }

        return $studenten;
    }
}