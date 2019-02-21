<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Mail_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get mail by id
     */
    function get_mail($id)
    {
        return $this->db->get_where('Mail',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all mail
     */
    function get_all_mail()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('Mail')->result_array();
    }
        
    /*
     * function to add new mail
     */
    function add_mail($params)
    {
        $this->db->insert('Mail',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update mail
     */
    function update_mail($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('Mail',$params);
    }
    
    /*
     * function to delete mail
     */
    function delete_mail($id)
    {
        return $this->db->delete('Mail',array('id'=>$id));
    }
}
