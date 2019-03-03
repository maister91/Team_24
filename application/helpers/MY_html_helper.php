<?php

    function bepaalAchtergrond($afbeelding)
    {
        return "<body background=\"" . geefVolledigeNaam($afbeelding) . "\">";
    }

    function toonAfbeelding($afbeelding, $attributen = '')
    {
        return "<img src=\"" . geefVolledigeNaam($afbeelding) . "\"" . _stringify_attributes($attributen) . " />";
    }

    function geefVolledigeNaam($afbeelding)
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        return base_url() . str_replace('\\', '/', str_replace(FCPATH, "", APPPATH)) . $afbeelding;
    }

    function pasStylesheetAan($css)
    {
        return "<link rel=\"stylesheet\" href=\"" . geefVolledigeNaam($css) . "\" />";
    }

    function exporteerTabel($array)
    {
        $resultaat = "";

        $resultaat .= "<table>";

        // velden
        $resultaat .= "<tr>";
        // haal de veldnamen op van het 1ste object
        $variabelen = get_object_vars($array[0]);

        foreach ($variabelen as $key => $value) {
            $resultaat .= "<th>$key</th>";
        }
        $resultaat .= "</tr>\n";

        // haal de waardes op van alle objecten
        foreach ($array as $element) {
            $resultaat .= "<tr>";
            $variabelen = get_object_vars($element);
            foreach ($variabelen as $value) {
                $resultaat .= "<td>$value</td>";
            }
            $resultaat .= "</tr>\n";
        }

        $resultaat .= "</table>";
        return $resultaat;
    }
