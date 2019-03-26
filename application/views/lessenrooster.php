<?php
if ($feedback == 'keuzeSuccesvol') {
    ?><div class="alert alert-success" role="alert">
        Klaskeuze is succesvol opgeslagen!
    </div><?php
}
?>
<form method="post" accept-charset="utf-8" action="<?php echo site_url("lessenrooster/index"); ?>">
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
        if ($semesterId == 1) {
            echo '<option selected>1</option>';
            echo '<option>2</option>';
        } else {
            echo '<option>1 </option>';
            echo '<option selected>2 </option>';
        }
        ?> </select>
</form>
<?php
if ($klasId === null || $klasId === "0") {
    return;
}
?>
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
                ?><tr><td><?php echo $i; ?></td><?php
                for ($j = 0; $j <= 4; ++$j) {
                    if (isset($lesmoment[$j])) {
                        ?><td><?php echo $lesmoment[$j]['vakNaam']; ?></td><?php
                    } else {
                        ?><td></td><?php
                    }
                }
            } else {
                ?><tr>
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
<a class="btn btn-primary" href="<?php echo site_url("lessenrooster/index"); ?>?klasId=<?php echo $klasId?>&semesterId=<?php echo $semesterId?>">Klaskeuze maken</a>

