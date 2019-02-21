<div class="pull-right">
	<a href="<?php echo site_url('traject/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>Actions</th>
    </tr>
	<?php foreach($traject as $T){ ?>
    <tr>
		<td><?php echo $T['id']; ?></td>
		<td>
            <a href="<?php echo site_url('traject/edit/'.$T['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('traject/remove/'.$T['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
