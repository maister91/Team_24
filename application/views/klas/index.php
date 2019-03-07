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
    <h1>Klaskeuze</h1>
    <h2>Kies een klas</h2>
    <form>
        <select class="form-control">
            <option selected="selected">- Kies een klas -</option>
            <?php foreach($klas as $k) { ?>
                <option><?php echo $k['naam'] ?></option>
            <?php } ?>
        </select>
    </form>
    <table class="table table-bordered table-responsive">
        <tr>
            <th></th>
            <th>Ma</th>
            <th>Di</th>
            <th>Wo</th>
            <th>Do</th>
            <th>Vr</th>
        </tr>
        <tr>
            <th>8:30 - 10:00</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>10:15 - 11:45</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>12:30 - 14:00</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>14:15 - 15:45</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>16:00 - 17:30</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <a href="<?php echo site_url('../isp_landing'); ?>" class="btn btn-info">Terug</a>
<?php  ?>

