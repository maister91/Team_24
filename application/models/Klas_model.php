<?php
/**
 * @class Klas_model
 * @brief Model-klasse voor klassen
 *
 * Model-klasse die alle methodes bevat voor de klassen
 *
 */
 
class Klas_model extends CI_Model
{
    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('gebruiker_model');
    }

    /**
     * Haalt een klas op uit de tabel Klas
     * @param $id de id van de klas
     * @return klas
     */
    function get_klas()
    {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('klas');
        $klassen = $query->result();

        foreach($klassen as $klas){
            $klas->gebruiker = $this->gebruiker_model->get_all_gebruiker($klas->id);
        }

        return $klassen;
    }

    /**
     * Haalt alle klassen op uit de tabel Klas
     * @return Alle klassen
     */
    function get_all_klas($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('klas');
        return $query->row();
    }

    /**
     * Voegt een klas toe aan de tabel Klas
     * @param $params zijn de parameteres die men moet ingeven voor een nieuwe klas
     * @return Record toegevoegd
     */
    function add_klas($params)
    {
        $this->db->insert('klas',$params);
        return $this->db->insert_id();
    }

    /**
     * Bewerkt een  record (klas) in de tabel Klas
     * @param $id de id van de record dat bewerkt wordt
     * @param $params de parameteres die men moet ingeven voor de klas aan te passen
     * @return record gewijzigd
     */
    function update_klas($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('klas',$params);
    }

    /**
     * Verwijdert een record (Klas) uit aan de tabel Klas
     * @param $id de id van de record dat verwijderd wordt
     * @return record verwijderd
     */
    function delete_klas($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('klas');
    }

    /**
     *
     */
    function insert($data)
    {
        $this->db->insert('klas', $data);
        return $this->db->insert_id();
    }
}
