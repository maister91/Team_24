<div class="pull-right">
	<a href="<?php echo site_url('klasadmin/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Naam</th>
		<th>MaxAantal</th>
		<th>Actions</th>
    </tr>
	<?php foreach($klassen as $k){ ?>
    <tr>
		<td><?php echo $k['naam']; ?></td>
		<td><?php echo $k['maxAantal']; ?></td>
		<td>
            <a href="<?php echo site_url('klasadmin/edit/'.$k['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('klasadmin/remove/'.$k['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
