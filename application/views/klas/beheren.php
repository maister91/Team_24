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
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($klassen as $k) {
            $extraButtonNew = array('class' => 'btn btn-success btn-xs btn-round', 'data-toggle' => 'tooltip', 'title' => 'Klas wijzigen');
            $buttonNew = form_button("knopnieuw","<i class=\"fas fa-pencil-alt\"></i>", $extraButtonNew);

            $extraButton = array('class' => 'btn btn-danger btn-xs btn-round', 'data-toggle' => 'tooltip', 'title' => 'Klas verwijderen');
            $button = form_button("knopverwijder" , "<i class=\"fas fa-times\"></i>", $extraButton);

            echo "<tr> <td>" . $k->naam . "</td><td>" . anchor('klas/maakNieuwe/'. $k->id, $buttonNew) . "</td><td>" . anchor('klas/schrap/' . $k->id, $button) . "</td></tr>";
        }
        ?>
        </tbody>
    </table>

</div>

<div class='col-12 mt-4'> <?php echo anchor('gebruikertype/isp', 'Terug'); ?> </div>


