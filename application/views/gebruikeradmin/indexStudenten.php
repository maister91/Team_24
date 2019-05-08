<div class="pull-right">
    <a href="<?php echo site_url('gebruikeradmin/addStudent'); ?>" class="btn btn-success">Add</a>
</div>

<table class="table table-striped table-bordered">
    <tr>
        <th>Gebruikertype</th>
        <th>Klas</th>
        <th>Traject</th>
        <th>Voornaam</th>
        <th>Achternaam</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
    <?php foreach($gebruikers as $g){  ?>
        <tr>
            <td><?php
                if ($g->gebruikertype != null) {
                    echo $g->gebruikertype->beschrijving;
                }
                ?></td>
            <td><?php
                if ($g->klas != null) {
                    echo $g->klas->naam;
                }
                ?></td>
            <td><?php
                if ($g->traject != null) {
                    echo $g->traject->naam;
                }
                ?></td>
            <td><?php echo $g->voornaam; ?></td>
            <td><?php echo $g->achternaam; ?></td>
            <td><?php echo $g->email; ?></td>
            <td>
                <a href="<?php echo site_url('gebruikeradmin/editStudent/'.$g->id); ?>" class="btn btn-info btn-xs">Edit</a>
                <a href="<?php echo site_url('gebruikeradmin/remove/'.$g->id); ?>" class="btn btn-danger btn-xs">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>