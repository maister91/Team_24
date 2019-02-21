<div class="pull-right">
	<a href="<?php echo site_url('gebruikertype/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>Actions</th>
    </tr>
	<?php foreach($gebruikertype as $G){ ?>
    <tr>
		<td><?php echo $G['id']; ?></td>
		<td>
            <a href="<?php echo site_url('gebruikertype/edit/'.$G['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('gebruikertype/remove/'.$G['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
