<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 25/03/2019
 * Time: 22:49
 */
?>

<h1>Model landing page</h1>
<a href="<?php echo site_url('lessenrooster/index/'; ?>" class="btn btn-danger btn-xs">Klaskeuze maken</a>

<?php echo form_open('Traject/index'); ?>
    <button type='submit' name='Kiestraject'>Verander traject</button>
<?php echo form_close(); ?>