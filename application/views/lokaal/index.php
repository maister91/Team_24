<?php
/**
 * @file index.php
 *
 * View waar de lokalen kunnen worden bekeken
 * -gebruikt bootstrap
 */
?>

<div class="pull-right">
	<a href="<?php echo site_url('lokaal/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>Naam</th>
		<th>Actions</th>
    </tr>
	<?php foreach($lokaal as $l){ ?>
    <tr>
		<td><?php echo $l['id']; ?></td>
		<td><?php echo $l['naam']; ?></td>
		<td>
            <a href="<?php echo site_url('lokaal/edit/'.$l['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('lokaal/remove/'.$l['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
