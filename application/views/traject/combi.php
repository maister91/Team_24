<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<form method="post" accept-charset="utf-8" action="<?php echo site_url("traject/combi"); ?>">
    <select name="klassen" onchange="this.form.submit()">
        <option value="0">--- Maak een keuze ---</option><?php
        foreach ($klassen as $klas) {
            if ($klasId === $klas['id']) {
                echo '<option value="' . $klas['id'] . '" selected>' . $klas['naam'] . '</option>';
            } else {
                echo '<option value="' . $klas['id'] . '">' . $klas['naam'] . '</option>';
            }
        }
        ?></select>
    <select name="semester" onchange="this.form.submit()">
        ><?php
        if ($semesterId == 2) {
            echo '<option selected>2</option>';
            echo '<option>1</option>';
        } else {
            echo '<option>2 </option>';
            echo '<option selected>1 </option>';
        }
        ?> </select>
        <select id="js_vakken" name="vakken" class="selectpicker" multiple data-selected-text-format="count > 3" class="width: 'auto'"><?php
            foreach ($vakkenUniek as $vak) {
                echo '<option value="' . $vak['id'] . '" selected>' . $vak['naam'] . '</option>';
            }
        ?></select>
</form>
<?php
<<<<<<< HEAD
if (empty($vakkenUniek)) {
    ?><div class="alert-warning">Geen lessen beschikbaar in de gemaakte selectie.</div><?php
    return;
}
=======
>>>>>>> 6f245572bc82e07ae91c80d8af8bbf4d464c6c2b
?>
<div id="feedback"></div>
<div id="lessenrooster">
    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th>Maandag</th>
            <th>Dinsdag</th>
            <th>Woensdag</th>
            <th>Donderdag</th>
            <th>Vrijdag</th>
        </tr>
        </thead>
        <tbody><?php
        for ($i = 1; $i <= 5; ++$i) {
            if (isset($lesmomenten[$i])) {
                $lesmoment = $lesmomenten[$i];
                ?>
                <tr>
                <td><?php echo $i; ?></td><?php
                for ($j = 0; $j <= 4; ++$j) {
                    if (isset($lesmoment[$j])) {
<<<<<<< HEAD
                        ?><td><?php echo $lesmoment[$j]['vakNaam']; ?></td><?php
                    } else {
                        ?><td></td><?php
=======
                        ?>
                        <td id="js_vak_<?php echo $lesmoment[$j]['vakId']?>"><?php echo $lesmoment[$j]['vakNaam']; ?></td><?php
                    } else {
                        ?>
                        <td></td><?php
>>>>>>> 6f245572bc82e07ae91c80d8af8bbf4d464c6c2b
                    }
                }
            } else {
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr><?php
            }
        }
        ?></tbody>
    </table>
</div>
<?php
$alleVakIds = [];
foreach ($vakkenUniek as $vakken) {
    $alleVakIds[] = $vakken['id'];
}
?>
<script type="text/javascript">
    $(function() {
        var vakken = JSON.stringify(<?php echo json_encode($alleVakIds); ?>);
        $('select').selectpicker();
        $('#js_vakken').change(function() {
<<<<<<< HEAD
            $('#feedback').html('<p class="alert-info"><strong>Bezig met het ophalen van de aangepaste lessenrooster...</strong></p>');
=======
            $('#feedback').html('<p class="alert-info"><strong>Bezig met het ophalen van de aangepaste lessenrooster</strong></p>');
>>>>>>> 6f245572bc82e07ae91c80d8af8bbf4d464c6c2b
            $.ajax({
                type: "POST",
                url: "<?php echo site_url("traject/ajaxRequestPost"); ?>",
                data: {items: JSON.stringify($(this).val()), klasId: '<?php echo $klasId ?>', semesterId: '<?php echo $semesterId ?>'},
                success: function(data){
                    $('#feedback').html('<p class="alert-success"><strong>Klaar!</strong></p>');
                    $('#lessenrooster').html(data);
                },
                failure: function(errMsg) {
                    console.log('fail');
                    alert(errMsg);
                }
            });
        });
    });

</script>
