<?php
/**
 * @file add.php
 *
 * View waar je een nieuw vak kan toevoegen
 * -gebruikt bootstrap
 */
?>

<?php echo form_open('vak/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="richtingId" class="col-md-4 control-label">RichtingId</label>
		<div class="col-md-8">
			<input type="text" name="richtingId" value="<?php echo $this->input->post('richtingId'); ?>" class="form-control" id="richtingId" />
		</div>
	</div>
	<div class="form-group">
		<label for="naam" class="col-md-4 control-label">Naam</label>
		<div class="col-md-8">
			<input type="text" name="naam" value="<?php echo $this->input->post('naam'); ?>" class="form-control" id="naam" />
		</div>
	</div>
	<div class="form-group">
		<label for="beschrijving" class="col-md-4 control-label">Beschrijving</label>
		<div class="col-md-8">
			<input type="text" name="beschrijving" value="<?php echo $this->input->post('beschrijving'); ?>" class="form-control" id="beschrijving" />
		</div>
	</div>
	<div class="form-group">
		<label for="studiepunt" class="col-md-4 control-label">Studiepunt</label>
		<div class="col-md-8">
			<input type="text" name="studiepunt" value="<?php echo $this->input->post('studiepunt'); ?>" class="form-control" id="studiepunt" />
		</div>
	</div>
	<div class="form-group">
		<label for="fase" class="col-md-4 control-label">Fase</label>
		<div class="col-md-8">
			<input type="text" name="fase" value="<?php echo $this->input->post('fase'); ?>" class="form-control" id="fase" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>