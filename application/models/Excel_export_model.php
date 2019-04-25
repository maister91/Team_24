<?php
/**
 * @class Excel_export_model
 * @brief Model-klasse voor Excel export
 *
 * Model-klasse die alle methodes bevat voor het exporteren van excel bestanden
 */
class Excel_export_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Haalt de gegevens voor export uit de databank
     */
    function fetch_data()
    {
        $this->db->order_by("id", "desc");
        $query = $this->db->get("gebruiker");
        return $query->result();
    }
}