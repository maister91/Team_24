<?php
/**
 * @class Traject_model
 * @brief Model-klasse voor trajecten
 *
 * Model-klasse die alle methodes bevat voor de trajecten
 *
 */

class Traject_model extends CI_Model
{
    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Haalt een traject op uit de tabel Traject
     * @param $id de id van het traject
     * @return Traject
     */
    function get_traject($id)
    {
        return $this->db->get_where('traject',array('id'=>$id))->row_array();
    }

    //
    function get_all_traject()
    {
        $this->db->order_by('naam', 'DESC');
        return $this->db->get('traject')->result_array();
    }

    /**
     * Voegt een traject toe aan de tabel Traject
     * @param $params zijn de parameteres die men moet ingeven voor een nieuw traject
     * @return Record toegevoegd
     */
    function add_traject($params)
    {
        $this->db->insert('traject',$params);
        return $this->db->insert_id();
    }

    /**
     * Bewerkt een  record (traject) in de tabel Tranect
     * @param $id de id van de record dat bewerkt wordt
     * @param $params de parameteres die men moet ingeven voor het traject aan te passen
     * @return record gewijzigd
     */
    function update_trajectid($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('traject',$params);
    }

    /**
     * Verwijdert een record (traject) uit aan de tabel Traject
     * @param $id de id van de record dat verwijderd wordt
     * @return record verwijderd
     */
    function delete_traject($id)
    {
        return $this->db->delete('traject',array('id'=>$id));
    }

    function update_traject($trajectId, $gebruikerId)
    {
        return $this->db->update('gebruiker', [
            'trajectId' => $trajectId
        ], [
            'id' => $gebruikerId,
        ]);
    }

}
