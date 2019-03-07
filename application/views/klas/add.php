<?php
/**
 * @file add.php
 *
 * View waar een klas kan worden toegevoegd
 * -max aantal leerlingen per klas wordt hier ook direct meegegeven
 */
?>
<?php echo form_open('klas/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="naam" class="col-md-4 control-label">Naam</label>
		<div class="col-md-8">
			<input type="text" name="naam" value="<?php echo $this->input->post('naam'); ?>" class="form-control" id="naam" />
		</div>
	</div>
	<div class="form-group">
		<label for="maxAantal" class="col-md-4 control-label">MaxAantal</label>
		<div class="col-md-8">
			<input type="text" name="maxAantal" value="<?php echo $this->input->post('maxAantal'); ?>" class="form-control" id="maxAantal" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>