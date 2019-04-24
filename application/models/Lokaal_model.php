<?php
/**
 * @class Lokaal_model
 * @brief Model-klasse voor lokalen
 *
 * Model-klasse die alle methodes bevat voor de lokalen
 *
 */

class Lokaal_model extends CI_Model
{
    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Haalt een lokaal op uit de tabel Lokaal
     * @param $id de id van het lokaal
     * @return Lokaal
     */
    function get_lokaal($id)
    {
        return $this->db->get_where('lokaal',array('id'=>$id))->row_array();
    }

    /**
     * Haalt alle lokalen op uit de tabel Lokaal
     * @return Alle lokalen
     */
    function get_all_lokaal()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('lokaal')->result_array();
    }

    /**
     * Voegt een lokaal toe aan de tabel Lokaal
     * @param $params zijn de parameteres die men moet ingeven voor een nieuw lokaal
     * @return Record toegevoegd
     */
    function add_lokaal($params)
    {
        $this->db->insert('lokaal',$params);
        return $this->db->insert_id();
    }

    /**
     * Bewerkt een  record (lokaal) in de tabel Lokaal
     * @param $id de id van de record dat bewerkt wordt
     * @param $params de parameteres die men moet ingeven voor het lokaal aan te passen
     * @return record gewijzigd
     */
    function update_lokaal($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('lokaal',$params);
    }

    /**
     * Verwijdert een record (lokaal) uit aan de tabel Lokaal
     * @param $id de id van de record dat verwijderd wordt
     * @return record verwijderd
     */
    function delete_lokaal($id)
    {
        return $this->db->delete('lokaal',array('id'=>$id));
    }
}
