<?php
/**
 * @file index.php
 *
 * View gebruikertype
 * -gebruikt bootstrap
 */
?>

<div class="pull-right">
	<a href="<?php echo site_url('gebruikertype/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>Beschrijving</th>
		<th>Actions</th>
    </tr>
	<?php foreach($gebruikertype as $g){ ?>
    <tr>
		<td><?php echo $g['id']; ?></td>
		<td><?php echo $g['beschrijving']; ?></td>
		<td>
            <a href="<?php echo site_url('gebruikertype/edit/'.$g['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('gebruikertype/remove/'.$g['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
