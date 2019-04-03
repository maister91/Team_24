<div class="pull-right">
    <a href="<?php echo site_url('gebruikeradmin/add'); ?>" class="btn btn-success">Add</a>
</div>

<table class="table table-striped table-bordered">
    <tr>
        <th>GebruikertypeId</th>
        <th>KlasId</th>
        <th>TrajectId</th>
        <th>AfspraakId</th>
        <th>Voornaam</th>
        <th>Achternaam</th>
        <th>Email</th>
        <th>Paswoord</th>
        <th>Actions</th>
    </tr>

    <?php foreach($gebruikers as $g){ ?>
        <tr>
            <td><?php echo $g['gebruikertypeId']; ?></td>
            <td><?php echo $g['klasId']; ?></td>
            <td><?php echo $g['trajectId']; ?></td>
            <td><?php echo $g['afspraakId']; ?></td>
            <td><?php echo $g['voornaam']; ?></td>
            <td><?php echo $g['achternaam']; ?></td>
            <td><?php echo $g['email']; ?></td>
            <td><?php echo $g['paswoord']; ?></td>
            <td>
                <a href="<?php echo site_url('gebruikeradmin/edit/'.$g['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                <a href="<?php echo site_url('gebruikeradmin/remove/'.$g['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>
