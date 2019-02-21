<div class="pull-right">
	<a href="<?php echo site_url('gebruiker/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>IdGebruiker</th>
		<th>Traject Id</th>
		<th>Klas Id</th>
		<th>Gebruikertype Id</th>
		<th>Passwoord</th>
		<th>Voornaam</th>
		<th>Achternaam</th>
		<th>Email</th>
		<th>Actions</th>
    </tr>
	<?php foreach($gebruiker as $G){ ?>
    <tr>
		<td><?php echo $G['idGebruiker']; ?></td>
		<td><?php echo $G['Traject_id']; ?></td>
		<td><?php echo $G['Klas_id']; ?></td>
		<td><?php echo $G['Gebruikertype_id']; ?></td>
		<td><?php echo $G['passwoord']; ?></td>
		<td><?php echo $G['voornaam']; ?></td>
		<td><?php echo $G['achternaam']; ?></td>
		<td><?php echo $G['email']; ?></td>
		<td>
            <a href="<?php echo site_url('gebruiker/edit/'.$G['idGebruiker']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('gebruiker/remove/'.$G['idGebruiker']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
