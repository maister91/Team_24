<div class="pull-right">
	<a href="<?php echo site_url('afspraak/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>Lokaal Id</th>
		<th>Gebruiker StudentId</th>
		<th>Gebruiker DocentId</th>
		<th>TijdSlot</th>
		<th>Actions</th>
    </tr>
	<?php foreach($afspraak as $A){ ?>
    <tr>
		<td><?php echo $A['id']; ?></td>
		<td><?php echo $A['Lokaal_id']; ?></td>
		<td><?php echo $A['Gebruiker_studentId']; ?></td>
		<td><?php echo $A['Gebruiker_docentId']; ?></td>
		<td><?php echo $A['tijdSlot']; ?></td>
		<td>
            <a href="<?php echo site_url('afspraak/edit/'.$A['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('afspraak/remove/'.$A['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
