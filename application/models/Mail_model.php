<?php
/**
 * @class Mail_model
 * @brief Model-klasse voor mails
 *
 * Model-klasse die alle methodes bevat voor de mails
 *
 */

class Mail_model extends CI_Model
{
    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Haalt een mail op uit de tabel Mail
     * @param $id de id van de mail
     * @return Mail
     */
    function get_mail($id)
    {
        return $this->db->get_where('mail',array('id'=>$id))->row_array();
    }

    /**
     * Haalt alle mails op uit de tabel Mail
     * @return Alle mails
     */
    function get_all_mail()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('mail')->result_array();
    }

    /**
     * Voegt een mail toe aan de tabel Mail
     * @param $params zijn de parameteres die men moet ingeven voor een nieuwe mail
     * @return Record toegevoegd
     */
    function add_mail($params)
    {
        $this->db->insert('mail',$params);
        return $this->db->insert_id();
    }

    /**
     * Bewerkt een  record (mail) in de tabel Mail
     * @param $id de id van de record dat bewerkt wordt
     * @param $params de parameteres die men moet ingeven voor de mail aan te passen
     * @return record gewijzigd
     */
    function update_mail($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('mail',$params);
    }

    /**
     * Verwijdert een record (mail) uit aan de tabel Mail
     * @param $id de id van de record dat verwijderd wordt
     * @return record verwijderd
     */
    function delete_mail($id)
    {
        return $this->db->delete('mail',array('id'=>$id));
    }
}
