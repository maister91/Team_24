<?php
/**
 * @class Vak_model
 * @brief Model-klasse voor Vakken
 *
 * Model-klasse die alle methodes bevat voor de vakken
 *
 */

class Vak_model extends CI_Model
{
    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Haalt een vak op uit de tabel Vak
     * @param $id de id van het vak
     * @return Vak
     */
    function get_vak($id)
    {
        $this->db->where($id, 'id');
        $query = $this->db->get('vak',array('id'=>$id))->row_array();
        return $query->row();
    }

    /**
     * Haalt alle vakken op uit de tabel Vak
     * @return Alle vakken
     */
    function get_all_vak($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('vak');
        return $query->row();
    }

    /**
     * Voegt een vak toe aan de tabel Vak
     * @param $params zijn de parameteres die men moet ingeven voor een nieuw vak
     * @return Record toegevoegd
     */
    function add_vak($params)
    {
        $this->db->insert('vak',$params);
        return $this->db->insert_id();
    }

    /**
     * Bewerkt een  record (vak) in de tabel Vak
     * @param $id de id van de record dat bewerkt wordt
     * @param $params de parameteres die men moet ingeven voor het vak aan te passen
     * @return record gewijzigd
     */
    function update_vak($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('vak',$params);
    }

    /**
     * Verwijdert een record (vak) uit aan de tabel Vak
     * @param $id de id van de record dat verwijderd wordt
     * @return record verwijdert
     */
    function delete_vak($id)
    {
        return $this->db->delete('vak',array('id'=>$id));
    }

    function insertVak($dataVak)
    {
        $this->db->insert('vak', $dataVak);
        return $this->db->insert_id();

    }
}
