<?php

if ($gebruiker != null) { // wel aangemeld
    switch ($gebruiker->gebruikertypeId) {
        case 1: // gewone geregistreerde gebruiker
            redirect('traject/index');
            break;
        case 2: // administrator
            redirect('gebruikertype/docent');
            break;
        case 3:
            redirect('gebruikertype/isp');
            break;
    }
}
