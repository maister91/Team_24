<div class="pull-right">
	<a href="<?php echo site_url('mail/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>Onderwerp</th>
		<th>Beschrijving</th>
		<th>Actions</th>
    </tr>
	<?php foreach($mail as $M){ ?>
    <tr>
		<td><?php echo $M['id']; ?></td>
		<td><?php echo $M['onderwerp']; ?></td>
		<td><?php echo $M['beschrijving']; ?></td>
		<td>
            <a href="<?php echo site_url('mail/edit/'.$M['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('mail/remove/'.$M['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
