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

<div class="pull-right">
	<a href="<?php echo site_url('traject/add'); ?>" class="btn btn-success">Add</a>
</div>

<!--
<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>Naam</th>
		<th>Beschrijving</th>
		<th>Actions</th>
    </tr>
	<?php foreach($traject as $t){ ?>
    <tr>
		<td><?php echo $t['id']; ?></td>
		<td><?php echo $t['naam']; ?></td>
		<td><?php echo $t['beschrijving']; ?></td>
		<td>
            <a href="<?php echo site_url('traject/edit/'.$t['id']); ?>" class="btn btn-info btn-xs">Edit</a>
            <a href="<?php echo site_url('traject/remove/'.$t['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>

	<?php } ?>

</table>
-->
Welkom
<?php
$gebruiker = $this->authex->getGebruikerInfo();
echo '<b>' . $gebruiker->voornaam . '</b> ';
?>

<!---->

<form method="post" accept-charset="utf-8" action="<?php echo site_url("traject/kiesTraject"); ?>">
    <input type="submit" name="knop" value="Model traject" class="btn btn-primary href=" href=" <?php echo site_url('lessenrooster/index'); ?>" >
    <?php  echo '<p>' .$trajecten[1]['beschrijving'] .'</p>' ?>
    <input type="submit" name="knop" value="Combi traject"  href="<?php echo site_url('traject/kiesTraject'); ?>" class="btn btn-primary">
    <?php  echo '<p>' .$trajecten[0]['beschrijving'] .'</p>' ?>
</form>

<!--<?php echo form_open('Traject/kiesTraject'); ?>
<button type='submit' name='Model'>Modelstudent</button>
<button type='submit' name='Combi'>Combistudent</button>
<?php echo form_close(); ?>-->

<?php echo divAnchor('Gebruiker/meldAf', 'Afmelden');?>
