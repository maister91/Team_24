<?php
/**
 *@property Klas_model $klas_model
 * @property Lokaal_model $lokaal_model
 * @property Vak_model $vak_model
 */
 
class Lesmoment_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get lesmoment by id
     */
    function get_lesmoment($id)
    {
        return $this->db->get_where('lesmoment',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all lesmoment
     */
    function get_all_lesmoment()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('lesmoment')->result_array();
    }
        
    /*
     * function to add new lesmoment
     */
    function add_lesmoment($params)
    {
        $this->db->insert('lesmoment',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update lesmoment
     */
    function update_lesmoment($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('lesmoment',$params);
    }
    
    /*
     * function to delete lesmoment
     */
    function delete_lesmoment($id)
    {
        return $this->db->delete('lesmoment',array('id'=>$id));
    }
    function insertLesmoment($dataLesmoment)
    {
        $this->db->insert('lesmoment', $dataLesmoment);
    }
}
