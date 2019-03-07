<?php
    $attributes = array('name' => 'mijnFormulier');
    echo form_open('Gebruiker/controleerAanmelden', $attributes);
?>
<table id="login">
    <tr>
        <td id="login" class="fadeIn second"><?php echo form_input(array('name' => 'email', 'id' => 'email', 'size' => '30', 'placeholder' => 'email')); ?></td>
    </tr>
    <tr>
        <td id="password" class="fadeIn third"><?php
                $data = array('name' => 'paswoord', 'id' => 'paswoord', 'size' => '30', 'placeholder' => 'paswoord');
                echo form_password($data);
            ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td class="fadeIn fourth"><?php echo form_submit('knop', 'Verzenden'); ?></td>
    </tr>
</table>

<?php echo form_close(); ?>

