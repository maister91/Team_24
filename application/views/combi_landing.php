<h1><?php echo $titel?></h1>
<?php
/**
 * @file combi_landing.php
 *
 * View waar je de homepage van de combistudent kunt bekijken
 * - gebruikt bootstrap
 */
?>
<table class="table table-borderless ">
    <thead>
    <tr>
        <th>Studietraject</th>
        <th>Afspraken</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php echo anchor('traject/combi', 'Simulatie', 'class="btn btn-outline-primary"'); ?></td>
        <td><?php echo anchor('#', 'Afspraken bekijken', 'class="btn btn-info"'); ?></td>
    </tr>
    <tr>
        <td>
            <?php echo form_open('Gebruiker/meldAf'); ?>
            <button type='submit' name='Afmelden' class="btn btn-primary">Afmelden</button>
            <?php echo form_close(); ?>
        </td>
        <td></td>
    </tr>
    </tbody>
</table>