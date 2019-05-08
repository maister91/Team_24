<?php
/**
 * @class Klas_model
 * @brief Model-klasse voor klassen
 *
 * Model-klasse die alle methodes bevat voor de klassen
 *
 */

/**
 * @property Gebruiker_model $gebruiker_model
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
     * Geeft een gebruiker-object met de opgegeven naam
     * @param $naam De naam van de klas
     * @return de gegevens van de klas
     */
    function getKlasByName($naam)
    {
        return $this->db->get_where('klas', ['naam'=>$naam])->row_array();
    }
    /**
     * Haalt een klas op uit de tabel Klas
     *
     * @param $id  // De id van de klas
     * @return array
     */
    function get_klas($id)
    {
        return $this->db->get_where('klas',array('id'=>$id))->row_array();
    }

    function get_klas_by_lesmoment($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('klas');
        return $query->row();
    }

    function get_klas_by_gebruiker($id){
        $this->db->where('id', $id);
        $query = $this->db->get('klas');
        return $query->row();
    }

    function get_klassen()
    {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('klas');
        $klassen = $query->result();
        return $klassen;

    }

    /**
     * Haalt alle gebruikers van een klas naar boven gesorteerd op
     * @return array van alle gebruikers van een klas
     */
    function get_klas_gebruiker()
    {
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('klas');
        $klassen = $query->result();

        foreach ($klassen as $klas) {
            $klas->gebruiker = $this->gebruiker_model->get_all_gebruiker($klas->id);
        }

        return $klassen;
    }


    /**
     * Haalt alle klassen op uit de tabel Klas
     * @return result
     */
    function get_all_klas()
    {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('klas');
        return $query->result();
    }

    /**
     * Haalt alle klassen op uit tabel klas in een array gesorteerd op naam
     * @return result array
     */
    function get_all_klassen()
    {
        $this->db->order_by('naam', 'ASC');
        return $this->db->get('klas')->result_array();
    }

    /*
     * Get all klassen
     */
    function get_klassen_jaar($jaar)
    {
        $this->db->like('naam', $jaar);
        $this->db->order_by('naam', 'ASC');
        return $this->db->get('klas')->result_array();
    }
    /*
     * function to add new klas
    /**
     * Voegt een klas toe aan de tabel Klas
     * @param $params zijn de parameteres die men moet ingeven voor een nieuwe klas
     * @return Record toegevoegd
     */
    function add_klas($params)
    {
        $this->db->insert('klas', $params);
        return $this->db->insert_id();
    }

    /**
     * Bewerkt een  record (klas) in de tabel Klas
     * @param $id de id van de record dat bewerkt wordt
     * @param $params de parameteres die men moet ingeven voor de klas aan te passen
     * @return record gewijzigd
     */

    function update_klas($klas)
    {
        $this->db->where('id', $klas->id);
        $this->db->update('klas', $klas);
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
     * Stuurt de excelgegevens van Excel naar de database
     * @param $data data van excel
     */
    function insert($data)
    {
        $this->db->insert('klas', $data);
        return $this->db->insert_id();
    }
}
