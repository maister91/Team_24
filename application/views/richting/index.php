<div class="pull-right">
	<a href="<?php echo site_url('richting/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>Naam</th>
		<th>Actions</th>
    </tr>
	<?php foreach($richting as $r){ ?>
    <tr>
		<td><?php echo $r['id']; ?></td>
		<td><?php echo $r['naam']; ?></td>
		<td>
            <a href="<?php echo site_url('richting/edit/'.$r['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('richting/remove/'.$r['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
