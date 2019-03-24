<form method="post" accept-charset="utf-8" action="<?php echo site_url("lessenrooster/index"); ?>">
    <select name="klassen" onchange="this.form.submit()"><?php
        foreach ($klassen as $klas) {
            echo '<option value="'.$klas['id'].'" selected>'.$klas['naam'].'</option>';
        }
        ?></select>
    <select name="semester" onchange="this.form.submit(); location = this.options[this.selectedIndex].value;" >
        <option>1</option>
        <option>2</option>
    </select>
</form>
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
<form method="post">
    <input class="btn-primary" type="submit" name="klaskeuze" id="klas" value="Klaskeuze maken" /><br/>
</form>