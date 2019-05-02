<?php

/**
 * @class Gebruiker_lesmoment
 * @brief Controller-klasse voor Gebruiker_lesmoment
 *
 * Controller-klasse met alle methodes voor gebruiker - lesmoment
 */

class Gebruiker_lesmoment extends CI_Controller
{

    /**
     * Gebruiker_lesmoment constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('Gebruiker_lesmoment_model');
    }
}
