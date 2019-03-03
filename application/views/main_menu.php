<?php

// iedereen
echo divAnchor('Gebruiker/index', 'Home');

if ($gebruiker == null) { // niet aangemeld
    echo divAnchor('Gebruiker/meldAan', 'Aanmelden');
} else { // wel aangemeld
    echo divAnchor('Gebruiker/meldAf', 'Afmelden');
    switch ($gebruiker->gebruikertypeId) {
        case 1: // gewone geregistreerde gebruiker
            redirect('traject/index');
            break;
        case 2: // administrator
            redirect('docent_landing');
            break;
        case 3:
            redirect('isp_landing');
            break;
    }
}
