<?php
/**
 * @property Template $template
 * @property Gebruiker_model $gebruiker_model
 * @property Klas_model $klas_model
 * @property Gebruikertype_model $gebruikertype_model
 * @property Gebruikeradmin_model $gebruikeradmin_model
 * @property Traject_model $traject_model
 * @property Afspraak_model $afspraak_model
 */
class Gebruikeradmin extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('gebruiker_model');
        $this->load->model('klas_model');
        $this->load->model('afspraak_model');
        $this->load->model('gebruikertype_model');
        $this->load->model('gebruikeradmin_model');
    }

    /*
     * Listing of gebruikers
     */
    function index()
    {
        $data['gebruikers'] = $this->gebruiker_model->get_all_gebruikerby_type();
        $data['_view'] = 'gebruikeradmin/index';
        $this->load->view('layouts/main',$data);
    }

    /**
     * toont de indexpagina van de admin gebruiker
     *
     * @see Gebruiker_model::get_all_gebruikerby_type()
     * @see gebruikeradmin/index.php
     */
    function indexStudenten()
    {
        $data['gebruikers'] = $this->gebruikeradmin_model->get_all_studenten();
        $data['titel'] = 'Klassen toevoegen';
        $data['ontwikkelaar'] = 'Simon Smedts';
        $data['tester'] = 'War Op de Beeck';
        $data['klas'] = $this->klas_model->get_all_klas();
        $partials = ['hoofding' => 'main_header',
            'inhoud' => 'gebruikeradmin/indexStudenten',
            'voetnoot' => 'main_footer'];
        $this->template->load('main_master', $partials, $data);
    }

    /**
     * voegt een nieuwe student toe (aan de databank)
     *
     * @see Gebruiker_model::add_gebruiker()
     * @see Gebruikertype_model::get_all_gebruikertype()
     * @see Klas_model::get_all_klassen()
     * @see Traject_model::get_all_traject()
     * @see Afspraak_model::get_all_afspraak()
     * @see Gebruikeradmin::index
     * @see gebruikeradmin/add.php
     */
    function addStudent()
    {
        $hash = password_hash($this->input->post('paswoord'), PASSWORD_DEFAULT);
        if(isset($_POST) && count($_POST) > 0)
        {
            $params = array(
                'gebruikertypeId' => $this->input->post('gebruikertypeId'),
                'klasId' => $this->input->post('klasId'),
                'trajectId' => $this->input->post('trajectId'),
                'afspraakId' => $this->input->post('afspraakId'),
                'voornaam' => $this->input->post('voornaam'),
                'achternaam' => $this->input->post('achternaam'),
                'email' => $this->input->post('email'),
                'paswoord' => $hash
            );
            $this->gebruiker_model->add_gebruiker($params);
            redirect('gebruikeradmin/indexStudenten');
        }
        else
        {
            $data['all_gebruikertype'] = $this->gebruikertype_model->get_all_gebruikertype();
            $data['all_klassen'] = $this->klas_model->get_all_klassen();
            $data['all_traject'] = $this->traject_model->get_all_traject();
            $data['all_afspraak'] = $this->afspraak_model->get_all_afspraak();
            $data['_view'] = 'gebruikeradmin/addStudent';
            $this->load->view('layouts/main',$data);
        }
    }

    /**
     * Wijzigt de gegevens van admin gebruiker
     *
     * @param $id de id van de admin die gewijzigd moet worden
     * @see Gebruiker_model::getGebruiker()
     * @see Gebruikertype_model::get_all_gebruikertype()
     * @see Klas_model::get_all_klassen()
     * @see Traject_model::get_all_traject()
     * @see Afspraak_model::get_all_afspraak()
     * @see gebruikeradmin/index.php
     * @see gebruikeradmin/edit.php
     *
     */
    function editStudent($id)
    {
        // check if the gebruiker exists before trying to edit it
        $data['gebruiker'] = $this->gebruiker_model->get_gebruiker($id);
        if(isset($data['gebruiker']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                $params = array(
                    'gebruikertypeId' => $this->input->post('gebruikertypeId'),
                    'klasId' => $this->input->post('klasId'),
                    'trajectId' => $this->input->post('trajectId'),
                    'afspraakId' => $this->input->post('afspraakId'),
                    'voornaam' => $this->input->post('voornaam'),
                    'achternaam' => $this->input->post('achternaam'),
                    'email' => $this->input->post('email'),
                    'paswoord' => $this->input->post('paswoord'),
                );
                $this->gebruiker_model->update_gebruiker($id,$params);
                redirect('gebruikeradmin/indexStudenten');
            }
            else
            {
                $data['all_gebruikertype'] = $this->gebruikertype_model->get_all_gebruikertype();
                $data['all_klassen'] = $this->klas_model->get_all_klassen();
                $data['all_traject'] = $this->traject_model->get_all_traject();
                $data['all_afspraak'] = $this->afspraak_model->get_all_afspraak();
                $data['_view'] = 'gebruikeradmin/editStudent';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The gebruiker you are trying to edit does not exist.');
    }

    /**
     * Verwijdert een admin gebruiker
     *
     * @param $id de id van de admin gebruiker die verwijdert wordt
     * @see Gebruiker_model::getGebruiker()
     * @see Gebruiker_model::delete_gebruiker()
     * @see gebruikeradmin::index()
     */
    function remove($id)
    {
        $gebruiker = $this->gebruiker_model->get_gebruiker($id);

        // check if the gebruiker exists before trying to delete it
        if(isset($gebruiker['id']))
        {
            $this->gebruiker_model->delete_gebruiker($id);
            redirect('gebruikeradmin/indexStudenten');
        }
        else
            show_error('The gebruiker you are trying to delete does not exist.');
    }

}
