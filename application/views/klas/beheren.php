<?php
/**
 * Created by PhpStorm.
 * User: thoma
 * Date: 28/03/2019
 * Time: 15:15
 */
?>

<form action="" method="post">
    <label>Kies een klas</label><br>
    <select name="klas" size="10">
        <?php foreach ($klas as $k) {
        echo '<option>' . $k->naam . '</option>';
    }
    ?>>
    </select><br>
    <table class="table table-borderless ">
        <tbody>
        <tr>
            <td>
                <?php echo form_open('Klas/index_aanpassen'); ?>
                <button type='submit' name='Aanpassen' class="btn btn-primary" value="Submit">Aanpassen</button>
                <?php echo form_close(); ?>
            </td>
            <td>
                <?php echo form_open('Gebruiker/index_simulatie'); ?>
                <button type='submit' name='Toevoegen' class="btn btn-primary" value="Submit">Toevoegen</button>
                <?php echo form_close(); ?>
            </td>
            <td>
                <?php echo form_open('Gebruiker/meldAf'); ?>
                <button type='submit' name='Verwijderen' class="btn btn-primary" value="Submit">Verwijderen</button>
                <?php echo form_close(); ?>
            </td>
        </tr>
        </tbody>
    </table>
</form>

<table class="table table-borderless ">
    <tbody>
    <tr>
        <td>
            <?php echo form_open('Klas/index_aanpassen'); ?>
            <button type='submit' name='Aanpassen' class="btn btn-primary" value="Submit">Aanpassen</button>
            <?php echo form_close(); ?>
        </td>
        <td>
            <?php echo form_open('Gebruiker/index_simulatie'); ?>
            <button type='submit' name='Toevoegen' class="btn btn-primary" value="Submit">Toevoegen</button>
            <?php echo form_close(); ?>
        </td>
        <td>
            <?php echo form_open('Gebruiker/meldAf'); ?>
            <button type='submit' name='Verwijderen' class="btn btn-primary" value="Submit">Verwijderen</button>
            <?php echo form_close(); ?>
        </td>
    </tr>
    </tbody>
</table>