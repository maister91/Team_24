<?php
/**
 * @class Gebruiker_lesmoment_model
 * @brief Model-klasse voor gebruikers die een lesmoment hebben
 *
 * Model-klasse die alle methodes bevat voor de gebruikers die een lesmoment hebben
 *
 */

class Gebruiker_lesmoment_model extends CI_Model
{
    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Haalt een gebruiker met lesmoment op uit de tabel gebruiker_lesmoment
     * @param $id de id van de gebruiker met lesmoment
     * @return Gebruiker met lesmoment
     */
    function get_gebruiker_lesmoment($id)
    {
        return $this->db->get_where('gebruiker_lesmoment',array('id'=>$id))->row_array();
    }

    /**
     * Haalt alle gebruikers met lesmoment op uit de tabel gebruiker_lesmoment
     * @return Alle gebruikers met lesmoment
     */
    function get_all_gebruiker_lesmoment()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('gebruiker_lesmoment')->result_array();
    }

    /**
     * Voegt een gebruiker met lesmoment toe aan de tabel gebruiker_lesmoment
     * @param $params de parameteres die men moet ingeven voor een nieuwe gebruiker met lesmoment
     * @return Record toegevoegd
     */
    function add_gebruiker_lesmoment($params)
    {
        $this->db->insert('gebruiker_lesmoment',$params);
        return $this->db->insert_id();
    }
    /**
     * Bewerkt een  record (gebruiker met lesmoment) in de tabel gebruiker_lesmoment
     * @param $id de id van de record dat bewerkt wordt
     * @param $params de parameteres die men moet ingeven voor de gebruiker met lesmoment aan te passen
     * @return record gewijzigd
     */
    function update_gebruiker_lesmoment($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('gebruiker_lesmoment',$params);
    }

    /**
     * Verwijdert een record (Gebruiker met lesmoment) uit aan de tabel gebruiker_lesmoment
     * @param $id de id van de record dat verwijderd wordt
     * @return record verwijderd
     */
    function delete_gebruiker_lesmoment($id)
    {
        return $this->db->delete('gebruiker_lesmoment',array('id'=>$id));
    }
}
