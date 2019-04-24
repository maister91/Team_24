<?php
class Excel_export_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function fetch_data()
    {
        $this->db->order_by("id", "desc");
        $query = $this->db->get("gebruiker");
        return $query->result();
    }
}