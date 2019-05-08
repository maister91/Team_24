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
    }

    public function getKlasByName($naam)
    {
        return $this->db->get_where('klas', ['naam' => $naam])->row_array();
    }

    /**
     * Haalt een klas op uit de tabel Klas
     *
     * @param $id // De id van de klas
     * @return array
     */
    /*
     * Get klas by id
     */
    function get_klas($id)
    {
        return $this->db->get_where('klas', array('id' => $id))->row_array();
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

    /*
     * Get all klassen
     */
    function get_all_klassen()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('klas')->result_array();
    }

    /*
     * function to add new klas
     */
    function add_klas($params)
    {
        $this->db->insert('klas', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update klas
     */
    function update_klas($id, $params)
    {
        $this->db->where('id', $id);
        return $this->db->update('klas', $params);
    }

    /*
     * function to delete klas
     */
    function delete_klas($id)
    {
        return $this->db->delete('klas', array('id' => $id));
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
