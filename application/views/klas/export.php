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
<<<<<<< HEAD
        <td>Huidig aantal studenten</td>
        <td>Max aantal studenten</td>
        <td>Studenten</td>
    </tr><?php
    foreach ($klassen as $klas) {
        ?>
        <tr>
            <td><?php echo $klas['naam']?></td>
            <td><?php echo $klas['huidigAantal']?></td>
            <td><?php echo $klas['maxAantal']?></td>
        </tr><?php
        foreach ($klas['gebruikers'] as $gebruiker){
            echo '<tr><td></td><td></td><td></td><td>' . $gebruiker . '</td></tr>';
        }
=======
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
>>>>>>> parent of 4e08cc3... dev
    }
    ?>
</table>
<br>
<p><?php echo "<p>$links</p>" ;?></p>
<br>
<p><?php echo anchor('Export_klas/createXLS', 'Klasgegevens exporteren', 'class="pull-right btn btn-outline-primary btn-xs"'); ?></p>
<p><?php echo anchor('gebruiker/index', 'Terug'); ?></p>


