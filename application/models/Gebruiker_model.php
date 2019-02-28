<?php
/**
 * @class Gebruiker_model
 * @brief Model-klasse voor gebruikers
 *
 * Model-klasse die alle methodes bevat voor de gebruikers
 *
 */

class Gebruiker_model extends CI_Model
{
    function __construct()
    {
        /**
         * Constructor
         */
        parent::__construct();
    }

    /**
     * Haalt een gebruiker op uit de tabel Gebruiker
     * @param $id de id van de gebruiker
     * @return Gebruiker
     */
    function get_gebruiker($id)
    {
        return $this->db->get_where('gebruiker',array('id'=>$id))->row_array();
    }

    /**
     * Haalt alle gebruikers op uit de tabel Gebruiker
     * @return Alle gebruikers
     */
    function get_all_gebruiker()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('gebruiker')->result_array();
    }

    /**
     * Voegt een gebruiker toe aan de tabel Gebruiker
     * @param $params zijn de parameteres die men moet ingeven voor een nieuwe gebruiker
     * @return Record toegevoegd
     */
    function add_gebruiker($params)
    {
        $this->db->insert('gebruiker',$params);
        return $this->db->insert_id();
    }

    /**
     * Bewerkt een  record (gebruiker) in de tabel Gebruiker
     * @param $id de id van de record dat bewerkt wordt
     * @param $params de parameteres die men moet ingeven voor de gebruiker aan te passen
     * @return record gewijzigd
     */
    function update_gebruiker($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('gebruiker',$params);
    }

    /**
     * Verwijdert een record (Gebruiker) uit aan de tabel Gebruiker
     * @param $idGebruiker de id van de record dat verwijderd wordt
     * @return record verwijderd
     */
    function delete_gebruiker($id)
    {
        return $this->db->delete('gebruiker',array('id'=>$id));
    }
}
