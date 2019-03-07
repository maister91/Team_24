<?php
/**
 * @file add.php
 *
 * View waar een lokaal kan worden toegevoegd
 * -gebruikt bootstrap
 */
?>

<?php echo form_open('lokaal/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="naam" class="col-md-4 control-label">Naam</label>
		<div class="col-md-8">
			<input type="text" name="naam" value="<?php echo $this->input->post('naam'); ?>" class="form-control" id="naam" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>