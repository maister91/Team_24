<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<div class="col-12 mt-3">

    <?php
    $extraButton = array('class' => 'btn btn-warning btn-xs btn-round',
        'data-toggle' => 'tooltip', 'title' => 'Klas toevoegen');
    $button = form_button("knopnieuw", "<i class=\"fas fa-plus text-white\"></i>", $extraButton);
    echo '<p>' . anchor('klas/maakNieuwe', $button) . '</p>';
    ?>

    <table class="table">
        <thead>
        <tr>
            <th>Naam</th>
            <th>Max aantal</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($klassen as $k) {
            $extraButtonNew = array('class' => 'btn btn-success btn-xs btn-round', 'data-toggle' => 'tooltip', 'title' => 'Klas wijzigen');
            $buttonNew = form_button("knopnieuw","<i class=\"fas fa-pencil-alt\"></i>", $extraButtonNew);

            echo "<tr> <td>" . $k->naam . "</td><td>" . $k->maxAantal . "</td><td>" . anchor('klas/wijzig/'. $k->id, $buttonNew) . "</td></tr>";
        }
        ?>
        </tbody>
    </table>

</div>

<div class='col-12 mt-4'> <?php echo anchor('gebruikertype/isp', 'Terug'); ?> </div>


