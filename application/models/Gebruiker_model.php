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
    public function __construct()
    {
        /**
         * Constructor
         */
        parent::__construct();
    }

    /**
     * Geeft een gebruiker-object met de opgegeven $id
     * @param $id De ID van de gebruiker
     * @return gegevens van de gebruiker
     */
    function get($id)
    {
        //
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

    /**
     * Controleert het wachtwoord
     * @param $id de id van de gebruiker
     * @param $paswoord het ingevoerde paswoord
     * @return 1 / 0 (ja of nee)
     */
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
    function get_all_gebruiker($id)
    {
        $this->db->where('klasId', $id);
        $query = $this->db->get('gebruiker');
        return $query->row();
    }

    /**
     * Haalt alle gebruikers op uit de tabel Gebruiker gesorteerd op gebruikerstype
     * @return Alle gebruikers gesorteerd op gebruikerstype
     */
    function get_all_gebruikerby_type(){
        $this->db->order_by('voornaam', 'asc');
        return $this->db->get('gebruiker')->result_array();
    }

    /**
     * Voegt een gebruiker toe aan de tabel Gebruiker
     * @param $params zijn de parameteres die men moet ingeven voor een nieuwe gebruiker
     * @return Record toegevoegd
     */
    function add_gebruiker($params)
    {
        $this->db->insert('gebruiker',$params);
        return $this->db->insert_id();
    }

    /**
     * Bewerkt een  record (gebruiker) in de tabel Gebruiker
     * @param $id de id van de record dat bewerkt wordt
     * @param $params de parameteres die men moet ingeven voor de gebruiker aan te passen
     * @return record gewijzigd
     */
    function update_gebruiker($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('gebruiker',$params);
    }

    /**
     * Verwijdert een record (Gebruiker) uit aan de tabel Gebruiker
     * @param $idGebruiker de id van de record dat verwijderd wordt
     * @return record verwijderd
     */
    function delete_gebruiker($id)
    {
        return $this->db->delete('gebruiker',array('id'=>$id));
    }
}
