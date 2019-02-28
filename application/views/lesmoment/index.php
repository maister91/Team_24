<div class="pull-right">
	<a href="<?php echo site_url('lesmoment/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>KlasId</th>
		<th>VakId</th>
		<th>RichtingId</th>
		<th>Weekdag</th>
		<th>Lesblok</th>
		<th>MaxAantal</th>
		<th>Actions</th>
    </tr>
	<?php foreach($lesmoment as $l){ ?>
    <tr>
		<td><?php echo $l['id']; ?></td>
		<td><?php echo $l['klasId']; ?></td>
		<td><?php echo $l['vakId']; ?></td>
		<td><?php echo $l['richtingId']; ?></td>
		<td><?php echo $l['weekdag']; ?></td>
		<td><?php echo $l['lesblok']; ?></td>
		<td><?php echo $l['maxAantal']; ?></td>
		<td>
            <a href="<?php echo site_url('lesmoment/edit/'.$l['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('lesmoment/remove/'.$l['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
