<?php

/**
 * @class Excel_import_model
 * @brief Model-klasse voor excel te importeren
 *
 * Model-klasse die mathodes bevat waar worden opgevraagd
 *
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