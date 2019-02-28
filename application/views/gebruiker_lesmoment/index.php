<div class="pull-right">
	<a href="<?php echo site_url('gebruiker_lesmoment/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>GebruikerId</th>
		<th>LesmomentId</th>
		<th>Naam</th>
		<th>Actions</th>
    </tr>
	<?php foreach($gebruiker_lesmoment as $g){ ?>
    <tr>
		<td><?php echo $g['id']; ?></td>
		<td><?php echo $g['gebruikerId']; ?></td>
		<td><?php echo $g['lesmomentId']; ?></td>
		<td><?php echo $g['naam']; ?></td>
		<td>
            <a href="<?php echo site_url('gebruiker_lesmoment/edit/'.$g['']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('gebruiker_lesmoment/remove/'.$g['']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
