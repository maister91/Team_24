<?php
/**
 * @file add.php
 *
 * View waar een lesmoment kan worden toegevoegd
 * -gebruikt bootstrap
 */
?>

<?php echo form_open('lesmoment/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="klasId" class="col-md-4 control-label">KlasId</label>
		<div class="col-md-8">
			<input type="text" name="klasId" value="<?php echo $this->input->post('klasId'); ?>" class="form-control" id="klasId" />
		</div>
	</div>
	<div class="form-group">
		<label for="vakId" class="col-md-4 control-label">VakId</label>
		<div class="col-md-8">
			<input type="text" name="vakId" value="<?php echo $this->input->post('vakId'); ?>" class="form-control" id="vakId" />
		</div>
	</div>
	<div class="form-group">
		<label for="richtingId" class="col-md-4 control-label">RichtingId</label>
		<div class="col-md-8">
			<input type="text" name="richtingId" value="<?php echo $this->input->post('richtingId'); ?>" class="form-control" id="richtingId" />
		</div>
	</div>
	<div class="form-group">
		<label for="weekdag" class="col-md-4 control-label">Weekdag</label>
		<div class="col-md-8">
			<input type="text" name="weekdag" value="<?php echo $this->input->post('weekdag'); ?>" class="form-control" id="weekdag" />
		</div>
	</div>
	<div class="form-group">
		<label for="lesblok" class="col-md-4 control-label">Lesblok</label>
		<div class="col-md-8">
			<input type="text" name="lesblok" value="<?php echo $this->input->post('lesblok'); ?>" class="form-control" id="lesblok" />
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