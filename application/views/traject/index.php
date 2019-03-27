<title>KIES EEN TRAJECT</title>

<form method="post" accept-charset="utf-8" action="<?php echo site_url("traject/index"); ?>">
<input type="submit" name="model" value="ModelTraject" class="btn btn-primary href=" href=" <?php echo site_url('lessenrooster/index'); ?>" >
   <?php  echo '<p>' .$trajecten[1]['beschrijving'] .'</p>' ?>
<input type="submit" name="combi" value="CombiTraject"  href="<?php echo site_url('traject/index'); ?>" class="btn btn-primary">
    <?php  echo '<p>' .$trajecten[0]['beschrijving'] .'</p>' ?>
</form>

<?php  echo anchor('gebruiker/meldaf', 'Afmelden') ?>

