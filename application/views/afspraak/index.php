<div class="pull-right">
	<a href="<?php echo site_url('afspraak/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>StudentId</th>
		<th>DocentId</th>
		<th>LokaalId</th>
		<th>Tijdslot</th>
		<th>Actions</th>
    </tr>
	<?php foreach($afspraak as $a){ ?>
    <tr>
		<td><?php echo $a['id']; ?></td>
		<td><?php echo $a['studentId']; ?></td>
		<td><?php echo $a['docentId']; ?></td>
		<td><?php echo $a['lokaalId']; ?></td>
		<td><?php echo $a['tijdslot']; ?></td>
		<td>
            <a href="<?php echo site_url('afspraak/edit/'.$a['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('afspraak/remove/'.$a['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
