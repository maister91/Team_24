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
    <?php foreach ($klas as $k) {
        echo '<tr>' . '<td>' . $k->naam . '</td>' . '<td>' . $k->maxAantal . '</td>' . '</tr>';
    }
    ?>
</table>
<br>
<br>
<p><?php echo anchor('Klas/createXLS', 'KLasgegevens exporteren', 'class="pull-right btn btn-outline-primary btn-xs"'); ?></p>
<p><?php echo anchor('gebruikertype/opleidingmanager', 'Terug'); ?></p>

