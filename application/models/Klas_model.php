<?php
/**
 * @class Klas_model
 * @brief Model-klasse voor klassen
 *
 * Model-klasse die alle methodes bevat voor de klassen
 *
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
        $this->load->model('Gebruiker_model');
    }

    /**
     * Geeft een gebruiker-object met de opgegeven naam
     * @param $naam De naam van de klas
     * @return de gegevens van de klas
     */
    public function getKlasByName($naam)
    {
        return $this->db->get_where('klas', ['naam' => $naam])->row_array();
    }

    /**
     * Haalt een klas op uit de tabel Klas
     * @param $id de id van de klas
     * @return $klassen
     */
    function get_klas($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('klas');
        return $query->row();
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
     * Haalt alle klassen op
     * @return array van klassen
     */
    function get_klassen()
    {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('klas');
        $klassen = $query->result();
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
