<?php
/**
 * @class Traject_aanduiden_model
 * @brief Model-klasse voor trajecten aan te duiden of aan te passen
 *
 * Model-klasse die alle methodes bevat voor het traject aan te duiden of aan te passen
 *
 */

class Traject_aanduiden_model extends CI_Model
{
    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
    }

    function update_gebruiker($gebruiker)
    {
        $this->load->helper('form');
        $this->db->where('id',$gebruiker->id);
        return $this->db->update('gebruiker',$gebruiker);
    }
}