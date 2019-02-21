<div class="pull-right">
	<a href="<?php echo site_url('lesmoment/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>Richting Id</th>
		<th>Vak Id</th>
		<th>Vak Richting Id</th>
		<th>MaxAantal</th>
		<th>Lesblok</th>
		<th>Weekdag</th>
		<th>Actions</th>
    </tr>
	<?php foreach($lesmoment as $L){ ?>
    <tr>
		<td><?php echo $L['id']; ?></td>
		<td><?php echo $L['Richting_id']; ?></td>
		<td><?php echo $L['Vak_id']; ?></td>
		<td><?php echo $L['Vak_Richting_id']; ?></td>
		<td><?php echo $L['maxAantal']; ?></td>
		<td><?php echo $L['lesblok']; ?></td>
		<td><?php echo $L['weekdag']; ?></td>
		<td>
            <a href="<?php echo site_url('lesmoment/edit/'.$L['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('lesmoment/remove/'.$L['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
