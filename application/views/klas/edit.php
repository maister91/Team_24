<?php
/**
 * @file edit.php
 *
 * View waar de specificaties van een klas kan worden aangepast
 * -gebruikt bootstrap
 */
?>

<?php echo form_open('klas/edit/'.$klas['id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="naam" class="col-md-4 control-label">Naam</label>
		<div class="col-md-8">
			<input type="text" name="naam" value="<?php echo ($this->input->post('naam') ? $this->input->post('naam') : $klas['naam']); ?>" class="form-control" id="naam" />
		</div>
	</div>
	<div class="form-group">
		<label for="maxAantal" class="col-md-4 control-label">MaxAantal</label>
		<div class="col-md-8">
			<input type="text" name="maxAantal" value="<?php echo ($this->input->post('maxAantal') ? $this->input->post('maxAantal') : $klas['maxAantal']); ?>" class="form-control" id="maxAantal" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>