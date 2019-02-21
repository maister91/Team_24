<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Richting_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get richting by id
     */
    function get_richting($id)
    {
        return $this->db->get_where('Richting',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all richting
     */
    function get_all_richting()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('Richting')->result_array();
    }
        
    /*
     * function to add new richting
     */
    function add_richting($params)
    {
        $this->db->insert('Richting',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update richting
     */
    function update_richting($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('Richting',$params);
    }
    
    /*
     * function to delete richting
     */
    function delete_richting($id)
    {
        return $this->db->delete('Richting',array('id'=>$id));
    }
}
