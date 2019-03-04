<?php
/**
 * @file index.php
 *
 * View waar je de verschillende trajecten kan bekijken
 * -gebruikt bootstrap
 */
?>

<div class="pull-right">
	<a href="<?php echo site_url('traject/add'); ?>" class="btn btn-success">Add</a> 
</div>

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
<?php echo divAnchor('Gebruiker/meldAf', 'Afmelden');?>
