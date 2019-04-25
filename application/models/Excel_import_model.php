<?php
/**
 * @class Excel_import_model
 * @brief Model-klasse voor Excel import
 *
 * Model-klasse die alle methodes bevat voor het importeren van excel bestanden
 */

class Excel_import_model extends CI_Model
{
    /**
     * Selecteert gegevens voor de import
     */
    function select()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('lesmoment');
        return $query;
    }



}