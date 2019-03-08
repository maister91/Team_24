<?php
/**
 * @file index.php
 *
 * View waar een lijst van klassen kan worden bekeken
 * -gebruikt bootstrap
 */
?>
<h1>Klaskeuze</h1>
<h2>Kies een klas</h2>
<?php echo form_open('klas/index' . $gebruiker['id']); ?>
<form>
    <select class="form-control">
        <option selected="selected">- Kies een klas -</option>
        <?php foreach($klas as $k) { ?>
            <option id="klasid" name="klasid" value="<?php echo ($this->input->post('klasid') ? $this->input->post('klasid') : $gebruiker['klasid']); ?>"><?php echo $k['naam'] ?></option>
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
<div class="form-control">
    <button type="submit" class="btn">Doorgaan</button>
</div>
<?php echo form_close(); ?>

<script>
    function haalKlasIdOp(klasid) {
        $.ajax({
            type: "GET",
            url: site_url + "klas/index",
            data: {watDoen: klasid},
            success: function (result) {
                $("#klasid").html(result);
            }
        })
    }
    $(document).ready(function () {
        $("#klasid").select(function () {
            haalKlasIdOp("klasid");
        });
    });
</script>