<?php
/**
 * @class Gebruikertype_model
 * @brief Model-klasse voor de gebruikertype
 *
 * Model-klasse die alle methodes bevat voor de gebruikertype
 *
 */

class Gebruikertype_model extends CI_Model
{
    function __construct()
    {
        /**
         * Constructor
         */
        parent::__construct();
    }

    /**
     * Haalt een gebruikerstype met lesmoment op uit de tabel Gebruikertype
     * @param $id de id van de gebruikertype
     * @return Gebruikertype
     */
    function get_gebruikertype($id)
    {
        return $this->db->get_where('gebruikertype',array('id'=>$id))->row_array();
    }

    /**
     * Haalt alle gebruikerstypes op uit de tabel Gebruikertype
     * @return Alle gebruikertypes
     */
    function get_all_gebruikertype()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('gebruikertype')->result_array();
    }

    /**
     * Voegt een gebruikertype toe aan de tabel Gebruikertype
     * @param $params de parameteres die men moet ingeven voor een nieuwe gebruikertype
     * @return Record toegevoegd
     */
    function add_gebruikertype($params)
    {
        $this->db->insert('gebruikertype',$params);
        return $this->db->insert_id();
    }

    /**
     * Bewerkt een  record (gebruikertype) in de tabel Gebruikertype
     * @param $id de id van de record dat bewerkt wordt
     * @param $params de parameteres die men moet ingeven voor de gebruikertype aan te passen
     * @return record gewijzigd
     */
    function update_gebruikertype($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('gebruikertype',$params);
    }

    /**
     * Verwijdert een record (Gebruikertype) uit aan de tabel Gebruikertype
     * @param $id de id van de record dat verwijderd wordt
     * @return record verwijderd
     */
    function delete_gebruikertype($id)
    {
        return $this->db->delete('gebruikertype',array('id'=>$id));
    }
}
