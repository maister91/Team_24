<?php
/**
 * @file export.php
 *
 * View waar een lijst van klassen kan worden bekeken
 * -gebruikt bootstrap
 */
?>

<h2>Beschikbare klasgegevens</h2>
<table>
    <tr>
        <td>Richting</td>
        <td>Klas</td>
        <td>Vak</td>
        <td>Weekdag</td>
        <td>Lesblok</td>
    </tr>
    <?php foreach ($lesmomenten as $lesmoment) {
        echo '<tr>' . '<td>' . $lesmoment->richting->naam . '</td>' . '<td>' . $lesmoment->klas->naam . '</td>'
            . '<td>' . $lesmoment->vak->naam . '</td>' . '<td>' . $lesmoment->weekdag . '</td>'
            . '<td>' . $lesmoment->lesblok . '</td>' . '</tr>';
    }
    ?>
</table>
<br>
<br>
<p><?php echo anchor('Export_klas/createXLS', 'KLasgegevens exporteren', 'class="pull-right btn btn-outline-primary btn-xs"'); ?></p>
<p><?php echo anchor('gebruikertype/opleidingmanager', 'Terug'); ?></p>

