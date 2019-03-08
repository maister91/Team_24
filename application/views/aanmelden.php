<?php
    $attributes = array('name' => 'mijnFormulier');
    echo form_open('Gebruiker/controleerAanmelden', $attributes);
?>

<div id="login" class="row justify-content-center" >
    <div class="col-12 text-center">
        <?php echo form_input(array('name' => 'email', 'id' => 'email', 'size' => '30', 'placeholder' => 'email')); ?>
    </div>
    <div class="col-12 text-center">
        <?php
        $data = array('name' => 'paswoord', 'id' => 'paswoord', 'size' => '30', 'placeholder' => 'paswoord');
        echo form_password($data);
        ?>
    </div>
    <div class="col-12 submit text-center">
        <?php echo form_submit('knop', 'Verzenden'); ?>
    </div>
</div>

<?php echo form_close(); ?>

