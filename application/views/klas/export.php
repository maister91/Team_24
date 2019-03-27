<?php
/**
 * @file index.php
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
<p><?php echo anchor('#', 'KLasgegevens exporteren', 'class="btn btn-outline-primary"'); ?></p>
