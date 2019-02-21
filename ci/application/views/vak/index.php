<div class="pull-right">
	<a href="<?php echo site_url('vak/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>Richting Id</th>
		<th>Naam</th>
		<th>Beschrijving</th>
		<th>Studiepunt</th>
		<th>Fase</th>
		<th>Actions</th>
    </tr>
	<?php foreach($vak as $V){ ?>
    <tr>
		<td><?php echo $V['id']; ?></td>
		<td><?php echo $V['Richting_id']; ?></td>
		<td><?php echo $V['naam']; ?></td>
		<td><?php echo $V['beschrijving']; ?></td>
		<td><?php echo $V['studiepunt']; ?></td>
		<td><?php echo $V['fase']; ?></td>
		<td>
            <a href="<?php echo site_url('vak/edit/'.$V['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('vak/remove/'.$V['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
