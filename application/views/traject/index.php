<?php
/**
 * @file index.php
 *
 * View waar je de verschillende trajecten kan bekijken
 * -gebruikt bootstrap
 */
?>

<h2>Ingelogd als
    <?php
        $gebruiker = $this->authex->getGebruikerInfo();
        echo '<b>' . $gebruiker->voornaam . ' ' . $gebruiker->achternaam . '</b> ';
    ?>
</h2>

<form method="post" accept-charset="utf-8" action="<?php echo site_url("traject/kiesTraject"); ?>">
    <input type="submit" name="knop" value="Model traject" class="btn btn-primary href=" href=" <?php echo site_url('lessenrooster/index'); ?>" >
    <?php  echo '<p>' .$trajecten[1]['beschrijving'] .'</p>' ?>
    <input type="submit" name="knop" value="Combi traject"  href="<?php echo site_url('traject/kiesTraject'); ?>" class="btn btn-primary">
    <?php  echo '<p>' .$trajecten[0]['beschrijving'] .'</p>' ?>
</form>

<?php echo divAnchor('Gebruiker/meldAf', 'Afmelden');?>
