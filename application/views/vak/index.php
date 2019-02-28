<?php
/**
 * @file index.php
 *
 * View waar je alle vakken kan bekijken
 * -gebruikt bootstrap
 */
?>

<div class="pull-right">
	<a href="<?php echo site_url('vak/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>RichtingId</th>
		<th>Naam</th>
		<th>Beschrijving</th>
		<th>Studiepunt</th>
		<th>Fase</th>
		<th>Actions</th>
    </tr>
	<?php foreach($vak as $v){ ?>
    <tr>
		<td><?php echo $v['id']; ?></td>
		<td><?php echo $v['richtingId']; ?></td>
		<td><?php echo $v['naam']; ?></td>
		<td><?php echo $v['beschrijving']; ?></td>
		<td><?php echo $v['studiepunt']; ?></td>
		<td><?php echo $v['fase']; ?></td>
		<td>
            <a href="<?php echo site_url('vak/edit/'.$v['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('vak/remove/'.$v['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
