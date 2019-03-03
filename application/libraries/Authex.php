<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class Authex
    {
        // +----------------------------------------------------------
        // | TV Shop
        // +----------------------------------------------------------
        // | 2ITF - 2018-2019
        // +----------------------------------------------------------
        // | Authex library
        // +----------------------------------------------------------
        // | Nelson Wells (http://nelsonwells.net/2010/05/creating-a-simple-extensible-codeigniter-authentication-library/)
        // | aangepast door M. Decabooter, J. Janssen
        // +----------------------------------------------------------

        public function __construct()
        {
            $CI =& get_instance();
            $CI->load->model('gebruiker_model');
        }

        function activeer($id)
        {
            // nieuwe gebruiker activeren
            $CI =& get_instance();

            $CI->gebruiker_model->updateGeactiveerd($id);
        }

        function isAangemeld()
        {
            // gebruiker is aangemeld als sessievariabele gebruiker_id bestaat
            $CI =& get_instance();

            if ($CI->session->has_userdata('id')) {
                return true;
            } else {
                return false;
            }
        }

        function getGebruikerInfo()
        {
            // geef gebruiker-object als gebruiker aangemeld is
            $CI =& get_instance();

            if (!$this->isAangemeld()) {
                return null;
            } else {
                $id = $CI->session->userdata('id');
                return $CI->gebruiker_model->get($id);
            }
        }

        function meldAan($email, $paswoord)
        {
            // gebruiker aanmelden met opgegeven email en wachtwoord
            $CI =& get_instance();

            $gebruiker = $CI->gebruiker_model->getGebruiker($email, $paswoord);

            if ($gebruiker == null) {
                return false;
            } else {
                $CI->session->set_userdata('id', $gebruiker->id);
                return true;
            }
        }

        function meldAf()
        {
            // afmelden, dus sessievariabele wegdoen
            $CI =& get_instance();

            $CI->session->unset_userdata('id');
        }

//        function registreer($naam, $email, $paswoord)
//        {
//            // nieuwe gebruiker registreren als email nog niet bestaat
//            $CI =& get_instance();
//
//            if ($CI->gebruiker_model->controleerEmailVrij($email)) {
//                $id = $CI->gebruiker_model->insert($naam, $email, $paswoord);
//                return $id;
//            } else {
//                return 0;
//            }
//        }


    }
