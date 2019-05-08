<?php
/**
 * @file export.php
 *
 * View waar een lijst van klassen kan worden bekeken
 * -gebruikt bootstrap
 */
?>


<h2>Beschikbare klasgegevens <a href="#" data-toggle="tooltip" data-placement="right"
                                title="Hier kan u de beschikbare klasgegevens vinden. Met de knop vanonder kan u alle klasgegevens die hier te bekijken zijn in een excel bestand downloaden."><i
                class="far fa-question-circle"></i></a></h2>
<table>
    <tr>
        <td>Klas</td>
        <td>Vak</td>
        <td>Weekdag</td>
        <td>Lesblok</td>
        <td>semester</td>
        <td>gebruiker</td>
    </tr>
    <?php foreach ($lesmomenten as $lesmoment) {
        echo '<tr>' . '<td>' . $lesmoment->klas->naam . '</td>'
            . '<td>' . $lesmoment->vak->naam . '</td>' . '<td>' . $lesmoment->weekdag . '</td>'
            . '<td>' . $lesmoment->lesblok . '</td>' . '<td>' . $lesmoment->semester . '</td><td><ul></ul>';
        foreach ($gebruikers as $gebruiker) {
            if ($gebruiker->klasId == $lesmoment->klas->id) {
                echo '<li>' . $gebruiker->voornaam . ' ' . $gebruiker->achternaam . '</li>';
            }
        }
        echo '</ul></td></tr>';
    }
    ?>
</table>
<br>
<p><?php echo "<p>$links</p>" ;?></p>
<br>
<p><?php echo anchor('Export_klas/createXLS', 'Klasgegevens exporteren', 'class="pull-right btn btn-outline-primary btn-xs"'); ?></p>
<p><?php echo anchor('gebruiker/index', 'Terug'); ?></p>

