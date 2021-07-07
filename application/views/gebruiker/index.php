<?php
/**
 * @file index.php
 * View waar de gebruiker kan inloggen
 * - gebruikt bootstrap
 */
?>

<?php
$attributes = array('name' => 'mijnFormulier');
echo form_open('Gebruiker/controleerAanmelden', $attributes);
?>

<div id="login" class="row justify-content-center" >
    <div class="col-12 text-center">
        <?php echo form_input(array('name' => 'email', 'id' => 'email', 'size' => '30', 'placeholder' => 'email', 'required' => 'required')); ?>
    </div>
    <div class="col-12 text-center">
        <?php
        $data = array('name' => 'paswoord', 'id' => 'paswoord', 'size' => '30', 'placeholder' => 'paswoord', 'required' => 'required');
        echo form_password($data);
        ?>
    </div>
    <div class="col-12 submit text-center">
        <?php echo form_submit('knop', 'Aanmelden'); ?>
    </div>
</div>

<?php echo form_close(); ?>

