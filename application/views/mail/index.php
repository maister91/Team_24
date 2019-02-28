<?php
/**
 * @file index.php
 *
 * View mails
 * -gebruikt bootstrap
 */
?>

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
	<?php foreach($mail as $m){ ?>
    <tr>
		<td><?php echo $m['id']; ?></td>
		<td><?php echo $m['onderwerp']; ?></td>
		<td><?php echo $m['beschrijving']; ?></td>
		<td>
            <a href="<?php echo site_url('mail/edit/'.$m['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('mail/remove/'.$m['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
