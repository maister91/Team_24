<?php
/**
 * @class Gebruikertype
 * @brief Controller-klasse voor Gebruikertypes
 *
 * Controller-klasse waar de methodes inzitten voor:
 * -Na het inloggen de gebruiker naar de juiste pagina door te sturen
 */

/**
 * @property Template $template
 * @property Gebruikertype_model $gebruikertype_model
 */

class Gebruikertype extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('gebruikertype_model');
    }

    function docent()
    {
        $data['gebruikertype'] = $this->gebruikertype_model->get_all_gebruikertype();

        $data['titel'] = '';
        $data['ontwikkelaar'] = 'War Op de Beeck';
        $data['tester'] ='Simon Smedts';
        $partials = ['hoofding' => 'main_header',
            'inhoud' => 'Docent_landing',
            'voetnoot' => 'main_footer'];
        $this->template->load('main_master', $partials, $data);
    }

    function isp()
    {
        $data['gebruikertype'] = $this->gebruikertype_model->get_all_gebruikertype();

        $data['titel'] = '';
        $data['ontwikkelaar'] = 'Simon Smedts';
        $data['tester'] ='War Op de Beeck';
        $partials = ['hoofding' => 'main_header',
            'inhoud' => 'isp_landing',
            'voetnoot' => 'main_footer'];
        $this->template->load('main_master', $partials, $data);
    }

    function opleidingmanager()
    {
        $data['titel'] = '';
        $data['ontwikkelaar'] = 'War Op de Beeck';
        $data['tester'] = 'Simon Smedts';
        $data['gebruikertype'] = $this->gebruikertype_model->get_all_gebruikertype();

        $partials = ['hoofding' => 'main_header',
            'inhoud' => 'opleidingmanager',
            'voetnoot' => 'main_footer'];

        $this->template->load('main_master', $partials, $data);
    }
}
