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

    /**
     * Haalt alle klassen op uit tabel klas in een array gesorteerd op naam
     * @return result array
     */
    function get_all_klassen()
    {
        $this->db->order_by('naam', 'ASC');
        return $this->db->get('klas')->result_array();
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
    /*
     * function to update klas
     */
    function update_klas($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('klas',$params);
    }
    /*
     * function to delete klas
     */
    function delete_klas($id)
    {
        return $this->db->delete('klas',array('id'=>$id));
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