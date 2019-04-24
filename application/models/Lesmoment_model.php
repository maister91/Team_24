<?php
/**
 * @class Lesmoment_model
 * @brief Model-klasse voor lesmomenten
 *
 * Model-klasse die alle methodes bevat voor de lesmomenten
 *
 */

class Lesmoment_model extends CI_Model
{
    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Haalt een lesmoment op uit de tabel Lesmoment
     * @param $id de id van de gebruiker
     * @return lesmoment
     */
    function get_lesmoment($id)
    {
        return $this->db->get_where('lesmoment',array('id'=>$id))->row_array();
    }

    /**
     * Haalt alle lesmomenten op uit de tabel Lesmoment
     * @return Alle lesmomenten
     */
    function get_all_lesmoment()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('lesmoment')->result_array();
    }

    /**
     * Voegt een lesmoment toe aan de tabel Lesmoment
     * @param $params zijn de parameteres die men moet ingeven voor een nieuw lesmoment
     * @return Record toegevoegd
     */
    function add_lesmoment($params)
    {
        $this->db->insert('lesmoment',$params);
        return $this->db->insert_id();
    }

    /**
     * Bewerkt een  record (lesmoment) in de tabel Lesmoment
     * @param $id de id van de record dat bewerkt wordt
     * @param $params de parameteres die men moet ingeven voor het lesmoment aan te passen
     * @return record gewijzigd
     */
    function update_lesmoment($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('lesmoment',$params);
    }

    /**
     * Verwijdert een record (Lesmoment) uit aan de tabel Lesmoment
     * @param $id de id van de record dat verwijderd wordt
     * @return record verwijderd
     */
    function delete_lesmoment($id)
    {
        return $this->db->delete('lesmoment',array('id'=>$id));
    }

    /**
     *
     */
    function truncate_lesmoment()
    {
        return $this->db->truncate('lesmoment');
    }

    /**
     * @param $dataLesmoment
     */
    function insertLesmoment($dataLesmoment)
    {
        $this->db->insert('lesmoment', $dataLesmoment);
    }

    function get_lesmoment_by_klas_en_semester($klasId, $semester)
    {
        return $this->db->order_by('lesblok')->get_where('lesmoment',array('klasId'=>$klasId, 'semester'=>$semester))->result_array();
    }

    function update_klas($klasId, $gebruikerId)
    {
        return $this->db->update('gebruiker', [
            'klasId' => $klasId
        ], [
            'id' => $gebruikerId,
        ]);
    }
}
