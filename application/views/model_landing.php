<h1><?php echo $titel?></h1>

<div class="terug">
    <?php echo form_open('Traject/index'); ?>
    <button type='submit' name='Kiestraject' class="btn btn-primary">Terug</button>
    <?php echo form_close(); ?>
</div>
<div class="klaskeuze">
    <?php echo form_open('Traject/index'); ?>
    <button type='submit' name='Klaskeuze' class="btn btn-primary">Klaskeuze maken</button>
    <?php echo form_close(); ?>
</div>
<div class="afmelden">
    <?php echo form_open('Gebruiker/meldAf'); ?>
    <button type='submit' name='Afmelden' class="btn btn-primary">Afmelden</button>
    <?php echo form_close(); ?>
</div>

