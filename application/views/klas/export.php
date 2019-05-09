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
    }
    ?>
</table>
<br>
<br>
<p><?php echo anchor('Export_klas/createXLS', 'Klasgegevens exporteren', 'class="pull-right btn btn-outline-primary btn-xs"'); ?></p>
<p><?php echo anchor('gebruiker/index', 'Terug'); ?></p>