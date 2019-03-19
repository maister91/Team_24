<select name="klassen"><?php
        foreach ($klassen as $klas) {
            echo '<option value="'.$klas['id'].'">'.$klas['naam'].'</option>';
        }
?></select>
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
