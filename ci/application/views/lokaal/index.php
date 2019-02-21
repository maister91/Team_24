<div class="pull-right">
	<a href="<?php echo site_url('lokaal/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>Naam</th>
		<th>Actions</th>
    </tr>
	<?php foreach($lokaal as $L){ ?>
    <tr>
		<td><?php echo $L['id']; ?></td>
		<td><?php echo $L['naam']; ?></td>
		<td>
            <a href="<?php echo site_url('lokaal/edit/'.$L['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('lokaal/remove/'.$L['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
