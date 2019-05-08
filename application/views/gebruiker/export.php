<?php
/**
 * @file export.php
 *
 * View waar een lijst van klassen kan worden bekeken
 * -gebruikt bootstrap
 */
?>


<h2>Studenteninformatie</h2>
<table>
    <tr>
        <td>Student</td>
        <td>Klas</td>
        <td>R-nummer</td>
        <td>Email</td>
    </tr>
    <?php foreach ($gebruikers as $gebruiker) {
        echo '<tr>' . '<td>' . $gebruiker->voornaam . ' ' . $gebruiker->achternaam . '</td>'. '<td>' . $gebruiker->klas->naam . '</td>'
            .  '<td>' . substr($gebruiker->email, 0, -22) . '</td>'
            . '<td>' . $gebruiker->email . '</td></tr>';
    }
    ?>
</table>
<br>
<br>
<p><?php echo anchor('gebruiker/createXLS', 'Studenteninformatie exporteren', 'class="pull-right btn btn-outline-primary btn-xs"'); ?></p>
<p><?php echo anchor('gebruiker/index', 'Terug'); ?></p>

