<div class="pull-right">
	<a href="<?php echo site_url('gebruiker_has_lesmoment/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Gebruiker IdGebruiker</th>
		<th>Gebruiker Gebruikertype Id</th>
		<th>Lesmoment Id</th>
		<th>Actions</th>
    </tr>
	<?php foreach($gebruiker_has_lesmoment as $G){ ?>
    <tr>
		<td><?php echo $G['Gebruiker_idGebruiker']; ?></td>
		<td><?php echo $G['Gebruiker_Gebruikertype_id']; ?></td>
		<td><?php echo $G['Lesmoment_id']; ?></td>
		<td>
            <a href="<?php echo site_url('gebruiker_has_lesmoment/edit/'.$G['Gebruiker_idGebruiker']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('gebruiker_has_lesmoment/remove/'.$G['Gebruiker_idGebruiker']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
