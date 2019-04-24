<?php
/**
 * @class Richting_model
 * @brief Model-klasse voor richtingen
 *
 * Model-klasse die alle methodes bevat voor de richtingen
 *
 */

class Richting_model extends CI_Model
{
    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
    }

    public function get_richting_by_name($richting)
    {
        return $this->db->get_where('richting', ['naam'=>$richting])->row_array();
    }

    /**
     * Haalt een richting op uit de tabel Richting
     * @param $id de id van de mail
     * @return Richting
     */
    function get_richting($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('richting');
        return $query->row();
    }

    /**
     * Haalt alle richtingen op uit de tabel Richting
     * @return Alle richtingen
     */
    function get_all_richting()
    {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('richting');
        return $query->result();
    }

    /**
     * Voegt een richting toe aan de tabel Richting
     * @param $params zijn de parameteres die men moet ingeven voor een nieuwe richting
     * @return Record toegevoegd
     */
    function add_richting($params)
    {
        $this->db->insert('richting',$params);
        return $this->db->insert_id();
    }

    /**
     * Bewerkt een  record (richting) in de tabel Richting
     * @param $id de id van de record dat bewerkt wordt
     * @param $params de parameteres die men moet ingeven voor de richting aan te passen
     * @return record gewijzigd
     */
    function update_richting($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('richting',$params);
    }

    /**
     * Verwijdert een record (richting) uit aan de tabel Richting
     * @param $id de id van de record dat verwijderd wordt
     * @return record verwijderd
     */
    function delete_richting($id)
    {
        return $this->db->delete('richting',array('id'=>$id));
    }

    /**
     *
     * @param $dataRichting
     * @return mixed
     */
    function insertRichting($dataRichting)
    {
        $this->db->insert('richting', $dataRichting);
        return $this->db->insert_id();
    }
}
