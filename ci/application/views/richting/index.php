<div class="pull-right">
	<a href="<?php echo site_url('richting/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>Naam</th>
		<th>Actions</th>
    </tr>
	<?php foreach($richting as $R){ ?>
    <tr>
		<td><?php echo $R['id']; ?></td>
		<td><?php echo $R['naam']; ?></td>
		<td>
            <a href="<?php echo site_url('richting/edit/'.$R['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('richting/remove/'.$R['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
