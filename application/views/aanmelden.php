<?php
    $attributes = array('name' => 'mijnFormulier');
    echo form_open('Gebruiker/controleerAanmelden', $attributes);
?>
<table>
    <tr>
        <td><?php echo form_label('E-mail:', 'email'); ?></td>
        <td><?php echo form_input(array('name' => 'email', 'id' => 'email', 'size' => '30')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Paswoord:', 'paswoord'); ?></td>
        <td><?php
                $data = array('name' => 'paswoord', 'id' => 'paswoord', 'size' => '30');
                echo form_password($data);
            ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_submit('knop', 'Verzenden'); ?></td>
    </tr>
</table>

<?php echo form_close(); ?>

