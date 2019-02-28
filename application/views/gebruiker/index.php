<?php
/**
 * @file index.php
 *
 * View waar de gebruiker zich kan inloggen
 * -gebruikt bootstrap
 */
?>

<div class="pull-right">
	<a href="<?php echo site_url('gebruiker/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>GebruikertypeId</th>
		<th>KlasId</th>
		<th>TrajectId</th>
		<th>AfspraakId</th>
		<th>Voornaam</th>
		<th>Achternaam</th>
		<th>Email</th>
		<th>Passwoord</th>
		<th>Actions</th>
    </tr>
	<?php foreach($gebruiker as $g){ ?>
    <tr>
		<td><?php echo $g['id']; ?></td>
		<td><?php echo $g['gebruikertypeId']; ?></td>
		<td><?php echo $g['klasId']; ?></td>
		<td><?php echo $g['trajectId']; ?></td>
		<td><?php echo $g['afspraakId']; ?></td>
		<td><?php echo $g['voornaam']; ?></td>
		<td><?php echo $g['achternaam']; ?></td>
		<td><?php echo $g['email']; ?></td>
		<td><?php echo $g['passwoord']; ?></td>
		<td>
            <a href="<?php echo site_url('gebruiker/edit/'.$g['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('gebruiker/remove/'.$g['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
