<h1><?php echo $titel?></h1>

<table class="table table-borderless ">
    <tbody>
    <tr>
        <td>
            <?php echo form_open('Traject/index'); ?>
            <button type='submit' name='Terug' class="btn btn-primary">Terug</button>
            <?php echo form_close(); ?>
        </td>
        <td>
            <?php echo form_open('Gebruiker/index_simulatie'); ?>
            <button type='submit' name='Simulatie' class="btn btn-primary">Simulatie</button>
            <?php echo form_close(); ?>
        </td>
        <td>
            <?php echo form_open('Gebruiker/meldAf'); ?>
            <button type='submit' name='Afmelden' class="btn btn-primary">Afmelden</button>
            <?php echo form_close(); ?>
        </td>
    </tr>
    </tbody>
    </table>
