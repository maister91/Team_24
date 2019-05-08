<?php
/**
 * @file export.php
 *
 * View waar een lijst van klassen kan worden bekeken
 * -gebruikt bootstrap
 */
?>

<a href="#" data-toggle="tooltip" data-placement="right"
   title="Hier kan u de beschikbare klasgegevens vinden. Met de knop vanonder kan u alle klasgegevens die hier te bekijken zijn in een excel bestand downloaden."><i
            class="far fa-question-circle"></i></a>
<h2>Beschikbare klasgegevens</h2>
<table>
    <tr>
        <td>Klas</td>
        <td>Vak</td>
        <td>Weekdag</td>
        <td>Lesblok</td>
        <td>Semester</td>
    </tr>
    <?php foreach ($lesmomenten as $lesmoment) {
        echo '<tr>' . '<td>' . $lesmoment->klas->naam . '</td>'
            . '<td>' . $lesmoment->vak->naam . '</td>' . '<td>' . $lesmoment->weekdag . '</td>'
            . '<td>' . $lesmoment->lesblok . '</td>' . '<td>' . $lesmoment->semester . '</td>' . '</tr>';
    }
    ?>
</table>
<br>
<br>
<p><?php echo anchor('Export_klas/createXLS', 'KLasgegevens exporteren', 'class="pull-right btn btn-outline-primary btn-xs"'); ?></p>
<p><?php echo anchor('gebruiker/index', 'Terug'); ?></p>

