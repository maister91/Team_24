<?php
/**
 * @class Gebruiker_model
 * @brief Model-klasse voor gebruikers
 *
 * Model-klasse die alle methodes bevat voor de gebruikers
 *
 */

class Gebruiker_model extends CI_Model
{
    /* @var Traject_model */
    public $traject_model;

    public function __construct()
    {
        /**
         * Constructor
         */
        parent::__construct();
    }

    function get($id)
    {
        // geef gebruiker-object met opgegeven $id
        $this->db->where('id', $id);
        $query = $this->db->get('gebruiker');
        return $query->row();
    }

    /**
     * Haalt een gebruiker op uit de tabel Gebruiker
     * @param $id de id van de gebruiker
     * @return Gebruiker
     */
    function getGebruiker($email, $paswoord)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('gebruiker');

        if ($query->num_rows() == 1){
            $gebruiker = $query->row();
            if (password_verify($paswoord, $gebruiker->paswoord)){
                return $gebruiker;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    function controleerWachtwoord($id, $paswoord)
    {
        // geef gebruiker-object met $email en $wachtwoord EN geactiveerd = 1
        $this->db->where('id', $id);

        $query = $this->db->get('gebruiker');

        if ($query->num_rows() == 1) {
            $gebruiker = $query->row();
            // controleren of het wachtwoord overeenkomt
            if (password_verify($paswoord, $gebruiker->paswoord)) {
                return 1 ;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    /**
     * Haalt alle gebruikers op uit de tabel Gebruiker
     * @return Alle gebruikers
     */
    /*
      * Get gebruiker by id
      */
    function get_gebruiker($id)
    {
        return $this->db->get_where('gebruiker',array('id'=>$id))->row_array();
    }
    function get_all_gebruikerby_type(){

        $this->db->order_by('voornaam', 'asc');
        return $this->db->get('gebruiker')->result_array();

    }

    /*
     * Get all gebruikers
     */
    function get_all_gebruikers()
    {
        $this->db->order_by('id', 'asc');

    }

    /*
     * function to add new gebruiker
     */
    function add_gebruiker($params)
    {
        $this->db->insert('gebruiker',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update gebruiker
     */
    function update_gebruiker($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('gebruiker',$params);
    }

    /*
     * function to delete gebruiker
     */
    function delete_gebruiker($id)
    {
        return $this->db->delete('gebruiker',array('id'=>$id));
    }
}
