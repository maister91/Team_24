<?php
/**
 * @class Afspraak_model
 * @brief Model-klasse voor afspraken
 *
 * Model-klasse die alle methodes bevat voor de afspraken
 *
 */

class Afspraak_model extends CI_Model
{
    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Retourneert de record met id=$id uit de tabel Afspraak
     * @param $id de id van het record dat opgevraagd wordt
     * @return De opgevraagde record
     */
    function get_afspraak($id)
    {
        return $this->db->get_where('afspraak',array('id'=>$id))->row_array();
    }

    /**
     * Retourneert alle records uit de tabel Afspraak op volgorde
     */
    function get_all_afspraak()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('afspraak')->result_array();
    }

    /**
     * Voegt een nieuwe record (afspraak) toe aan de tabel Afspraak
     * @param $params zijn de parameteres die men moet ingeven voor een nieuwe afspraak toe te voegen
     * @return record toegevoegd
     */

    function add_afspraak($params)
    {
        $this->db->insert('afspraak',$params);
        return $this->db->insert_id();
    }

    /**
     * Bewerkt een  record (afspraak) in de tabel Afspraak
     * @param $id de id van de record dat bewerkt wordt
     * @param $params de parameteres die men moet ingeven voor de afspraak aan te passen
     * @return record gewijzigd
     */
    function update_afspraak($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('afspraak',$params);
    }

    /**
     * Verwijdert een record (afspraak) uit aan de tabel Afspraak
     * @param $id de id van de record dat verwijderd wordt
     * @return record verwijderd
     */
    function delete_afspraak($id)
    {
        return $this->db->delete('afspraak',array('id'=>$id));
    }
}
