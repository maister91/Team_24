<?php
/**
 * @file edit.php
 *
 * View waar de specificaties van een klas kan worden aangepast
 * -gebruikt bootstrap
 */
?>

<select name="klassen">
    <option value="0">--- Maak een Klaskeuze ---</option><?php
    foreach ($klassen as $klas) {
        if ($klasId === $klas->id) {
            echo '<option value="' . $klas->id . '" selected>' . $klas->naam . '</option>';
        } else {
            echo '<option value="' . $klas->id . '">' . $klas->naam . '</option>';
        }
    }
    ?>
</select>
<br>
<br>
<table>
    <?php
    foreach ($klassen as $klas){
        echo '<tr><td>' . $klas->gebruiker->achternaam . '</td></tr>';
    }
    ?>
</table>