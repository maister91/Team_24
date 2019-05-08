<?php
/**
 * @file edit.php
 *
 * View waar je een traject kan aanpassen
 * -gebruikt bootstrap
 */
?>

<?php echo form_open('traject/edit/'.$traject['id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="naam" class="col-md-4 control-label">Naam</label>
		<div class="col-md-8">
			<input type="text" name="naam" value="<?php echo ($this->input->post('naam') ? $this->input->post('naam') : $traject['naam']); ?>" class="form-control" id="naam" />
		</div>
	</div>
	<div class="form-group">
		<label for="beschrijving" class="col-md-4 control-label">Beschrijving</label>
		<div class="col-md-8">
			<input type="text" name="beschrijving" value="<?php echo ($this->input->post('beschrijving') ? $this->input->post('beschrijving') : $traject['beschrijving']); ?>" class="form-control" id="beschrijving" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>