<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 25/03/2019
 * Time: 22:49
 */
?>

<h1><?php echo $titel?></h1>

<?php echo form_open('Traject/index'); ?>
    <button type='submit' name='Kiestraject'>Verander traject</button>
<?php echo form_close(); ?>