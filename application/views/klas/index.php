<?php
/**
 * @file index.php
 *
 * View waar een lijst van klassen kan worden bekeken
 * -gebruikt bootstrap
 */
?>

<div class="pull-right">
	<a href="<?php echo site_url('klas/add'); ?>" class="btn btn-success">Add</a>
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>Naam</th>
		<th>MaxAantal</th>
		<th>Actions</th>
    </tr>
	<?php foreach($klas as $k){ ?>
    <tr>
		<td><?php echo $k['id']; ?></td>
		<td><?php echo $k['naam']; ?></td>
		<td><?php echo $k['maxAantal']; ?></td>
		<td>
            <a href="<?php echo site_url('klas/edit/'.$k['id']); ?>" class="btn btn-info btn-xs">Edit</a>
            <a href="<?php echo site_url('klas/remove/'.$k['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
