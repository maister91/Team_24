<div class="col-12 mt-3">
    <?php
    $attributenFormulier = array('id' => 'klasFormulier');
    echo form_open('klas/registreer', $attributenFormulier);
    echo form_hidden('id', $klas['id']);
    ?>

    <div class="form-group">
        <?php
        echo form_label('Naam', 'naam');
        echo form_input(array('name' => 'naam',
            'id' => 'naam',
            'value' => $klas['naam'],
            'class' => 'form-control',
            'placeholder' => 'Naam',
            'required' => 'required'));
        ?>
    </div>

    <div class="form-group">
        <?php
        echo form_label('Maximum aantal', 'maxAantal');
        echo form_input(array('name' => 'maxAantal',
            'id' => 'maxAantal',
            'value' => $klas['maxAantal'],
            'class' => 'form-control',
            'placeholder' => 'Maximum aantal',
            'required' => 'required'));
        ?>
    </div>

    <div class="form-group">
        <?php
        echo form_submit(array('name' => 'knop',
            'id' => 'knop',
            'value' => 'Verzenden',
            'class' => 'btn btn-primary'));
        ?>
    </div>

    <?php
    echo form_close();
    ?>
</div>

<div class='col-12 mt-4'> <?php echo anchor('/Klas/index_beheren', 'Terug'); ?> </div>
